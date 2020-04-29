<?php

namespace App\Repositories;

use App\Models\Company;
use App\Repositories\BaseRepository;

/**
 * Class CompanyRepository
 * @package App\Repositories
 * @version September 28, 2019, 5:54 am UTC
 */

class CompanyRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'account_number',
        'account_type',
        'address',
        'state',
        'email',
        'status',
        'image',
        'company_type_id',
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
        return Company::class;
    }

    public function allActive()
    {
        $query = $this->model->newQuery();

        return $query->where('status', 'A')->get();
    }
}
