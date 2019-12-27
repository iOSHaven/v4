<?php

namespace App\Nova;

use App\Download;
use App\Install;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Avatar;
use Laravel\Nova\Fields\Markdown;

use App\Nova\Metrics;
use App\Nova\Actions;
use App\Nova\Lenses;
use App\View;
use Illuminate\Support\Facades\DB;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Textarea;
use Saumini\Count\RelationshipCount;

class App extends Resource
{
    public static $orderBy = null;

    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\App';

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
        'short'
    ];


    public static function indexQuery(NovaRequest $request, $query) {
        return $query->base_query()->ownedByUser()->orderBy('impressions', 'desc');
    }

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
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
                ->readonly(),

            Avatar::make('icon')
                ->store($this->handleStorage("/icons", "icon"))
                ->thumbnail($this->handleIcon($this->icon))
                ->preview($this->handleIcon($this->icon))
                ->maxWidth(50),

            Text::make("Name")->sortable()->rules('required'),

            RelationshipCount::make('Views', 'impressions')->sortable()->onlyOnIndex(),
            RelationshipCount::make('IPA', 'downloads')->sortable()->onlyOnIndex(),
            RelationshipCount::make('ITMS', 'installs')->sortable()->onlyOnIndex(),


            

            BelongsToMany::make('Itms', 'itms', Itms::class)->nullable()->searchable()->singularLabel('Signed Link (ITMS)'),
            BelongsToMany::make('Ipa', 'ipas', Ipa::class)->nullable()->searchable()->singularLabel('Unsigned Link (IPA)'),

            Text::make('Short Description', 'short'),
            Markdown::make('Description'),
            Textarea::make('tags'),

            

            
            
            
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
            // new Metrics\NewApps,
            (new Metrics\PerDay)->model(View::class)->trigger('\App\App'),
            (new Metrics\PerDay)->model(Download::class)->trigger('\App\App'),
            (new Metrics\PerDay)->model(Install::class)->trigger('\App\App'),
            (new Metrics\PerDayPerResource)->model(View::class)->onlyOnDetail(),
            (new Metrics\PerDayPerResource)->model(Download::class)->onlyOnDetail(),
            (new Metrics\PerDayPerResource)->model(Install::class)->onlyOnDetail(),
            // (new Metrics\ViewsPerDayPerResource)->onlyOnDetail(),
            // (new Metrics\DownloadsPerDayPerResource)->onlyOnDetail(),
            // (new Metrics\InstallsPerDayPerResource)->onlyOnDetail(),
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
        return [
            (new Lenses\MostDownloadedAppsThisWeek),
            (new Lenses\MostInstalledAppsThisWeek()),
            (new Lenses\MostViewedAppsThisWeek()),
        ];
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
            (new Actions\ExtractIpaAndItmsLinks)
                ->confirmText('Are you sure you want to overrite itms and ipa entries and manipulate the apps table?')
                ->confirmButtonText('Parse')
                ->cancelButtonText('Never mind'),
        ];
    }

    
}
