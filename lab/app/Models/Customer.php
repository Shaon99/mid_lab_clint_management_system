<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name',
        'username',
        'email',
        'phone',
        'password',


    ];
    protected $table = 'customers';
    use HasFactory;
}
