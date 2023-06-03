<?php

namespace App\Nova\Lenses;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\LensRequest;
use Laravel\Nova\Lenses\Lens;

class MostDownloadedAppsThisWeek extends Lens
{
    /**
     * Get the query builder / paginator for the lens.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return mixed
     */
    public static function query(LensRequest $request, $query)
    {
        return $request->withOrdering($request->withFilters(
            $query->withCount([
                'downloads as downloads' => function ($query) {
                    $query->where('created_at', '>', now()->subDays(7));
                }, ])
                ->orderBy('downloads', 'desc')
        ));
    }

    protected static function columns()
    {
        return [
            'apps.*',
        ];
    }

    /**
     * Get the fields available to the lens.
     *
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            Text::make('uid'),
            Text::make('name'),
            Number::make('downloads'),
        ];
    }

    /**
     * Get the cards available on the lens.
     *
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the lens.
     *
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available on the lens.
     *
     * @return array
     */
    public function actions(Request $request)
    {
        return parent::actions($request);
    }

    /**
     * Get the URI key for the lens.
     *
     * @return string
     */
    public function uriKey()
    {
        return 'most-downloaded-apps-this-week';
    }
}
