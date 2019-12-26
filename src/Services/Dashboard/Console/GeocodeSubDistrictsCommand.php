<?php

namespace App\Services\Dashboard\Console;

use App\Services\Dashboard\Features\SubDistrict\GeocodeSubDistrictsFeature;

/**
 * Class GeocodeSubDistrictsCommand
 * @package App\Services\Dashboard\Console
 * @author  Vlad Golubtsov <v.golubtsov@bvblogic.com>
 */
class GeocodeSubDistrictsCommand extends LucidCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data:geocode';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add geocode to all sub-districts in the queue';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $this->serve(new GeocodeSubDistrictsFeature());
    }
}
