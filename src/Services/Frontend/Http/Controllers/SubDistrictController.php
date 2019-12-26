<?php

namespace App\Services\Frontend\Http\Controllers;

use Lucid\Foundation\Http\Controller;
use App\Services\Frontend\Features\SubDistrict\ShowSubDistrictFeature;
use App\Services\Frontend\Features\SubDistrict\SubDistrictsPageFeature;
use App\Services\Frontend\Features\SubDistrict\SearchSubDistrictsFeature;

/**
 * Class SubDistrictController
 * @package App\Services\Frontend\Http\Controllers
 * @author  Vlad Golubtsov <v.golubtsov@bvblogic.com>
 */
class SubDistrictController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->serve(SubDistrictsPageFeature::class);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->serve(ShowSubDistrictFeature::class, [
            'id' => (int)$id
        ]);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function search()
    {
        return $this->serve(SearchSubDistrictsFeature::class);
    }
}
