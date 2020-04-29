<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class EquipmentType
 * @package App\Models
 * @version September 28, 2019, 6:11 am UTC
 *
 * @property string name
 * @property string status
 * @property integer user_id
 */
class EquipmentType extends Model
{
    use SoftDeletes;

    public $table = 'equipment_type';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'status',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'status' => 'string',
        'user_id' => 'integer'
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $userid = (!\Auth::guest()) ? \Auth::user()->id : null ;
            $model->user_id = $userid;
        });
    }

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];


}
