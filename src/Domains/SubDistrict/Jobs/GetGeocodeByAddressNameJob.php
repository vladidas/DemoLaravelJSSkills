<?php

namespace App\Domains\SubDistrict\Jobs;

use Lucid\Foundation\Job;
use App\Data\Services\GoogleApiService;

/**
 * Class GetGeocodeByAddressNameJob
 * @package App\Domains\SubDistrict\Jobs
 * @author  Vlad Golubtsov <v.golubtsov@bvblogic.com>
 */
class GetGeocodeByAddressNameJob extends Job
{
    /**
     * @var string
     */
    protected $address;

    /**
     * GetGeocodeByAddressNameJob constructor.
     * @param string $address
     */
    public function __construct(string $address)
    {
        $this->address = $address;
    }

    /**
     * @param GoogleApiService $googleApiService
     * @return array
     * @throws \Exception
     */
    public function handle(GoogleApiService $googleApiService): array
    {
        return $googleApiService->getLatLngCoordinatesByAddress($this->address);
    }
}
