<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cultivo extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cultivo';

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
        'nombre', 'fecha_siembra', 'area', 'campo_id', 'variedad_id', 'fenologia_id',
        'coordenada_id'
    ];

    /**
     * Get the Campo.
     */
    public function campo()
    {
        return $this->belongsTo('App\Campo');
    }

    /**
     * Get the Variedad.
     */
    public function variedad()
    {
        return $this->belongsTo('App\Variedad');
    }

    /**
     * Get the Fenologia.
     */
    public function fenologia()
    {
        return $this->belongsTo('App\Fenologia');
    }

    /**
     * Get the Coordenada.
     */
    public function coordenada()
    {
        return $this->belongsTo('App\Coordenada');
    }
}
