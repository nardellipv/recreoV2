<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name', 'lastname', 'dni', 'birth_date', 'genre', 'phone', 'email', 'classroom', 'level', 'first_note', 'second_note', 'total', 'first_time', 'user_id'
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }
    
}
