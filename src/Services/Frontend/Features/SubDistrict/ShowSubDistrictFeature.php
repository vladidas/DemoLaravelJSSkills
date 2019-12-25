<?php

namespace App\Services\Frontend\Features\SubDistrict;

use Lucid\Foundation\Feature;
use App\Domains\Http\Jobs\RespondWithViewJob;
use App\Data\Repositories\SubDistrictRepository;

/**
 * Class ShowSubDistrictFeature
 * @package App\Services\Frontend\Features\SubDistrict
 * @author  Vlad Golubtsov <v.golubtsov@bvblogic.com>
 */
class ShowSubDistrictFeature extends Feature
{
    /**
     * @var int
     */
    protected $id;

    /**
     * ShowSubDistrictFeature constructor.
     * @param int $id
     */
    public function __construct(int $id)
    {
        $this->id = $id;
    }

    /**
     * @param SubDistrictRepository $subDistrictRepository
     * @return mixed
     */
    public function handle(SubDistrictRepository $subDistrictRepository)
    {
        $item = $subDistrictRepository->find($this->id);

        return $this->run(new RespondWithViewJob('frontend::sub-districts.show', [
            'item' => $item
        ]));
    }
}
