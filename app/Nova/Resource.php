<?php

namespace App\Nova;

use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Resource as NovaResource;
use Illuminate\Support\Facades\Storage;

abstract class Resource extends NovaResource
{

    public static $orderBy = ['id' => 'asc'];
    /**
     * Build an "index" query for the given resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function indexQuery(NovaRequest $request, $query)
    {
        return $query;
    }

    /**
     * Build a Scout search query for the given resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @param  \Laravel\Scout\Builder  $query
     * @return \Laravel\Scout\Builder
     */
    public static function scoutQuery(NovaRequest $request, $query)
    {
        return $query;
    }

    /**
     * Build a "detail" query for the given resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function detailQuery(NovaRequest $request, $query)
    {
        return parent::detailQuery($request, $query);
    }

    /**
     * Build a "relatable" query for the given resource.
     *
     * This query determines which instances of the model may be attached to other resources.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function relatableQuery(NovaRequest $request, $query)
    {
        return parent::relatableQuery($request, $query);
    }

    protected static function applyOrderings($query, array $orderings)
    {
        if (empty($orderings)) {
            // This is your default order
            return $query;
        }
    
        foreach ($orderings as $column => $direction) {
            $query->orderBy($column, $direction);
        }
    
        return $query;
    }

    public function handleStorage(string $folder, string $icon = "icon") {
        return function ($request) use ($folder, $icon) {
            $ext = $request->icon->extension();
            return [
                $icon => env("DO_SPACES_SUBDOMAIN") . "/". Storage::disk("spaces")->putFileAs($folder, $request->icon, hash("sha256", $this->name . now()) . ".$ext", ["visibility" => "public"]),
            ];
        };
    }

    public function handleIcon($icon) {
        return function () use ($icon){
            return $icon ? url($icon) : "data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=";
        };
    }
}
