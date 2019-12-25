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
     * @return mixed
     */
    public function index()
    {
        return $this->serve(SubDistrictsPageFeature::class);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        return $this->serve(ShowSubDistrictFeature::class, [
            'id' => (int)$id
        ]);
    }

    /**
     * @return mixed
     */
    public function search()
    {
        return $this->serve(SearchSubDistrictsFeature::class);
    }
}
