<?php

namespace Bios2000;

use Bios2000\Models\Archive;
use Bios2000\Models\Database\Address;
use Bios2000\Models\Database\Article;
use Bios2000\Models\Database\Capacities;
use Bios2000\Models\Database\ContactPerson;
use Bios2000\Models\Database\Country;
use Bios2000\Models\Database\Keys;
use Bios2000\Models\Database\OrderHead;
use Bios2000\Models\Database\ProductionOrderHead;
use Bios2000\Models\Database\ProductionOrderPositions;
use Bios2000\Models\Database\RepresentativeSales;

/**
 * Class Bios2000
 * @package Bios2000
 * @deprecated 
 */
class Bios2000
{

    public function __construct()
    {
        //
    }

    public function address()
    {
        return new Address;
    }

    public function person()
    {
        return new ContactPerson;
    }

    public function article()
    {
        return new Article;
    }

    public function representativeSales()
    {
        return new RepresentativeSales;
    }

    public function order()
    {
        return new OrderHead;
    }

    public function customer()
    {
        return (new Address())->where('KUNU', '<', 70000);
    }

    public function supplier()
    {
        return (new Address())->where('KUNU', '>=', 70000);
    }

    public function archive()
    {
        return new Archive;
    }

    public function country()
    {
        return new Country;
    }

    public function capacities()
    {
        return new Capacities;
    }

    public function keys($art, $nummer = NULL)
    {
        if ($nummer == NULL) {
            return (new Keys())->where('ART', $art);
        } else {
            return (new Keys())->where('ART', $art)->where('NUMMER', $nummer);
        }
    }

    public function productionOrderHead()
    {
        return new ProductionOrderHead;
    }

    public function productionOrderPositions()
    {
        return new ProductionOrderPositions;
    }
}
