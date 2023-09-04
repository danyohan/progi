<?php

namespace App\Http\Controllers;

use App\Http\Requests\CalculateRequest;
use App\Interfaces\CalculationInterface;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\JsonResponse;

class CalculationController extends Controller
{

    public function __construct(
        private readonly CalculationInterface $calculateService
    ) {
    }

    public function getCalculation(CalculateRequest $request): JsonResponse
    {
        try {
            $data = $request->validated();

            $resultCost = $this->calculateService->calculateCost((float)$data['budget'], $data['vehicleType']);

            return response()->json([
                'result' => $resultCost
            ], Response::HTTP_OK);
        } catch (ValidationException $exception) {
            return response()->json([
                'result' => 'Invalid Validation'
            ], Response::HTTP_BAD_REQUEST);
        }
    }
}
