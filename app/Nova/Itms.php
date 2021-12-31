<?php

namespace App\Nova;

use Barryvdh\Debugbar\Facade as Debug;
use Illuminate\Http\Request;
use ioshaven\plist\Plist;
use Laravel\Nova\Fields\Avatar;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class Itms extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Itms::class;

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
        return $this->provider_name.($this->working ? '' : ' - REVOKED');
    }

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'name',
    ];

    public static function label()
    {
        return 'Signed Links (ITMS)';
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
            ID::make('id')->sortable(),
            Text::make('name')->sortable(),
            Text::make('url'),

            Text::make('Provider', 'provider.name')->onlyOnIndex(),

            Plist::make('plist'),

            Avatar::make('', 'provider_avatar')
                ->thumbnail($this->handleIcon($this->provider_avatar))
                ->preview($this->handleIcon($this->provider_avatar))
                ->maxWidth(50)
                ->onlyOnIndex(),

            Boolean::make('working')->sortable(),
            BelongsToMany::make('providers')->nullable(),
            BelongsToMany::make('apps')->nullable()->searchable(),
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
            (new Actions\RevokeItem)
                ->confirmText('Are you sure you want to revoke this item?')
                ->confirmButtonText('Revoke')
                ->cancelButtonText('Never mind'),

            (new Actions\SignItem)
                ->confirmText('Are you sure you want to sign this item?')
                ->confirmButtonText('Sign')
                ->cancelButtonText('Never mind'),

            (new Actions\UpdateProviderToken)
                ->confirmText('Update all tokens?')
                ->confirmButtonText('Update')
                ->cancelButtonText('Never mind'),
        ];
    }
}
