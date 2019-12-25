<?php

namespace App\Domains\Http\Jobs;

use Lucid\Foundation\Job;
use Illuminate\Routing\ResponseFactory;

/**
 * Class RespondWithJsonJob
 * @package App\Domains\Http\Jobs
 * @author  Vlad Golubtsov <v.golubtsov@bvblogic.com>
 */
class RespondWithJsonJob extends Job
{
    /**
     * @var int
     */
    protected $status;

    /**
     * @var string
     */
    protected $content;

    /**
     * @var array
     */
    protected $headers;

    /**
     * @var int
     */
    protected $options;

    /**
     * RespondWithJsonJob constructor.
     * @param $content
     * @param int $status
     * @param array $headers
     * @param int $options
     */
    public function __construct($content, $status = 200, array $headers = [], $options = 0)
    {
        $this->content = $content;
        $this->status = $status;
        $this->headers = $headers;
        $this->options = $options;
    }

    /**
     * @param ResponseFactory $factory
     * @return \Illuminate\Http\JsonResponse
     */
    public function handle(ResponseFactory $factory)
    {
        $response = [
            'data' => $this->content,
            'status' => $this->status,
        ];

        return $factory->json($response, $this->status, $this->headers, $this->options);
    }
}
