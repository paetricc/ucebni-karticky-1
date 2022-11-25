<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    const ROLE_ADMIN   = 'admin';
    const ROLE_STUDENT = 'student';
    const ROLE_TEACHER = 'teacher';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'degree_front',
        'first_name',
        'last_name',
        'degree_after',
        'school',
        'account_type',
        'password',
        'photo'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'type'
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
     * @return HasMany
     */
    public function groupsOwnerships(): HasMany
    {
        return $this->hasMany(Group::class, 'owner', 'id');
    }

    /**
     * @return BelongsToMany
     */
    /*
    public function groupsMemberships(): BelongsToMany
    {
        return $this->belongsToMany(
            Group::class,
            'user_memberships',
            'user_id',
            'id'
        );
    }*/

    /**
     * @return HasMany
     */
    public function createdExercises(): HasMany
    {
        return $this->hasMany(Exercise::class);
    }

    /**
     * @return HasMany
     */
    public function attempts(): HasMany
    {
        return $this->hasMany(Attempt::class);
    }
}
