<?php

namespace Bios2000\Models\Procedures;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class BuchenChaotLager
{
    protected string $artnr;

    protected string $gang;

    protected string $ebene;

    protected string $fach;

    protected ?Carbon $datum;

    protected float $diffBestand;

    protected string $charge;

    public function __construct(
        string $artnr,
        string $gang,
        string $ebene,
        string $fach,
        float $diffBestand,
        Carbon|null $datum = null,
        string $charge = ''
    ) {
        $this->artnr = $artnr;
        $this->gang = $gang;
        $this->ebene = $ebene;
        $this->fach = $fach;
        $this->diffBestand = $diffBestand;
        $this->datum = $datum;
        $this->charge = $charge;
    }

    public function call(): void
    {
        $statement = 'exec GP_BUCHEN_CHAOT_LAGER ';
        $statement .= $this->artnr . ', ';
        $statement .= $this->gang . ', ';
        $statement .= $this->ebene . ', ';
        $statement .= $this->fach . ', ';
        $statement .= $this->datum->format('d.m.Y H:i:s') . ', ';
        $statement .= $this->diffBestand . ', ';
        $statement .= $this->charge;

        dd($statement);
        DB::statement($statement);
    }
}
