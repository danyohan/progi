<?php

namespace App\Http\Controllers;

use App\Http\Requests\CalculateRequest;
use App\Services\CalculateService;

class BidCalculationController extends Controller
{
    private $calculateService;

    public function __construct(CalculateService $calculateService )
    {
        $this->calculateService = $calculateService;
    }


    public function calculate(CalculateRequest $request)
    {
        $data = $request->validated();

        $fixedFees = $this->calculateService->getDataByType('fixed');
        $basicFees = $this->calculateService->getDataByName('basic');

   
    }
}
