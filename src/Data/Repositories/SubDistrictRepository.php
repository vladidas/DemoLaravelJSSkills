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
     * Delete all rows.
     *
     * @return bool|null
     * @throws \Exception
     */
    public function deleteAll()
    {
        return $this->model->query()->delete();
    }

    /**
     * Add row.
     *
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    /**
     * @param $perPage
     * @param array $params
     * @param array $relations
     * @param string $orderBy
     * @param string $sorting
     * @return mixed
     */
    public function getPaginatorWithQueryParams(
        $perPage,
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
