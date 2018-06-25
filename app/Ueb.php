<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ueb extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ueb';

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
        'nombre', 'abreviatura', 'empresa_id'
    ];

    /**
     * Get the empresa.
     */
    public function empresa()
    {
        return $this->belongsTo('App\Empresa');
    }
}
