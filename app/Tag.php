<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Tag extends Model
{
    use HasTranslations;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tags';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        // Translatable
        'name',
    ];

    /**
     * @var array
     */
    public $translatedAttributes = [
        'name'
    ];

    public function posts()
    {
        return $this->belongsToMany('App\Post')->withTimestamps();
        
    }
}
