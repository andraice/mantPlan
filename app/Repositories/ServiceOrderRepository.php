<?php

namespace App\Repositories;

use App\Models\ServiceOrder;
use App\Repositories\BaseRepository;

/**
 * Class ServiceOrderRepository
 * @package App\Repositories
 * @version October 1, 2019, 12:08 pm UTC
 */

class ServiceOrderRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'description',
        'type_service_id',
        'priority',
        'technical_support_id',
        'equipment_id',
        'status',
        'company_id',
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
     *
     * @return void
     */
    public function model()
    {
        return ServiceOrder::class;
    }
}
