<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Piso extends Model
{
    use HasFactory;

    protected $fillable = [ 'piso' ];

    public function cuarto() {
        return $this->hasMany( Cuarto::class );
    }

}
