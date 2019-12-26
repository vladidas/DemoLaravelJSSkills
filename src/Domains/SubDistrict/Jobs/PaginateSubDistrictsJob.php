<?php

namespace App\Domains\SubDistrict\Jobs;

use Lucid\Foundation\Job;
use App\Data\Repositories\SubDistrictRepository;

/**
 * Class PaginateSubDistrictsJob
 * @package App\Domains\SubDistrict\Jobs
 * @author  Vlad Golubtsov <v.golubtsov@bvblogic.com>
 */
class PaginateSubDistrictsJob extends Job
{
    /**
     * @var int
     */
    protected $perPage;

    /**
     * @var array
     */
    protected $relations;

    /**
     * @var string
     */
    protected $orderBy;

    /**
     * @var string
     */
    protected $sorting;

    /**
     * @var array
     */
    protected $attributes;

    /**
     * PaginateProductsJob constructor.
     * @param int $perPage
     * @param array $attributes
     * @param array $relations
     * @param string $orderBy
     * @param string $sorting
     */
    public function __construct(
        int $perPage,
        array $attributes,
        array $relations = [],
        string $orderBy  = 'created_at',
        string $sorting  = 'desc'
    ) {
        $this->perPage    = $perPage;
        $this->attributes = $attributes;
        $this->relations  = $relations;
        $this->orderBy    = $orderBy;
        $this->sorting    = $sorting;
    }

    /**
     * @param SubDistrictRepository $subDistrictRepository
     * @return array
     */
    public function handle(SubDistrictRepository $subDistrictRepository): array
    {
        return $subDistrictRepository->getPaginatorWithQueryParams(
            $this->perPage,
            $this->attributes,
            $this->relations,
            $this->orderBy,
            $this->sorting
        )->toArray();
    }
}
