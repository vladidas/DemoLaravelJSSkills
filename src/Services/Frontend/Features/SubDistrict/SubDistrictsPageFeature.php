<?php

namespace App\Services\Frontend\Features\SubDistrict;

use Lucid\Foundation\Feature;
use App\Domains\Http\Jobs\RespondWithViewJob;

/**
 * Class SubDistrictsPageFeature
 * @package App\Services\Frontend\Features\SubDistrict
 * @author  Vlad Golubtsov <v.golubtsov@bvblogic.com>
 */
class SubDistrictsPageFeature extends Feature
{
    /**
     * @return mixed
     */
    public function handle()
    {
        return $this->run(new RespondWithViewJob('frontend::sub-districts.index'));
    }
}
