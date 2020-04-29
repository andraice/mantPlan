<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ServiceOrder
 * @package App\Models
 * @version October 1, 2019, 12:08 pm UTC
 *
 * @property \App\Models\User technicalSupport
 * @property \App\Models\Equipment equipment
 * @property \App\Models\Company company
 * @property \App\Models\User user
 * @property string description
 * @property string type_service
 * @property string priority
 * @property integer technical_support_id
 * @property integer equipment_id
 * @property string status
 * @property integer company_id
 * @property integer user_id
 */
class ServiceOrder extends Model
{
    use SoftDeletes;

    public $table = 'service_order';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'description',
        'type_service_id',
        'priority',
        'requestor_id',
        'technical_support_id',
        'equipment_id',
        'status',
        'start',
        'deadline',
        'geopos',
        'tech_support_comments',
        'tech_operator_comments',
        'tech_operator_signature',
        'technical_operator_id',
        'company_id',
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
        'description' => 'string',
        'requestor_id' => 'integer',
        'type_service_id' => 'integer',
        'priority' => 'string',
        'technical_support_id' => 'integer',
        'equipment_id' => 'integer',
        'status' => 'string',
        'start' => 'datetime',
        'deadline' => 'datetime',
        'geopos' => 'string',
        'technical_operator_id' => 'integer',
        'tech_support_comments' => 'string',
        'tech_operator_comments' => 'string',
        'tech_operator_signature' => 'string',
        'company_id' => 'integer',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [];

    public function getSidAttribute(){
        return 'SO' . $this->id;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function details()
    {
        return $this->hasMany(\App\Models\ServiceOrderDetail::class, 'service_order_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function typeService()
    {
        return $this->belongsTo(\App\Models\TypeService::class, 'type_service_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function requestor()
    {
        return $this->belongsTo(\App\User::class, 'requestor_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function technicalSupport()
    {
        return $this->belongsTo(\App\User::class, 'technical_support_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function technicalOperator()
    {
        return $this->belongsTo(\App\User::class, 'technical_operator_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function equipment()
    {
        return $this->belongsTo(\App\Models\Equipment::class, 'equipment_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function company()
    {
        return $this->belongsTo(\App\Models\Company::class, 'company_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\User::class, 'user_id', 'id');
    }
}
