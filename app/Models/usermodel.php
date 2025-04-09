<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usermodel extends Model
{
    use HasFactory;

    // Table name (optional if it matches the class name in plural form)
    protected $table = 'users';

    // Mass assignable attributes
    protected $fillable = [
        'firstname',
        'middlename',
        'lastname',
        'schoolid',
        'course',
    ];

}
