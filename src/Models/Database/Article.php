<?php

namespace Bios2000\Models\Database;

use Bios2000\Models\Bios2000Master;

class Article extends Bios2000Master
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ARTIKEL_STAMM';

    /**
     * Primary Key
     *
     * @var string
     */
    protected $primaryKey = "ARTNR";

    public $incrementing = false;


    /**
     * Get info text of article
     *
     * @param int $lang
     * @return ArticleAdditionaltext
     */
    public function additionaltext($lang = 0)
    {
        return $this->hasMany('Bios2000\Models\Database\ArticleAdditionaltext', 'ARTNR', 'ARTNR')->where('SPRACHE', $lang);
    }
}
