<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Cashier\Billable;
use Laravel\Nova\Actions\Actionable;

class User extends Authenticatable
{
    use Notifiable, Actionable, Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'password', 'email'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'id'
    ];

    public function shortcuts() {
        return $this->hasMany(Shortcut::class);
    }

    public function apps() {
        return $this->hasMany(App::class);
    }
}
