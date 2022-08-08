<?php

namespace App\Nova;

use App\Nova\Actions;
use App\Nova\Metrics;
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
    public static $model = \App\App::class;

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
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        $views = [];
        $downloads = [];
        $installs = [];

        if (config('app-analytics.views')) {
            $views = [
                (new Metrics\PerDay)->model(SummaryView::class)->trigger(\App\App::class)->setName('Total Views'),
                (new Metrics\PerDayPerResource)->model(SummaryView::class)->trigger(\App\App::class)->setName('Views')->onlyOnDetail(),
            ];
        }

        if (config('app-analytics.downloads')) {
            $downloads = [
                (new Metrics\PerDay)->model(SummaryDownload::class)->trigger(\App\App::class)->setName('Total Downloads'),
                (new Metrics\PerDayPerResource)->model(SummaryDownload::class)->trigger(\App\App::class)->setName('Downloads')->onlyOnDetail(),
            ];
        }

        if (config('app-analytics.installs')) {
            $installs = [
                (new Metrics\PerDay)->model(SummaryInstall::class)->trigger(\App\App::class)->setName('Total Installs'),
                (new Metrics\PerDayPerResource)->model(SummaryInstall::class)->trigger(\App\App::class)->setName('Installs')->onlyOnDetail(),
            ];
        }

        $res = array_merge($views, $downloads, $installs);

        return $res;
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
            // (new Lenses\MostDownloadedAppsThisWeek),
            // (new Lenses\MostInstalledAppsThisWeek()),
            // (new Lenses\MostViewedAppsThisWeek()),
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
