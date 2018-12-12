<?php

namespace Bios2000;

use Bios2000\Models\Archive;
use Bios2000\Models\Database\Address;
use Bios2000\Models\Database\Article;

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

    public function article()
    {
        return new Article;
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
}