<?php

namespace App\Models;

use App\Traits\HasPhoto;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Cashier\Billable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Nova\Actions\Actionable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasPhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use Actionable;
    use Billable;
    use CanResetPassword;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'username', 'email', 'password',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'photo_url',
        'name'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
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

    public function getNameAttribute()
    {
        return $this->username;
    }




    public function canImpersonate($impersonated = null)
    {
        return $this->isAdmin;
    }

}
