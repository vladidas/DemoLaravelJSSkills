<?php

namespace App\Data\Services;

use App\Data\AbstractClasses\GuzzleSenderAbstract;

/**
 * Class GoogleApiService
 * @package App\Data\Services
 * @author  Vlad Golubtsov <v.golubtsov@bvblogic.com>
 */
class GoogleApiService extends GuzzleSenderAbstract
{
    /**
     * Get Google API key.
     *
     * @return string
     */
    public function getGoogleApiKey(): string
    {
        return env('GOOGLE_API_KEY');
    }

    /**
     * Get Google API URL.
     *
     * @return string
     */
    public function getGoogleApiUrl(): string
    {
        return env('GOOGLE_API_URL');
    }

    /**
     * @param string $address
     * @return mixed
     * @throws \Exception
     */
    public function getLatLngCoordinatesByAddress(string $address)
    {
        /** Send request to Google Api Service. */
        $url = $this->getGoogleApiUrl();
        $params = [
            'key'     => $this->getGoogleApiKey(),
            'address' => $address,
        ];

        /** Get result response. */
        $response = $this->send($url, $params);

        if (!$response->isSuccessStatus()) {
            throw new \Exception('Error receiving coordinates.');
        }

        /** Get result coordinates. */
        $result = $response->getResultBody()->get('results');

        if (!$result) {
            throw new \Exception('Empty result from Google Api.');
        }

        return $result[0]['geometry']['location'];
    }
}
