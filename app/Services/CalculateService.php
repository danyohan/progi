<?php

namespace App\Services;

use App\Interfaces\CalculationInterface;
use App\Repositories\CalculationRepository;
use App\Traits\CalculateTrait;

class CalculateService implements CalculationInterface
{
    use CalculateTrait;

    public function __construct(
        private readonly CalculationRepository $feeRepository
    ) {
    }

    public function calculateCost(float $budget, string $vehicleType): array
    {
        $result = array();

        //Fixed values
        $fixedFees = $this->feeRepository->getDataByType('fixed')->first();
        $fixedFee  = (float)$fixedFees->value;

        //Basic Values
        $basicFees = $this->feeRepository->getValueByVehicle('basic', $vehicleType);

        //Special Values
        $specialFees = $this->feeRepository->getValueByVehicle('special', $vehicleType);

        //Association  Values
        $assocFees = $this->feeRepository->getDataByName('association');

        $result['budget']               = $budget;
        $result['vehicleType']          = $vehicleType;
        $result['fees']['basic']        = $this->getValueBasic($budget, $basicFees->minimum, $basicFees->maximum,  $basicFees->value);
        $result['fees']['special']      = round($this->getValueSpecial($budget,  $specialFees->value), 2);
        $result['fees']['association']  = round($this->getAssociatedFees($budget,  $assocFees), 2);
        $result['fees']['storage']      = $fixedFee > 0 ? round($fixedFee, 2) : 0;
        $result['total']                = round($budget +  $result['fees']['basic'] + $result['fees']['special'] +  $result['fees']['association'] + $fixedFee, 2);

        return $result;
    }
}
