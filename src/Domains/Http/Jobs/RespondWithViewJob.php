<?php

namespace App\Domains\Http\Jobs;

use Lucid\Foundation\Job;
use Illuminate\Routing\ResponseFactory;

/**
 * Class RespondWithViewJob
 * @package App\Domains\Http\Jobs
 * @author  Vlad Golubtsov <v.golubtsov@bvblogic.com>
 */
class RespondWithViewJob extends Job
{
    /**
     * @var int
     */
    protected $status;

    /**
     * @var array
     */
    protected $data;

    /**
     * @var array
     */
    protected $headers;

    /**
     * @var string
     */
    protected $template;

    /**
     * RespondWithViewJob constructor.
     * @param $template
     * @param array $data
     * @param int $status
     * @param array $headers
     */
    public function __construct($template, $data = [], $status = 200, array $headers = [])
    {
        $this->template = $template;
        $this->data = $data;
        $this->status = $status;
        $this->headers = $headers;
    }

    /**
     * @param ResponseFactory $factory
     * @return \Illuminate\Http\Response
     */
    public function handle(ResponseFactory $factory)
    {
        return $factory->view($this->template, $this->data, $this->status, $this->headers);
    }
}
