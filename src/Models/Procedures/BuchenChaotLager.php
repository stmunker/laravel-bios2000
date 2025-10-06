<?php

namespace Bios2000\Models\Procedures;

use Bios2000\Dtos\ChaotLagerKarteiDto;
use Carbon\Carbon;

class BuchenChaotLager
{
    protected string $artnr;

    protected string $gang;

    protected string $ebene;

    protected string $fach;

    protected ?Carbon $datum;

    protected float $diffBestand;

    protected string $charge;

    protected ?ChaotLagerKarteiDto $chaotLagerKarteiDto = null;

    public function __construct(
        string $artnr,
        string $gang,
        string $ebene,
        string $fach,
        float $diffBestand,
        Carbon|string|null $datum = null,
        string $charge = ''
    ) {
        $this->artnr = $artnr;
        $this->gang = $gang;
        $this->ebene = $ebene;
        $this->fach = $fach;
        $this->diffBestand = $diffBestand;
        $this->setDatum($datum);
        $this->charge = $charge;
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
        $statement = "EXEC GP_BUCHEN_CHAOT_LAGER ";
        $statement .= "'" . $this->artnr . "', ";
        $statement .= "'" . $this->gang . "', ";
        $statement .= "'" . $this->ebene . "', ";
        $statement .= "'" . $this->fach . "', ";
        $statement .= "'" . $this->datum->format('d.m.Y H:i:s') . "', ";
        $statement .= $this->diffBestand . ", ";
        $statement .= "'" . $this->charge . "'";

        return $statement;
    }

    public function createChaotLagerKarteiDto(array $data): ChaotLagerKarteiDto
    {
        $this->chaotLagerKarteiDto = new ChaotLagerKarteiDto($data);

        return $this->chaotLagerKarteiDto;
    }
}
