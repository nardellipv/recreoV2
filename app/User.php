<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name_school', 'email_school', 'address', 'postal_code', 'phone_school', 'director1', 'director2', 
        'password', 'province_id', 'region_id', 'userType', 'first_time_school', 'sede'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function Teacher()
    {
        return $this->hasMany(Teacher::class);
    }

    public function Student()
    {
        return $this->hasMany(Student::class);
    }

    public function Region()
    {
        return $this->belongsTo(Region::class);
    }

    public function Province()
    {
        return $this->belongsTo(Province::class);
    }
}
