<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unidad extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'unidad';

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
        'nombre', 'abreviatura', 'tipo', 'ueb_id'
    ];

    /**
     * Get the empresa.
     */
    public function ueb()
    {
        return $this->belongsTo('App\Ueb');
    }
}
