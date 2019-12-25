<?php

namespace App\Domains\Queue;

/**
 * Class AbstractQueue
 * @package App\Domains\Queue
 * @author  Vlad Golubtsov <v.golubtsov@bvblogic.com>
 */
abstract class AbstractQueue
{
    protected $name = '';

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->name;
    }
}
