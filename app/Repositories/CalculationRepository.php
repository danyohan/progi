<?php

namespace App\Repositories;

use App\Models\Fee;

class CalculationRepository
{
    public function getDataByType(string $type)
    {
        return Fee::where('type', $type)->get();
    }

    public function getDataByName(string $name)
    {
        return Fee::where('name', $name)->get();
    }

    public function getValueByVehicle(string $name, string $vehicleType)
    {
        return Fee::where('name', $name)->where('vehicleType',
            $vehicleType)->first();
    }
}
