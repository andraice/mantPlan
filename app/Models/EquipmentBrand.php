<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class EquipmentBrand
 * @package App\Models
 * @version October 1, 2019, 11:12 am UTC
 *
 * @property \App\Models\User user
 * @property string name
 * @property string status
 * @property integer user_id
 */
class EquipmentBrand extends Model
{
    use SoftDeletes;

    public $table = 'equipment_brand';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'status',
        'user_id'
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $userid = (!\Auth::guest()) ? \Auth::user()->id : null;
            $model->user_id = $userid;
        });
    }

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

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');
    }
}
