<?php

namespace App\Repositories;

use App\Models\EquipmentParameter;
use App\Repositories\BaseRepository;

/**
 * Class EquipmentParameterRepository
 * @package App\Repositories
 * @version November 3, 2019, 5:35 am UTC
*/

class EquipmentParameterRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'key',
        'value',
        'equipment_id',
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
        return EquipmentParameter::class;
    }
}
