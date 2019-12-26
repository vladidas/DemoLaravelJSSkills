<?php

namespace App\Domains\SubDistrict\Jobs;

use Lucid\Foundation\Job;
use Sunra\PhpSimple\HtmlDomParser;

/**
 * Class ParseSubDistrictsByUrlJob
 * @package App\Domains\SubDistrict\Jobs
 * @author  Vlad Golubtsov <v.golubtsov@bvblogic.com>
 */
class ParseSubDistrictsByUrlJob extends Job
{
    /**
     * @var string
     */
    protected $url;

    /**
     * ParseSubDistrictsByUrlJob constructor.
     * @param string $url
     */
    public function __construct(string $url)
    {
        $this->url = $url;
    }

    /**
     * @return array
     */
    public function handle(): array
    {
        $result = [];

        /** Parse district. */
        $subDistrictsList = $this->parseDistrict($this->url);
        foreach ($subDistrictsList as $subDistrict) {

            /** Parse sub-districts. */
            $subDistrictItems = $this->parseSubDistricts($subDistrict->href);
            foreach ($subDistrictItems as $key => $subDistrictItem) {

                /** Validate empty href. */
                if ($subDistrictItem->href === '#') {
                    continue;
                }

                /** Parse sub-district info. */
                $subDistrictInfo = $this->parseSubDistrictInfo($subDistrictItem->href);

                /** Build result array. */
                $result[$key]['name'] = $subDistrictItem->text();
                $result[$key] = array_merge($result[$key], $subDistrictInfo);
            }
        }

        return $result;
    }

    /**
     * @param string $url
     * @return array
     */
    protected function parseDistrict(string $url): array
    {
        $html = HtmlDomParser::file_get_html($url, false, null, 0);
        return $html->find('#okres table td a');
    }

    /**
     * @param string $url
     * @return array
     */
    protected function parseSubDistricts(string $url): array
    {
        $html = HtmlDomParser::file_get_html($url, false, null, 0);
        return $html->find('#telo table table', 8)->find('a');
    }

    /**
     * @param string $url
     * @return array
     */
    protected function parseSubDistrictInfo(string $url): array
    {
        $html = HtmlDomParser::file_get_html($url, false, null, 0);
        $html = $html->find('#telo table', 9);

        $data['address']     = $html->find('td', 12)->text() . ', '
            . $html->find('td', 15)->text();
        $data['phone']       = $html->find('td', 8)->text();
        $data['fax']         = $html->find('td', 11)->text();
        $data['email']       = $html->find('td', -4)->text();
        $data['web_address'] = $html->find('td', -1)->text();
        if ($html->find('td', 4)->find('img', 0)) {
            $data['image']   = $html->find('td', 4)->find('img', 0)->attr['src'];
        }

        $html = HtmlDomParser::file_get_html($url, false, null, 0);
        $html = $html->find('#telo table', 12);
        $data['mayor_name'] = $html->find('td', -3)->text();

        return $data;
    }
}
