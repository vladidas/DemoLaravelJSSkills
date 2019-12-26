<?php

namespace App\Data\AbstractClasses;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;

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
     * @return GuzzleSenderAbstract
     */
    public function send(string $url, array $params): GuzzleSenderAbstract
    {
        $client = new Client();
        $this->response = $client->get($url, [
            'query' => $params
        ]);

        return $this;
    }

    /**
     * @return Response
     */
    public function getResponse(): Response
    {
        return $this->response;
    }

    /**
     * @return int
     */
    public function getStatusCode(): int
    {
        return $this->getResponse()->getStatusCode();
    }

    /**
     * @return bool
     */
    public function isSuccessStatus(): bool
    {
        return $this->getStatusCode() === 200;
    }

    /**
     * @return array
     */
    public function getResultBody()
    {
        return json_decode($this->getResponse()->getBody(), true);
    }
}
