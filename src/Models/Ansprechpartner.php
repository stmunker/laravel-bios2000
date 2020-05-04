<?php

namespace Bios2000\Models;

use Bios2000\Models\Bios2000Master;
use Bios2000\Traits\HasCompositePrimaryKey;
use Eloquent;

/**
 * Class ContactPerson
 * @mixin Eloquent;
 */
class Ansprechpartner extends Bios2000Master
{
    use HasCompositePrimaryKey;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ANSPRECHPARTNER';

    /**
     * Primary Key
     *
     * @var string
     */
    protected $primaryKey = ['NUMMER', 'KUERZEL'];
    public $incrementing = false;


}
