<?php

namespace App\Repositories;

use App\Models\TypeService;
use App\Repositories\BaseRepository;

/**
 * Class TypeServiceRepository
 * @package App\Repositories
 * @version March 21, 2020, 7:42 am UTC
*/

class TypeServiceRepository extends BaseRepository
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
        return TypeService::class;
    }
}
