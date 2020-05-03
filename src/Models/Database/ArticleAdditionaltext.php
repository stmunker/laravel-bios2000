<?php

namespace Bios2000\Models\Database;

use Bios2000\Models\Bios2000Master;

/**
 * Class ArticleAdditionaltext
 * @package Bios2000\Models\Database
 * @deprecated
 */
class ArticleAdditionaltext extends Bios2000Master
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ARTIKEL_ZUSATZTEXT';

    /**
     * Primary Key
     *
     * @var string
     */
    protected $primaryKey = "ARTNR";

}
