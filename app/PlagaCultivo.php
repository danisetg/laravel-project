<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlagaCultivo extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'plaga_cultivo';

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
        'indice', 'cultivo_id', 'plaga_id'
    ];

    /**
     * Get the plaga.
     */
    public function plaga()
    {
        return $this->belongsTo('App\Plaga');
    }

    /**
     * Get the cultivo.
     */
    public function cultivo()
    {
        return $this->belongsTo('App\Cultivo');
    }
}
