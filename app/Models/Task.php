<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Task
 * @package App\Models
 * @version March 21, 2020, 7:55 am UTC
 *
 */
class Task extends Model
{

    public $table = 'task';

    public $fillable = [
        'id',
        'description',
        'orden',
        'task_group_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'description' => 'string',
        'orden' => 'string',
        'task_group_id' => 'integer'
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\User::class, 'user_id', 'id');
    }
}
