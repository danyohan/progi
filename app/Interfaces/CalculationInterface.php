<?php

namespace App\Interfaces;

interface CalculationInterface
{

    public function calculateCost(float $budget, string $vehicleType);

}
