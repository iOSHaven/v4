<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Avatar;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Markdown;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;

class Post extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Post';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'title';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'title',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [

            Avatar::make('image')
                ->store($this->handleStorage('/blog-images', 'image'))
                ->thumbnail($this->handleIcon($this->image))
                ->preview($this->handleIcon($this->image))
                ->maxWidth(50),

            Text::make('uid')
                ->sortable()
                ->readonly()
                ->hideWhenCreating(),

            Text::make('Wordpress API Link', 'wp_url')
                ->rules(['active_url'])
                ->hideFromIndex(),

            Boolean::make('Ad Free Reading', 'ad_free')
                ->hideFromIndex(),

            Text::make('Title', 'title')
                ->rules(['required_without:wp_url']),

            Text::make('Subtitle', 'subtitle')
                ->hideFromIndex(),

            Textarea::make('SEO Description', 'description')
                ->rows(2)
                ->rules(['required_without:wp_url'])
                ->hideFromIndex(),

            Text::make('Keyword tags', 'tags')
                ->rules(['required_without:wp_url'])
                ->hideFromIndex(),

            Markdown::make('Post', 'markdown')
                ->rules(['required_without:wp_url'])
                ->hideFromIndex(),

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
        return [];
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
        return [];
    }
}
