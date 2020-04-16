<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TagTranslation extends Model
{
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tag_translation';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'locale',
        'tag_id'
    ];

     /**
     * Timestamp Config
     *
     * @var bool
     */
    public $timestamps = false;
}
