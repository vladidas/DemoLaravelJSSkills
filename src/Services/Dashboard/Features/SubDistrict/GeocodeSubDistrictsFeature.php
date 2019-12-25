<?php

namespace App\Services\Dashboard\Features\SubDistrict;

use Lucid\Foundation\Feature;
use Illuminate\Bus\Queueable;
use App\Data\Models\SubDistrict;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Domains\SubDistrict\Jobs\GetAllSubDistrictsJob;
use App\Domains\SubDistrict\Jobs\UpdateSubDistrictsJob;
use App\Domains\SubDistrict\Jobs\GetGeocodeByAddressNameJob;

/**
 * Class GeocodeSubDistrictsFeature
 * @package App\Services\Dashboard\Features\City
 * @author  Vlad Golubtsov <v.golubtsov@bvblogic.com>
 */
class GeocodeSubDistrictsFeature extends Feature implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Update geocode coordinates in all sub-districts.
     */
    public function handle()
    {
        $subDistricts = $this->run(new GetAllSubDistrictsJob());

        foreach ($subDistricts as $subDistrict) {
            /** @var SubDistrict $subDistrict */
            $coordinates = $this->run(new GetGeocodeByAddressNameJob($subDistrict->getAddress()));
            $this->run(new UpdateSubDistrictsJob($subDistrict->getId(), $coordinates));
        }
    }
}
