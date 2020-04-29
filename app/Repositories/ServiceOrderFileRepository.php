<?php

namespace App\Repositories;

use App\Models\ServiceOrderFile;
use App\Repositories\BaseRepository;

/**
 * Class ServiceOrderFileRepository
 * @package App\Repositories
 * @version November 28, 2019, 7:06 am UTC
*/

class ServiceOrderFileRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'filename'
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
        return ServiceOrderFile::class;
    }
}
