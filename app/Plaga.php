<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plaga extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'plaga';

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
        'nombre_cientifico', 'nombre_vulgar'
    ];

    /**
     * Get the municipios for the blog post.
     */
    public function plagasCultivo()
    {
        return $this->hasMany('App\PlagaCultivo');
    }
}
