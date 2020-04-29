<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ServiceOrderFile
 * @package App\Models
 * @version November 28, 2019, 7:06 am UTC
 *
 * @property integer filename
 */
class ServiceOrderFile extends Model
{
    use SoftDeletes;

    public $table = 'service_order_file';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'filename',
        'service_order_detail_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'filename' => 'string',
        'service_order_detail_id' => 'integer'
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
        return $this->belongsTo(\App\User::class, 'user_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function serviceOrderDetail()
    {
        return $this->belongsTo(\App\Models\ServiceOrderDetail::class, 'service_order_detail_id', 'id');
    }
}
