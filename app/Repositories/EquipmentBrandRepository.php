<?php

namespace App\Repositories;

use App\Models\EquipmentBrand;
use App\Repositories\BaseRepository;

/**
 * Class EquipmentBrandRepository
 * @package App\Repositories
 * @version October 1, 2019, 11:12 am UTC
*/

class EquipmentBrandRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'status',
        'user_id'
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
        return EquipmentBrand::class;
    }
}
