<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coordenada extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'coordenada';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'latitud', 'longitud'
    ];
}
