<?php

namespace App\Services\Frontend\Features\SubDistrict;

use Lucid\Foundation\Feature;
use App\Domains\Http\Jobs\RespondWithJsonJob;
use App\Domains\SubDistrict\Jobs\PaginateSubDistrictsJob;
use App\Services\Frontend\Http\Requests\SubDistrict\SearchSubDistrictsRequest;

/**
 * Class SearchSubDistrictsFeature
 * @package App\Services\Frontend\Features\SubDistrict
 * @author  Vlad Golubtsov <v.golubtsov@bvblogic.com>
 */
class SearchSubDistrictsFeature extends Feature
{
    /**
     * @param SearchSubDistrictsRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function handle(SearchSubDistrictsRequest $request)
    {
        $attributes = $request->only('name');

        $items = $this->run(new PaginateSubDistrictsJob(
            10,
            $attributes,
            [
                'translation'
            ]
        ));

        return $this->run(new RespondWithJsonJob([
            'success' => true,
            'items'   => $items
        ]));
    }
}
