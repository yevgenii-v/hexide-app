<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
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
     * @return BelongsToMany
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * Check of any user's role.
     *
     * @param $roleId
     * @return bool
     */
    public function hasAnyRole($roleId): bool
    {
        return null !== $this->roles()->where('role_id', $roleId)->first();
    }

    /**
     * Check of any user's roles.
     *
     * @param $roleId
     * @return bool
     */
    public function hasAnyRoles($roleId): bool
    {
        return null !== $this->roles()->whereIn('role_id', $roleId)->first();
    }

    /**
     * @return HasMany
     */
    public function orders(): HasMany
    {
       return $this->hasMany(Order::class);
    }
}
