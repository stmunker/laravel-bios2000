<?php

namespace Bios2000\Models;

use Bios2000\Models\Bios2000Master;
use Eloquent;
use Illuminate\Support\Facades\DB;

/**
 * Class Artikel
 * @package Bios2000\Models
 * @mixin Eloquent
 */
class Artikel extends Bios2000Master
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

    public function chaotLager()
    {
        return $this->hasMany(ChaotLager::class, 'ARTNR', 'ARTNR');
    }

    public function zusatztexte($lang = 0)
    {
        return $this->hasMany(ArtikelZusatztext::class, 'ARTNR', 'ARTNR')
            ->where('SPRACHE', $lang);
    }

    public function lager()
    {
        return $this->hasMany(ArtikelLager::class, 'ARTNR', 'ARTNR');
    }

// TODO:
//    public function stock()
//    {
//        $article_stock = DB::connection($this->connection)->table('ARTIKEL_LAGER')
//            ->select(DB::raw("sum(BESTAND)-(SELECT ISNULL(sum(d.BESTAND), 0.00) FROM ARTIKEL_LAGER d (NOLOCK) WHERE
//                    (d.ARTNR = '" . $this->ARTNR . "' AND d.LAGER = -1)) -(SELECT ISNULL(sum(d.BESTAND), 0.00) FROM
//                    ARTIKEL_LAGER d (NOLOCK) WHERE (d.ARTNR = '" . $this->ARTNR . "' AND d.LAGER IN (SELECT y.NUMMER FROM
//                    SCHLUESSEL y WHERE y.ART = 'LG' AND y.EU_KZ = 'J' ))) as SUM_BESTAND"))
//            ->addSelect(DB::raw("sum(BESTELLT) as SUM_BESTELLT"))
//            ->addSelect(DB::raw("sum(RUECKSTAND) as SUM_RUECKSTAND"))
//            ->addSelect(DB::raw("sum(MIBEST) as SUM_MIBEST"))
//            ->addSelect(DB::raw("sum(SOLLBEST) as SUM_SOLLBEST"))
//            ->addSelect(DB::raw("sum(BBK) as SUM_BBK"))
//            ->addSelect(DB::raw("(SELECT ISNULL(sum(a.GELIEFERT), 0.00) FROM AUFTRAG_POSTEN a (NOLOCK) WHERE (a.ART = 'A' AND a.ZEILEN_ART = 'L' AND a.ARTNR = '" . $this->ARTNR . "'))
//                    +(SELECT ISNULL(sum(d.BESTAND), 0.00) FROM ARTIKEL_LAGER d (NOLOCK) WHERE (d.ARTNR = '" . $this->ARTNR . "' AND d.LAGER = -1))
//                    +(SELECT ISNULL(sum(p.ABRUFMENGE), 0.00) FROM VDA_ABRUF_POSTEN p (NOLOCK)
//                        LEFT OUTER JOIN VDA_ABRUF_KOPF k (NOLOCK) ON (p.NUMMER = k.NUMMER)
//                        WHERE (k.ARTNR = '" . $this->ARTNR . "') AND (k.TESTKENNZEICHEN = 0) AND (p.GELIEFERT_FLAG = 'J'))
//                    +(SELECT ISNULL(sum(g.GELIEFERT),0.00) FROM PACKMITTEL_ARTNR_GELIEFERT g (NOLOCK) WHERE (g.ARTNR = '" . $this->ARTNR . "')) as SUM_RESERVIERT"))
//            ->where('ARTNR', '=', $this->ARTNR)
//            ->where('LAGER', '!=', '6')// 6 = Sperrlager
//            ->first();
//
//        return $article_stock;
//    }
}
