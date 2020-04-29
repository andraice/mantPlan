<?php

namespace App\Repositories;

use App\Models\Equipment;
use App\Repositories\BaseRepository;

/**
 * Class EquipmentRepository
 * @package App\Repositories
 * @version October 1, 2019, 11:32 am UTC
*/

class EquipmentRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'serial_number',
        'startup_date',
        'equipment_status',
        'image',
        'location_address',
        'location_geo',
        'warranty',
        'status',
        'equipment_model_id',
        'equipment_type_id',
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
        return Equipment::class;
    }
}
