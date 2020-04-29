<?php

namespace App\Repositories;

use App\Models\EquipmentModel;
use App\Repositories\BaseRepository;

/**
 * Class EquipmentModelRepository
 * @package App\Repositories
 * @version September 28, 2019, 6:15 am UTC
*/

class EquipmentModelRepository extends BaseRepository
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
        return EquipmentModel::class;
    }
}
