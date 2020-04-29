<?php

namespace App\Repositories;

use App\Models\CompanyType;
use App\Repositories\BaseRepository;

/**
 * Class CompanyTypeRepository
 * @package App\Repositories
 * @version September 26, 2019, 4:57 pm UTC
*/

class CompanyTypeRepository extends BaseRepository
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
        return CompanyType::class;
    }
}
