<?php

namespace App\Nova;

use App\Models\Enums\Stats\Event;
use App\Summary\SummaryDownload;
use App\Summary\SummaryInstall;
use App\Summary\SummaryView;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Avatar;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\Markdown;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;
use Saumini\Count\RelationshipCount;

class App extends Resource
{
    // public static $with = ['impressions'];

    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\App::class;

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
        'name',
        'uid',
        'tags',
        'short',
    ];

    public static function indexQuery(NovaRequest $request, $query)
    {
        $query = $query
            // ->withStats()
            // ->base_query()
            ->ownedByUser()
            ->orderBy('impressions', 'desc');
        // debug($request);
        return $query;
    }

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(Request $request)
    {
        // if ($this->icon) {
        //     Storage::setVisibility($this->icon, 'public');
        // }
        return [
            Text::make('uid')
                ->sortable()
                ->readonly()
                ->hideWhenCreating(),

            Avatar::make('icon')
                ->store($this->handleStorage('/icons', 'icon'))
                ->thumbnail($this->handleIcon($this->icon))
                ->preview($this->handleIcon($this->icon))
                ->maxWidth(50),

            Text::make('Name')->sortable()->rules('required'),

            Number::make('Views', 'impressions')->sortable()->onlyOnIndex(),
            Number::make('Downloads')->sortable()->onlyOnIndex(),
            Number::make('Installs')->sortable()->onlyOnIndex(),
            // RelationshipCount::make('Impressions', 'impressions')->sortable()->onlyOnIndex(),
            // RelationshipCount::make('IPA', 'downloads')->sortable()->onlyOnIndex(),
            // RelationshipCount::make('ITMS', 'installs')->sortable()->onlyOnIndex(),

            BelongsToMany::make('Itms', 'itms', Itms::class)->nullable()->searchable()->singularLabel('Signed Link (ITMS)'),
            BelongsToMany::make('Ipa', 'ipas', Ipa::class)->nullable()->searchable()->singularLabel('Unsigned Link (IPA)'),

            Text::make('Short Description', 'short')->required(),
            Markdown::make('Description')->required(),
            Textarea::make('tags'),

        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @return array
     */
    public function cards(Request $request) {
        return $this->statCards(['view', 'download']);
    }

    /**
     * Get the filters available for the resource.
     *
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @return array
     */
    public function lenses(Request $request)
    {
        return [
            // (new Lenses\MostDownloadedAppsThisWeek),
            // (new Lenses\MostInstalledAppsThisWeek()),
            // (new Lenses\MostViewedAppsThisWeek()),
        ];
    }

    /**
     * Get the actions available for the resource.
     *
     * @return array
     */
    public function actions(Request $request)
    {
        return [
            (new Actions\ExtractIpaAndItmsLinks)
                ->confirmText('Are you sure you want to overrite itms and ipa entries and manipulate the apps table?')
                ->confirmButtonText('Parse')
                ->cancelButtonText('Never mind'),
        ];
    }
}
