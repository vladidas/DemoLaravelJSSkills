<?php

namespace App\Domains\Http\Jobs;

use Illuminate\Routing\ResponseFactory;

/**
 * Class RespondWithJsonErrorJob
 * @package App\Domains\Http\Jobs
 * @author  Vlad Golubtsov <v.golubtsov@bvblogic.com>
 */
class RespondWithJsonErrorJob extends RespondWithJsonJob
{
    /**
     * RespondWithJsonErrorJob constructor.
     * @param string $message
     * @param int $code
     * @param int $status
     * @param array $headers
     * @param int $options
     */
    public function __construct($message = 'An error occurred', $code = 400, $status = 400, $headers = [], $options = 0)
    {
        $this->content = [
            'status' => $status,
            'error' => [
                'code' => $code,
                'message' => $message,
            ],
        ];

        $this->status = $status;
        $this->headers = $headers;
        $this->options = $options;
    }

    /**
     * @param ResponseFactory $response
     * @return \Illuminate\Http\JsonResponse
     */
    public function handle(ResponseFactory $response)
    {
        return $response->json($this->content, $this->status, $this->headers, $this->options);
    }
}
