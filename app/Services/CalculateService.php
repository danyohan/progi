<?php

namespace App\Services;

use App\Repositories\FeeRepository;

class CalculateService
{
    /**
     *
     * @var $feeRepository
     */
    private $feeRepository;

    public function __construct(FeeRepository $feeRepository)
    {
        $this->feeRepository = $feeRepository;
    }

    public function getDataByType(string $type) {
       return $this->feeRepository->getDataByType($type);
    }

    public function getDataByName(string $name) {
        return $this->feeRepository->getDataByName($name);
     }
}