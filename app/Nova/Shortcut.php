<?php

namespace App\Nova;

use App\Install;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inspheric\Fields\Url;
use Laravel\Nova\Fields\Avatar;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Heading;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Markdown;
use Laravel\Nova\Fields\Status;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;
use App\Nova\Actions;
use App\View;
use Saumini\Count\RelationshipCount;

class Shortcut extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Shortcut';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'name'
    ];

    public static function indexQuery(NovaRequest $request, $query) {
        return $query->base_query()->ownedByUser();
    }

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [

            Avatar::make('icon')
                // ->store($this->handleStorage("/icons", "icon"))
                ->thumbnail($this->handleIcon($this->icon))
                ->preview($this->handleIcon($this->icon))
                ->hideWhenCreating()
                ->hideWhenUpdating()
                ->disableDownload()
                ->maxWidth(50),

            Text::make('Shortcut ID', 'itunes_id')
                ->hideFromIndex()
                ->hideWhenUpdating()
                ->help('https://www.icloud.com/shortcuts/&lt;Shortcut ID&gt;')
                ->rules('unique:shortcuts')
                ->required(),

            Text::make('Name')
                ->hideWhenCreating()
                ->sortable(),

            Markdown::make('Description'),

            
            Url::make('Itunes Url', 'url')
                ->label('Install')
                ->alwaysClickable()
                ->hideWhenCreating()
                ->hideWhenUpdating(),

            Heading::make('Approval Information')
                ->onlyOnDetail(),

            Status::make('Status', 'approval_status')
                ->loadingWhen(['pending'])
                ->failedWhen(['denied'])
                ->sortable(),

            RelationshipCount::make('Views', 'impressions')->sortable()->onlyOnIndex(),
            // RelationshipCount::make('IPA', 'downloads')->sortable()->onlyOnIndex(),
            RelationshipCount::make('Installs', 'installs')->sortable()->onlyOnIndex(),


            Textarea::make('Notes', 'approval_message')
                ->canSee(function ($request) {
                    return !empty($this->approval_message);
                })
                ->readonly()
                ->onlyOnDetail(),

            BelongsTo::make('User')
                ->canSee(function ($request) {
                    return $request->user()->isAdmin;
                })
                ->hideFromIndex()
                ->hideWhenCreating()
                ->nullable()
                ->searchable(),

        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [
            (new Metrics\PerDay)->model(View::class)->trigger('\App\Shortcut'),
            // (new Metrics\PerDay)->model(Download::class)->trigger('\App\App'),
            (new Metrics\PerDay)->model(Install::class)->trigger('\App\Shortcut'),
            (new Metrics\PerDayPerResource)->model(View::class)->onlyOnDetail(),
            // (new Metrics\PerDayPerResource)->model(Download::class)->onlyOnDetail(),
            (new Metrics\PerDayPerResource)->model(Install::class)->onlyOnDetail(),
        ];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [
            (new Actions\ApproveShortcut)
                ->canSee(function ($request) {
                    return $request->user()->isAdmin;
                })
                ->confirmText('Are you sure you want to approve all shortcuts?')
                ->confirmButtonText('Approve')
                ->cancelButtonText('Never mind'),

            (new Actions\DenyShortcut)
                ->canSee(function ($request) {
                    return $request->user()->isAdmin;
                })
                ->confirmText('Are you sure you want to deny all shortcuts?')
                ->confirmButtonText('Deny')
                ->cancelButtonText('Never mind'),
        ];
    }
}
