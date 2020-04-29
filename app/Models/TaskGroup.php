<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class TaskGroup
 * @package App\Models
 * @version March 21, 2020, 7:40 am UTC
 *
 * @property string name
 */
class TaskGroup extends Model
{

    public $table = 'task_group';




    public $fillable = [
        'name',
        'type_service_id'

    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'type_service_id' => 'integer'
    ];

    /**
     * Validation rules
     *
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function typeService()
    {
        return $this->belongsTo(\App\Models\TypeService::class, 'type_service_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function tasks()
    {
        return $this->hasMany(\App\Models\Task::class, 'task_group_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\User::class, 'user_id', 'id');
    }
}
