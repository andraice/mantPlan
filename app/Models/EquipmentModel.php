<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class EquipmentModel
 * @package App\Models
 * @version September 28, 2019, 6:15 am UTC
 *
 * @property \App\Models\User user
 * @property string name
 * @property string status
 * @property integer user_id
 */
class EquipmentModel extends Model
{
    use SoftDeletes;

    public $table = 'equipment_model';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'status',
        'equipment_brand_id',
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
        'equipment_brand_id' => 'integer',
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function equipment_brand()
    {
        return $this->belongsTo(\App\Models\EquipmentBrand::class, 'equipment_brand_id', 'id');
    }
}
