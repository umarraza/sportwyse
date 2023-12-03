<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Player;
use App\Models\Guardian;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Jetstream\HasProfilePhoto;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
// use MongoDB\Laravel\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use HasRoles;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'username',
        'email',
        'password',
        'm_id',
        'm_club_name',
        'm_club_id',
        'm_rush_user_type',
        'm_files',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
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
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    protected $with = ['club'];

    /**
     * Get the guardian associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function guardian(): HasOne
    {
        return $this->hasOne(Guardian::class);
    }

    /**
     * Get the player associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function player(): HasOne
    {
        return $this->hasOne(Player::class);
    }

    /**
     * Get the staff associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function staff(): HasOne
    {
        return $this->hasOne(Staff::class);
    }

    public function getRoleAttribute()
    {
        return $this->roles->first();
    }

    public function isClub() 
    {
        return $this->hasRole('Club');
    }

    public function isAdmin() 
    {
        return $this->hasRole('Super Admin');
    }

    /**
     * Get the club associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function club(): HasOne
    {
        return $this->hasOne(Club::class);
    }
}
