<?php

namespace App\Interfaces;

interface CalculationInterface
{

    /**
     * @param float $budget
     * @param string $vehicleType
     * @return mixed
     */
    public function calculateCost(float $budget, string $vehicleType);

}
