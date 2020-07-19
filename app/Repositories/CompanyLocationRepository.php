<?php

namespace App\Repositories;

use App\Models\CompanyLocation;
use App\Repositories\BaseRepository;

/**
 * Class CompanyLocationRepository
 * @package App\Repositories
 * @version May 4, 2020, 2:44 am -05
*/

class CompanyLocationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'location_address',
        'status'
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
        return CompanyLocation::class;
    }
}
