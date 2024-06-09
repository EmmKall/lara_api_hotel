<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'huesped_id',
        'cuarto_id',
        'in',
        'out'
    ];

    public function huesped(){
        return $this->belongsTo( Huesped::class );
    }

    public function cuarto(){
        return $this->belongsTo( Cuarto::class );
    }

}

