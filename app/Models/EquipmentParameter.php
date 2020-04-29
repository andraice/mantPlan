<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class EquipmentParameter
 * @package App\Models
 * @version November 3, 2019, 5:35 am UTC
 *
 * @property \App\Models\Equipment id
 * @property \App\Models\Users id
 * @property string key
 * @property string value
 * @property integer equipment_id
 * @property integer user_id
 */
class EquipmentParameter extends Model
{
    use SoftDeletes;

    public $table = 'equipment_parameter';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'key',
        'value',
        'equipment_id',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'key' => 'string',
        'value' => 'string',
        'equipment_id' => 'integer',
        'user_id' => 'integer'
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $userid = (!Auth::guest()) ? Auth::user()->id : null ;
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function equipment()
    {
        return $this->belongsTo(\App\Models\Equipment::class, 'id', 'equipment_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\Users::class, 'id', 'user_id');
    }
}
