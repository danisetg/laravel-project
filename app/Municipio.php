<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'municipio';

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
        'nombre', 'abreviatura', 'provincia_id'
    ];

    /**
     * Get the post that owns the comment.
     */
    public function provincia()
    {
        return $this->belongsTo('App\Provincia');
    }
}
