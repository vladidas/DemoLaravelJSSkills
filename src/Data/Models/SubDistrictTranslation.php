<?php

namespace App\Data\Models;

/**
 * Class SubDistrictTranslation
 * @package App\Data\Models
 * @author  Vlad Golubtsov <v.golubtsov@bvblogic.com>
 */
class SubDistrictTranslation extends Model
{
    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var array
     */
    protected $guarded = [
        'id'
    ];
}
