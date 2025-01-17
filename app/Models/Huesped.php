<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Huesped extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'last_name',
        'born_day',
        'email',
        'phone',
        'sex'
    ];
}
