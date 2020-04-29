<?php

namespace App\Repositories;

use App\Models\TaskGroup;
use App\Repositories\BaseRepository;

/**
 * Class TaskGroupRepository
 * @package App\Repositories
 * @version March 21, 2020, 7:40 am UTC
*/

class TaskGroupRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return TaskGroup::class;
    }
}
