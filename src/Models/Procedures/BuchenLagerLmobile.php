<?php

namespace Bios2000\Models\Procedures;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class BuchenLagerLmobile
{
    protected string $artnr;

    protected int $lager;

    protected float $diffBestand;

    protected float $diffRueckstand;

    protected float $diffBestellt;

    protected float $diffBbk;

    protected string $doak;

    protected ?Carbon $datum;

    protected string $kunu;

    protected string $lagerort;

    public function __construct(
        string $artnr,
        int $lager,
        float $diffBestand,
        float $diffRueckstand,
        float $diffBestellt,
        float $diffBbk,
        string $doak = 'J',
        Carbon|null $datum = null,
        string $kunu = '99996',
        string $lagerort = ''
    ) {
        $this->artnr = $artnr;
        $this->lager = $lager;
        $this->diffBestand = $diffBestand;
        $this->diffRueckstand = $diffRueckstand;
        $this->diffBestellt = $diffBestellt;
        $this->diffBbk = $diffBbk;
        $this->doak = $doak;
        $this->datum = $datum;
        $this->kunu = $kunu;
        $this->lagerort = $lagerort;
    }

    public function call(): void
    {
        $statement = 'exec GP_BUCHEN_LAGER_LMOBILE ';
        $statement .= $this->artnr . ', ';
        $statement .= $this->lager . ', ';
        $statement .= $this->diffBestand . ', ';
        $statement .= $this->diffRueckstand . ', ';
        $statement .= $this->diffBestellt . ', ';
        $statement .= $this->diffBbk . ', ';
        $statement .= $this->doak . ', ';
        $statement .= $this->datum->format('d.m.Y H:i:s') . ', ';
        $statement .= $this->kunu . ', ';
        $statement .= $this->lagerort;

        dd($statement);
        DB::statement($statement);
    }
}
