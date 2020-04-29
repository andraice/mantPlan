<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ServiceOrderDetail
 * @package App\Models
 * @version November 28, 2019, 6:51 am UTC
 *
 * @property string start
 * @property string end
 * @property string description
 * @property integer service_order_id
 */
class ServiceOrderDetail extends Model
{
    use SoftDeletes;

    public $table = 'service_order_detail';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'description',
        'tech_support_comments',
        'tiempo',
        'revision_status',
        'work_status',
        'service_order_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'description' => 'string',
        'tech_support_comments' => 'string',
        'tiempo' => 'string',
        'revision_status' => 'string',
        'work_status' => 'string',
        'service_order_id' => 'integer'
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

    public function getSidAttribute()
    {
        return 'WO' . $this->id;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function serviceOrder()
    {
        return $this->belongsTo(\App\Models\ServiceOrder::class, 'service_order_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\User::class, 'user_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function files()
    {
        return $this->hasMany(\App\Models\ServiceOrderFile::class, 'service_order_detail_id');
    }
}
