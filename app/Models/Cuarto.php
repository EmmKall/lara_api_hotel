<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuarto extends Model
{
    use HasFactory;

    protected $fillable = [ 'cuarto', 'piso_id' ];

    public function piso(){
        return $this->belongsTo( Piso::class );
    }

    public function huesped(){
        return $this->hasMany( Huesped::class );
    }

}
