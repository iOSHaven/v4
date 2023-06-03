<?php

namespace App\Nova\Actions;

use App\Models\Ipa;
use App\Models\Itms;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Collection;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\ActionFields;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Heading;

class SignProvider extends Action implements ShouldQueue
{
    use InteractsWithQueue, Queueable;

    /**
     * Perform the action on the given models.
     *
     * @param  \Illuminate\Support\Collection  $models
     * @return mixed
     */
    public function handle(ActionFields $fields, Collection $providers)
    {
        try {
            foreach ($providers as $provider) {
                $provider->forceFill(['revoked' => false])->save();
                $ids = $provider->itms->pluck('id');
                if ($fields->itms) {
                    Itms::whereIn('id', $ids)->update(['working' => true]);
                }
                if ($fields->ipas) {
                    Ipa::whereIn('id', $ids)->update(['working' => true]);
                }
                $this->markAsFinished($provider);
            }
        } catch (\Exception $err) {
            $this->fail($err);
        }
    }

    /**
     * Get the fields available on the action.
     *
     * @return array
     */
    public function fields()
    {
        return [
            Heading::make('<p>Optionally check boxes to change the status of the links associated with the provider. All links can be changed back with a click of a button.</p>')->asHtml(),
            Boolean::make('ITMS', 'itms', function () {
                return true;
            })->help('Display all signed (ITMS) links as working.'),
            Boolean::make('IPA', 'ipas')->help('Display all unsigned (IPA) links as working.'),
        ];
    }
}
