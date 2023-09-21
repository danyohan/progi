<?php

namespace App\Repositories;

use App\Models\Fee;

class CalculationRepository
{
    /**
     * Function to get the fee by Type
     *
     * @param string $type
     * @return mixed
     */
    public function getDataByType(string $type)
    {
        return Fee::where('type', $type)->get();
    }

    /**
     * Function to get the fee by Name
     *
     * @param string $name
     * @return mixed
     */
    public function getDataByName(string $name)
    {
        return Fee::where('name', $name)->get();
    }

    /**
     * Function to get the fee by Vehicle
     *
     * @param string $name
     * @param string $vehicleType
     * @return mixed
     */
    public function getValueByVehicle(string $name, string $vehicleType)
    {
        return Fee::where('name', $name)->where('vehicleType', $vehicleType)->first();
    }
}
