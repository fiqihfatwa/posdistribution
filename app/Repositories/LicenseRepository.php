<?php

namespace App\Repositories;

use App\Models\License;
use App\Repositories\BaseRepository;

/**
 * Class LicenseRepository
 * @package App\Repositories
 * @version October 24, 2019, 8:02 am UTC
*/

class LicenseRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'license_key',
        'sold_in',
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
        return License::class;
    }
}
