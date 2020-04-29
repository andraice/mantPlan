<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Company
 * @package App\Models
 * @version September 28, 2019, 5:54 am UTC
 *
 * @property \App\Models\CompanyType companyType
 * @property \App\Models\User user
 * @property string name
 * @property string account_number
 * @property string account_type
 * @property string address
 * @property string state
 * @property string email
 * @property string status
 * @property string image
 * @property integer company_type_id
 * @property integer user_id
 */
class Company extends Model
{
    use SoftDeletes;

    public $table = 'company';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'account_number',
        'account_type',
        'address',
        'state',
        'email',
        'status',
        'image',
        'company_type_id',
        'user_id'
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'account_number' => 'string',
        'account_type' => 'string',
        'address' => 'string',
        'state' => 'string',
        'status' => 'string',
        'image' => 'string',
        'company_type_id' => 'integer',
        'user_id' => 'integer'
    ];

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
    public function companyType()
    {
        return $this->belongsTo(\App\Models\CompanyType::class, 'company_type_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');
    }
}
