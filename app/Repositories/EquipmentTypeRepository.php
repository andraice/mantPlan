<?php

namespace App\Repositories;

use App\Models\EquipmentType;
use App\Repositories\BaseRepository;

/**
 * Class EquipmentTypeRepository
 * @package App\Repositories
 * @version September 28, 2019, 6:11 am UTC
*/

class EquipmentTypeRepository extends BaseRepository
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
        return EquipmentType::class;
    }
}
