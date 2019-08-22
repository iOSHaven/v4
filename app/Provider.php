<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Mirror;

class Provider extends Model
{
    use SoftDeletes;
    protected $fillable = ["name", "twitter"];

    public function mirrors() {
        return $this->hasMany(Mirror::class);
    }
}
