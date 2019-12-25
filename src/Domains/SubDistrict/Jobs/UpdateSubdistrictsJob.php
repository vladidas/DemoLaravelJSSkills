<?php

namespace App\Domains\SubDistrict\Jobs;

use Lucid\Foundation\Job;
use Illuminate\Database\Eloquent\Model;
use App\Data\Repositories\SubDistrictRepository;

/**
 * Class UpdateSubDistrictsJob
 * @package App\Domains\SubDistrict\Jobs
 * @author  Vlad Golubtsov <v.golubtsov@bvblogic.com>
 */
class UpdateSubDistrictsJob extends Job
{
    /**
     * @var int
     */
    protected $subDistrictId;

    /**
     * @var array
     */
    protected $attributes;

    /**
     * UpdateSubDistrictsJob constructor.
     * @param int $subDistrictId
     * @param array $attributes
     */
    public function __construct(int $subDistrictId, array $attributes)
    {
        $this->subDistrictId = $subDistrictId;
        $this->attributes    = $attributes;
    }

    /**
     * @param SubDistrictRepository $subDistrictRepository
     * @return Model
     */
    public function handle(SubDistrictRepository $subDistrictRepository): Model
    {
        return $subDistrictRepository->update($this->subDistrictId, $this->attributes);
    }
}
