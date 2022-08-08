<?php

namespace App\Nova;

use App\Nova\Actions;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Avatar;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Text;

class Provider extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Provider::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public function title()
    {
        return $this->name;
    }

    public function subtitle()
    {
        return $this->revoked ? 'REVOKED' : '';
    }

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'name',
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

            Avatar::make('icon')
                ->store($this->handleStorage('/providers', 'avatar'))
                ->thumbnail($this->handleIcon($this->avatar))
                ->preview($this->handleIcon($this->avatar))
                ->maxWidth(50),

            Text::make('Name')->sortable()->rules('required'),

            Text::make('Parsing ID', 'parsingIdentifier')->rules('required')->onlyOnForms(),

            Text::make('Website')->rules('required'),

            Boolean::make('Working', 'revoked')
                    ->trueValue(0)
                    ->falseValue(1),

            BelongsToMany::make('Signed Links', 'itms', Itms::class)->nullable()->searchable(),
            BelongsToMany::make('Unsigned IPA links', 'ipas', Ipa::class)->nullable()->searchable(),

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
        return [
            (new Actions\RevokeProvider)
                ->confirmText('Are you sure you want to revoke all providers?')
                ->confirmButtonText('Revoke')
                ->cancelButtonText('Never mind'),

            (new Actions\SignProvider)
                ->confirmText('Sign all providers?')
                ->confirmButtonText('Sign')
                ->cancelButtonText('Never mind'),

        ];
    }
}
