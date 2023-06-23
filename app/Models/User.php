<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'first_name',
        'last_name',
        'phone',
        'address1',
        'address2',
        'province_id',
        'city_id',
        'postcode',
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

    public function getProfileImage()
    {
        $userRole = $this->roles()->pluck('title')->first();

        if ($userRole === 'admin') {
            return asset('backend/img/admin.png');
        } elseif ($userRole === 'staff') {
            return asset('backend/img/staff.png');
        } else {
            return asset('backend/img/default.png');
        }
    }

    public function isAdmin()
    {
        $userRole = $this->roles()->pluck('title')->first();

        return $userRole === 'admin';
    }

    public function isStaff()
{
    $userRole = $this->roles()->pluck('title')->first();

    return $userRole === 'staff';
}

    public function roles() {
        return $this->belongsToMany(Role::class, 'role_user');
    }
}
