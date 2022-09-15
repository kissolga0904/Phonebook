<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $guarded = [];
    //a person has many phone numbers
    public function phoneNumbers(){
        return $this->hasMany(PhoneNumber::class);
    }

    //a person has many email address
    public function emails(){
        return $this->hasMany(Email::class);
    }



}
