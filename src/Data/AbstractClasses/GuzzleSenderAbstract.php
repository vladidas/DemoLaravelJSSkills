<?php

namespace App\Data\AbstractClasses;

use GuzzleHttp\Client;
use Illuminate\Support\Collection;

/**
 * Class GuzzleSenderAbstract
 * @package App\Data\AbstractClasses
 * @author  Vlad Golubtsov <v.golubtsov@bvblogic.com>
 */
class GuzzleSenderAbstract
{
    /**
     * @var
     */
    protected $response;

    /**
     * @param string $url
     * @param array $params
     * @return $this
     */
    public function send(string $url, array $params)
    {
        $client = new Client();
        $this->response = $client->get($url, [
            'query' => $params
        ]);

        return $this;
    }

    /**
     * @return mixed
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @return mixed
     */
    public function getStatusCode()
    {
        return $this->getResponse()->getStatusCode();
    }

    /**
     * @return mixed
     */
    public function isSuccessStatus()
    {
        return $this->getStatusCode() === 200;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getResultBody(): Collection
    {
        $result = json_decode($this->getResponse()->getBody(), true);

        return collect($result);
    }
}
