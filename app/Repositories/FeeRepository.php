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

    public function getDataById(int $id)
    {
        return Fee::where('id', $id)->get();
    }

    public function getValueByVehicle(string $name, string $vehicleType)
    {
        return Fee::where('name', $name)->where('vehicleType', $vehicleType)->first();
    }
}
