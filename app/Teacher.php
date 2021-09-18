<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = [
        'name', 'lastname', 'dni', 'space','level','other_school','name_school', 'phone', 'email', 'first_time', 'user_id'
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
