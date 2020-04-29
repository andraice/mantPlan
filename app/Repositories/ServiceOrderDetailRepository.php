<?php

namespace App\Repositories;

use App\Models\ServiceOrderDetail;
use App\Repositories\BaseRepository;

/**
 * Class ServiceOrderDetailRepository
 * @package App\Repositories
 * @version November 28, 2019, 6:51 am UTC
*/

class ServiceOrderDetailRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'start',
        'end',
        'description',
        'service_order_id'
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
        return ServiceOrderDetail::class;
    }
}
