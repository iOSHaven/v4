<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Mirror;

class Provider extends Model
{
    protected $fillable = ["name", "twitter"];

    public function mirrors() {
        return $this->hasMany(Mirror::class);
    }
}
