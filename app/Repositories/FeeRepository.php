<?php

namespace App\Repositories;

use App\Models\Fee;

class FeeRepository
{

    public function getDataByType(string $type)
    {
        return Fee::where('type', $type)->get();
    }

    public function getDataByName(string $name)
    {
        return Fee::where('name', $name)->get();
    }

    public function getTypeAssocMinValue()
    {
        return Fee::where('type', 'assoc')->min('value');
    }

    public function getTypeAssocMaxValue()
    {
        return Fee::where('type', 'assoc')->max('value');
    }
}
