<?php

namespace App\Domains\SubDistrict\Jobs;

use Lucid\Foundation\Job;
use Illuminate\Database\Eloquent\Collection;
use App\Data\Repositories\SubDistrictRepository;

/**
 * Class GetAllSubDistrictsJob
 * @package App\Domains\SubDistrict\Jobs
 * @author  Vlad Golubtsov <v.golubtsov@bvblogic.com>
 */
class GetAllSubDistrictsJob extends Job
{
    /**
     * @param SubDistrictRepository $subDistrictRepository
     * @return Collection
     */
    public function handle(SubDistrictRepository $subDistrictRepository): Collection
    {
        return $subDistrictRepository->all();
    }
}
