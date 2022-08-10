<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;

class Skin extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Skin::class;

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
        'uuid',
        'name',
    ];

    public static function indexQuery(NovaRequest $request, $query)
    {
        $query = $query->orderBy('order', 'asc');

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
        return [
            ID::make()->hideFromIndex(),
            Number::make('Ordering Number', 'order'),
            Text::make('uuid')->readonly()->onlyOnDetail(),
            Text::make('name')
                ->sortable(),
            Textarea::make('description'),
            Textarea::make('images')->help('put image links on seperate lines'),
            Number::make('sale price', 'salePrice')->min(0)->max(50)->step(1)->help('full dollar ammount. no cents'),
            Number::make('price')->min(0)->max(50)->step(1)->help('full dollar ammount. no cents'),
            Boolean::make('on sale', 'onSale'),
            Number::make('Downloads', 'downloadAmount')->readonly(),
            Number::make('Clicks', 'clickAmount')->readonly(),
            Number::make('Purchases', 'purchaseCount')->readonly(),

            Text::make('affiliate link', 'affiliate'),
            Textarea::make('download')->resolveUsing(function ($value) {
                return trim($value);
            }),

            // $table->string('name');
            // $table->longText('description');
            // $table->longText('images');
            // $table->integer('salePrice');
            // $table->integer('price');
            // $table->boolean('onSale');
            // $table->longText('download');
            // $table->timestamps();
            // $table->softDeletes();
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
