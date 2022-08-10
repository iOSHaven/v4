<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Avatar;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Text;

class Team extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Team::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public function title()
    {
        return $this->name;
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

            Avatar::make('profile_photo_path')
                ->store($this->handleStorage('/teams', 'profile_photo_path'))
                ->thumbnail($this->handleIcon($this->photo_url))
                ->preview($this->handleIcon($this->photo_url))
                ->maxWidth(50),

            Text::make('Name')->rules('required'),

            Boolean::make('Personal Team')->sortable()->rules('required'),

            //            Text::make('Parsing ID', 'parsingIdentifier')->rules('required')->onlyOnForms(),
            //
            //            Text::make('Website')->rules('required'),
            //
            //            Boolean::make('Working', 'revoked')
            //                    ->trueValue(0)
            //                    ->falseValue(1),
            //
            //            BelongsToMany::make('Signed Links', 'itms', Itms::class)->nullable()->searchable(),
            //            BelongsToMany::make('Unsigned IPA links', 'ipas', Ipa::class)->nullable()->searchable(),

            BelongsTo::make('Provider'),
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
