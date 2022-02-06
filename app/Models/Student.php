<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar_url'
    ];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    // mutator practice
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function setNameAttribute($name)
    {
        $this->attributes['name'] = Str::lower($name);
    }

    // accessor practice
    // public function getNameAttribute($name)
    // {
    //     return ucfirst($name);
    // }

    public function getNameAttribute($name)
    {
        return "Name:".($name);
    }

}
