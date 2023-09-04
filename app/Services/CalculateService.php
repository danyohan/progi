<?php

namespace App\Services;

use App\Repositories\FeeRepository;
use App\Traits\CalculateTrait;

class CalculateService
{
    use CalculateTrait;

    public function __construct(
        private FeeRepository $feeRepository
    ) {
    }

    public function getDataByType(string $type)
    {
        return $this->feeRepository->getDataByType($type);
    }

    public function getDataByName(string $name)
    {
        return $this->feeRepository->getDataByName($name);
    }

    public function calculateCost(float $budget, string $vehicleType): array
    {
        $result = array();

        //Fixed avlues
        $fixedFees = $this->feeRepository->getDataByType('fixed')->first();
        $fixedFee  = (float)$fixedFees->value;

        //Basic Values
        $basicFees = $this->feeRepository->getValueByVehicle('basic', $vehicleType);

        //Special Values
        $specialFees = $this->feeRepository->getValueByVehicle('special', $vehicleType);

        //association  Values
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
