<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    use HasFactory;
    protected $table = 'email';

    protected $guarded = [];

    public function person(){
        return $this->belongsTo(Person::class);
    }
}
