<?php

namespace App\Nova\Actions;

use App\Ipa;
use App\Itms;
use App\Provider;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Collection;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Actions\DestructiveAction;
use Laravel\Nova\Fields\ActionFields;
use Throwable;

class ExtractIpaAndItmsLinks extends DestructiveAction implements ShouldQueue
{
    use InteractsWithQueue, Queueable;

    /**
     * Perform the action on the given models.
     *
     * @param  \Laravel\Nova\Fields\ActionFields  $fields
     * @param  \Illuminate\Support\Collection  $models
     * @return mixed
     */
    public function handle(ActionFields $fields, Collection $apps)
    {
        $providers = Provider::get();

        foreach($apps as $app) {
            try {
                $provider = Provider::where('name', 'Unknown')->firstOrFail();
                // debug($provider);
                try {
                    $itms = Itms::firstOrCreate([
                        "name" => $app->name,
                        "url" => $app->signed,
                    ]);
                    foreach ($providers as $p) {
                        if (strpos($app->signed, $p->parsingIdentifier) !== false) {
                            $provider = $p;
                            break;
                        }
                    }
                    $itms->providers()->sync([$provider->id]);
                    $itms->apps()->sync([$app->id]);
                } catch (\Exception $err) {}

                try {
                    $ipa = Ipa::firstOrCreate([
                        "name" => $app->name,
                        "url" => $app->unsigned,
                    ]);
                    $ipa->providers()->sync([$provider->id]);
                    $ipa->apps()->sync([$app->id]);
                } catch (\Exception $err) {}
                
                $this->markAsFinished($app);
            } catch(\Exception $err) {
                $this->markAsFailed($app, $err);
            }
            
            
        }
    }

    /**
     * Get the fields available on the action.
     *
     * @return array
     */
    public function fields()
    {
        return [];
    }
}
