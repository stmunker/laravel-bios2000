<?php

namespace Bios2000\Models;

use Bios2000\Models\Bios2000Master;
use Bios2000\Traits\HasCompositePrimaryKey;
use Eloquent;

/**
 * Class AuftragPosten
 * @mixin Eloquent
 * @package Bios2000\Models
 */
class AuftragPosten extends Bios2000Master
{
    use HasCompositePrimaryKey;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'AUFTRAG_POSTEN';

    /**
     * Primary Keys
     *
     * @var array
     */
    protected $primaryKey = ['ART', 'KUNU', 'NUMMER', 'LFD_NR'];

    public $incrementing = false;

}
