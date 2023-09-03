<?php

namespace App\Http\Controllers;

use App\Http\Requests\CalculateRequest;
use App\Services\CalculateService;
use Illuminate\Support\Facades\Response;

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

        $resultCost = $this->calculateService->calculateCost((double)$data['budget'], $data['vehicleType']);

        return Response::json([
            'result' => $resultCost
        ]);
   
    }
}
