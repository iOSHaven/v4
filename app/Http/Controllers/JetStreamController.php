<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class JetStreamController extends Controller
{
    public function destroyTeamPhoto(Request $request, Team $team) {
        $team->deleteProfilePhoto();
        return back(303)->with('status', 'profile-photo-deleted');
    }
}
