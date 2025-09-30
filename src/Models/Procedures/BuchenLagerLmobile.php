<?php

namespace Bios2000\Models\Procedures;

use Carbon\Carbon;

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
        Carbon|string|null $datum = null,
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
        $this->setDatum($datum);
        $this->kunu = $kunu;
        $this->lagerort = $lagerort;
    }

    /**
     * Ensure datum is always a Carbon instance.
     * Accepts null, string, or Carbon. Null or empty string becomes now().
     */
    protected function setDatum(Carbon|string|null $datum): void
    {
        if ($datum instanceof Carbon) {
            $this->datum = $datum;
            return;
        }

        if (is_null($datum)) {
            $this->datum = Carbon::now();
            return;
        }

        if (is_string($datum)) {
            $trimmed = trim($datum);
            $this->datum = $trimmed === '' ? Carbon::now() : Carbon::parse($trimmed);
            return;
        }

        // Fallback, though types cover all cases
        $this->datum = Carbon::now();
    }

    public function getSqlStatement(): string
    {
        $statement = 'exec GP_BUCHEN_LAGER_LMOBILE ';
        $statement .= "'" . $this->artnr . "', ";
        $statement .= $this->lager . ', ';
        $statement .= $this->diffBestand . ', ';
        $statement .= $this->diffRueckstand . ', ';
        $statement .= $this->diffBestellt . ', ';
        $statement .= $this->diffBbk . ', ';
        $statement .= "'" . $this->doak . "', ";
        $statement .= "'" . $this->datum->format('d.m.Y H:i:s') . "', ";
        $statement .= "'" . $this->kunu . "', ";
        $statement .= "'" . $this->lagerort . "'";

        return $statement;
    }
}
