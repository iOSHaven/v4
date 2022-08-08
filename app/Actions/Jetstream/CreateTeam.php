<?php

namespace App\Actions\Jetstream;

use App\Provider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use Laravel\Jetstream\Contracts\CreatesTeams;
use Laravel\Jetstream\Events\AddingTeam;
use Laravel\Jetstream\Jetstream;

class CreateTeam implements CreatesTeams
{
    /**
     * Validate and create a new team for the given user.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return mixed
     */
    public function create($user, array $input)
    {
        Gate::forUser($user)->authorize('create', Jetstream::newTeamModel());

        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'website' => ['required', 'active_url', 'max:255'],
        ])->validateWithBag('createTeam');

        $provider = Provider::create([
            "name" => $input["name"],
            "parsingIdentifier" => $input["name"],
            'website' => $input['website']
        ]);
//        dd($provider);

        AddingTeam::dispatch($user);

        $team = $user->ownedTeams()->create([
            'name' => $input['name'],
            'personal_team' => false,
            "provider_id" => $provider->id
        ]);

//        $provider =

//        $team->provider()->associate();


        $user->switchTeam($team);

        return $team;
    }
}
