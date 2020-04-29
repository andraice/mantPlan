<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Equipment
 * @package App\Models
 * @version October 1, 2019, 11:32 am UTC
 *
 * @property \App\Models\EquipmentModel equipmentModel
 * @property \App\Models\EquipmentType equipmentType
 * @property \App\Models\User user
 * @property string name
 * @property string serial_number
 * @property string startup_date
 * @property string equipment_status
 * @property string image
 * @property string location_address
 * @property string location_geo
 * @property integer warranty
 * @property string status
 * @property integer equipment_model_id
 * @property integer equipment_type_id
 * @property integer user_id
 */
class Equipment extends Model
{
    use SoftDeletes;

    public $table = 'equipment';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'serial_number',
        'startup_date',
        'equipment_status',
        'image',
        'location_address',
        'location_geo',
        'status',
        'equipment_model_id',
        'equipment_type_id',
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
        'serial_number' => 'string',
        'startup_date' => 'datetime',
        'equipment_status' => 'string',
        'image' => 'string',
        'location_address' => 'string',
        'location_geo' => 'string',
        'status' => 'string',
        'equipment_model_id' => 'integer',
        'equipment_type_id' => 'integer',
        'user_id' => 'integer'
    ];

    public function getNameSnAttribute()
    {
        return $this->name . ' (SN: ' . $this->serial_number .')';
    }

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ];

    public function getSidAttribute(){
        return 'SO' . $this->id;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function equipmentModel()
    {
        return $this->belongsTo(\App\Models\EquipmentModel::class, 'equipment_model_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function equipmentType()
    {
        return $this->belongsTo(\App\Models\EquipmentType::class, 'equipment_type_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\User::class, 'user_id', 'id');
    }
}
