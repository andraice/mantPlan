<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class TypeService
 * @package App\Models
 * @version March 21, 2020, 7:42 am UTC
 *
 * @property string name
 */
class TypeService extends Model
{

    public $table = 'type_service';




    public $fillable = [
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [];


    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $userid = (!\Auth::guest()) ? \Auth::user()->id : null;
            $model->user_id = $userid;
        });
    }
}
