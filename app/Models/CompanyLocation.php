<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class CompanyLocation
 * @package App\Models
 * @version May 4, 2020, 2:44 am -05
 *
 * @property \Illuminate\Database\Eloquent\Collection $users
 * @property string $name
 * @property string $location_address
 * @property string $status
 */
class CompanyLocation extends Model
{
    use SoftDeletes;

    public $table = 'company_location';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'name',
        'location_address',
        'status',
        'manager_id',
        'user_id',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'location_address' => 'string',
        'status' => 'string',
        'manager_id' => 'integer',
        'user_id' => 'integer',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'location_address' => 'required',
        'status' => 'required',
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function manager()
    {
        return $this->belongsTo(\App\Models\User::class, 'manager_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');
    }
}
