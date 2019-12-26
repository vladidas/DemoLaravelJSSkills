<?php

namespace App\Data\Repositories;

use App\Data\Models\SubDistrict;

/**
 * Class SubDistrictRepository
 * @package App\Data\Repositories
 * @author  Vlad Golubtsov <v.golubtsov@bvblogic.com>
 */
class SubDistrictRepository extends Repository
{
    /**
     * SubDistrictRepository constructor.
     * @param SubDistrict $subDistrict
     */
    public function __construct(SubDistrict $subDistrict)
    {
        parent::__construct($subDistrict);
    }

    /**
     * @param int $perPage
     * @param array $params
     * @param array $relations
     * @param string $orderBy
     * @param string $sorting
     * @return \Illuminate\Database\Eloquent\Builder[]|
     * \Illuminate\Database\Eloquent\Collection|
     * \Illuminate\Database\Eloquent\Model[]|
     * \Illuminate\Database\Query\Builder[]|
     * \Illuminate\Support\Collection
     */
    public function getPaginatorWithQueryParams(
        int $perPage,
        array $params    = [],
        array $relations = [],
        string $orderBy  = 'created_at',
        string $sorting  = 'desc'
    ) {
        $query = $this->model->with($relations)
            ->select('*')
            ->join('sub_district_translations AS s_d_t', function($join) {
                $join->on('s_d_t.sub_district_id', 'sub_districts.id')
                    ->where('s_d_t.locale', app()->getLocale());
            });

        foreach ($params as $field => $param) {
            $query = $query->where($field, 'like', '%' . $param . '%');
        }

        return $query
            ->orderBy($orderBy, $sorting)
            ->take($perPage)
            ->get();
    }
}
