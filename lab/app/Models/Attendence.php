<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendence extends Model
{
    protected $table='attendence';
    protected $fillable = [
        'user_id',
        'edit_date',
        'att_date',
        'month',
        'year',


    ];
    use HasFactory;
}
