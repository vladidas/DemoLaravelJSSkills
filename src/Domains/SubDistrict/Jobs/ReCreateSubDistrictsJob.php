<?php

namespace App\Domains\SubDistrict\Jobs;

use Lucid\Foundation\Job;
use App\Data\Models\SubDistrict;
use Illuminate\Support\Facades\DB;
use App\Data\Repositories\SubDistrictRepository;

/**
 * Class ReCreateSubDistrictsJob
 * @package App\Domains\SubDistrict\Jobs
 * @author  Vlad Golubtsov <v.golubtsov@bvblogic.com>
 */
class ReCreateSubDistrictsJob extends Job
{
    /**
     * @var array
     */
    protected $subDistricts;

    /**
     * ReCreateSubDistrictsJob constructor.
     * @param array $subDistricts
     */
    public function __construct(array $subDistricts)
    {
        $this->subDistricts = $subDistricts;
    }

    /**
     * @param SubDistrictRepository $subDistrictRepository
     * @return bool
     */
    public function handle(SubDistrictRepository $subDistrictRepository): bool
    {
        try {

            DB::beginTransaction();

            /** Delete all records with picture. We can only delete an image when we
             * initialize each iteration in a loop. */
            $districts = $subDistrictRepository->all();
            foreach ($districts as $district) {
                $district->delete();
            }

            /** Save sub-district with picture. */
            foreach ($this->subDistricts as $subDistrict) {
                $image = null;
                if (array_key_exists('image', $subDistrict)) {
                    $image = $subDistrict['image'];
                    unset($subDistrict['image']);
                }

                $subDistrict = $subDistrictRepository->create($subDistrict);

                if ($image) {
                    $subDistrict->addMediaFromUrl($image)->toMediaCollection(SubDistrict::MEDIA_IMAGE_COLLECTION);
                }
            }

            DB::commit();
            return true;

        } catch (\PDOException $e) {

            logger('Error re-created sub-districts in the DB... ' . $e);
            DB::rollBack();

        }

        return false;
    }
}
