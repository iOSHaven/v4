<?php

namespace App\Nova;

use App\Actions\Media\TrimAppIcon;
use App\Models\Enums\Stats\Event;
use Artisan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Laravel\Nova\Fields\File;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Resource as NovaResource;

abstract class Resource extends NovaResource
{
    public static $orderBy = ['id' => 'asc'];

    /**
     * Build an "index" query for the given resource.
     *
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

    public static function mediaLibraryImage($label, $relation, $field = null)
    {
        return File::make($label)
            ->nullable()
            ->store(function (Request $request, $model) use ($field, $label, $relation) {
                $field ??= Str::slug(strtolower($label), '_');
                $model->media()->delete();
                $model->addMediaFromRequest($field)
                    ->withResponsiveImages()
                    ->toMediaCollection();

                resolve(TrimAppIcon::class)->execute(
                    media: $model->$relation(),
                    conversion: 'preview',
                    size: 77
                );

                resolve(TrimAppIcon::class)->execute(
                    media: $model->$relation(),
                    conversion: 'tiny',
                    size: 10
                );

                resolve(TrimAppIcon::class)->execute(
                    media: $model->$relation(),
                    conversion: 'thumb',
                    size: 50
                );

                // Artisan::call('media-library:regenerate', [
                //     '--ids' => $model->$relation()->id
                // ]);

                return true;
            })
            ->preview(function ($url, $disk, $model) use ($relation) {
                return $model->$relation()?->getUrl('preview');
            })
            ->thumbnail(function ($url, $disk, $model) use ($relation) {
                return $model->$relation()?->getUrl('thumb');
            })
            ->download(function (Request $request, $model) {
                $photo = $model->getFirstMedia();

                return response()->download($photo->getPath(), $photo->file_name);
            })
            ->deletable(true)
            ->delete(function (Request $request, $model) {
                $model->media()->delete();

                return true;
            })
            ->required();
    }

    public function handleStorage(string $folder, string $icon = 'icon')
    {
        return function ($request) use ($folder, $icon) {
            $file = $request->$icon;
            $ext = $file->extension();

            request()->$icon = env('DO_SPACES_SUBDOMAIN').'/'.Storage::disk('spaces')
                ->putFileAs($folder, $file, hash('sha256', $this->name.now()).".{$ext}", ['visibility' => 'public']);

            return [
                $icon => request()->$icon,
            ];
        };
    }

    public function handleIcon($icon)
    {
        return function () use ($icon) {
            return $icon ? url($icon) : 'data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=';
        };
    }

    public function statCards(array $events, $model = null)
    {
        $cards = [];
        $model ??= get_class($this->resource);
        foreach ($events as $event) {
            if (! config('app-analytics.'.Str::plural($event))) {
                continue;
            }

            $name = Str::plural(Str::title($event));
            $event = Event::from($event);

            $cards[] = (new Metrics\PerDay)
                ->event($event)
                ->trigger($model)
                ->setName('Total '.$name);

            $cards[] = (new Metrics\PerDayPerResource)
                ->event($event)
                ->trigger($model)
                ->setName($name)
                ->onlyOnDetail();
        }

        return $cards;
    }
}
