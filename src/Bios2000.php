<?php

namespace Bios2000;

use Bios2000\Models\Database\Address;

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

    public function customer()
    {
        return (new Address())->where('KUNU', '<', 70000);
    }
}