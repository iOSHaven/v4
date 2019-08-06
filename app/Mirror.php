<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\App;

class Mirror extends Model
{
    public function app()
    {
        return $this->belongsTo(App::class);
    }
}
