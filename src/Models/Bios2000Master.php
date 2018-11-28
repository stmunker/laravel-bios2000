<?php

namespace Bios2000\Models;

use Illuminate\Database\Eloquent\Model;

class Bios2000Master extends Model
{
    /**
     * Connection name from config/database.php
     *
     * @var string
     */
    protected $connection = 'bios2000';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}
