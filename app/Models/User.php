<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Cashier\Billable;
use Laravel\Nova\Actions\Actionable;

class User extends Authenticatable
{
    use HasFactory;
    use Notifiable, Actionable, Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'password', 'email',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'id',
    ];

    public function shortcuts()
    {
        return $this->hasMany(Shortcut::class);
    }

    public function apps()
    {
        return $this->hasMany(App::class);
    }

    public function skins()
    {
        return $this->belongsToMany(Skin::class);
    }

    public function getGravatarAttribute()
    {
        $hash = md5(strtolower(trim($this->email)));

        return "http://www.gravatar.com/avatar/$hash";
    }
}
