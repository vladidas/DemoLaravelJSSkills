<?php

namespace App\Services\Dashboard\Features\SubDistrict;

use Illuminate\Bus\Queueable;
use Lucid\Foundation\Feature;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Domains\SubDistrict\Jobs\ReCreateSubDistrictsJob;
use App\Domains\SubDistrict\Jobs\ParseSubDistrictsByUrlJob;

/**
 * Class ImportSubDistrictsFeature
 * @package App\Services\Dashboard\Features\City
 * @author  Vlad Golubtsov <v.golubtsov@bvblogic.com>
 */
class ImportSubDistrictsFeature extends Feature implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var string
     */
    protected $url;

    /**
     * ImportSubDistrictsFeature constructor.
     */
    public function __construct()
    {
        $this->url = [
            'en' => env('PARSE_SITE_URL_EN'),
//            'pl' => env('PARSE_SITE_URL_PL'),
        ];
    }

    /**
     * Parse and save data.
     */
    public function handle()
    {
        /** Build result multilingual data. */
        $result = [];
        foreach ($this->url as $locale => $url) {

            $subDistricts = $this->run(new ParseSubDistrictsByUrlJob($url));
            foreach ($subDistricts as $key => $subDistrict) {

                $result[$key] = $subDistrict;
                $result[$key][$locale]['name']       = $subDistrict['name'];
                $result[$key][$locale]['mayor_name'] = $subDistrict['mayor_name'];
                $result[$key][$locale]['address']    = $subDistrict['address'];
                unset(
                    $result[$key]['name'],
                    $result[$key]['mayor_name'],
                    $result[$key]['address']
                );
            }
        }

        $this->run(new ReCreateSubDistrictsJob($result));
    }
}
