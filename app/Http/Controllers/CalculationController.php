<?php

namespace App\Http\Controllers;

use App\Http\Requests\CalculateRequest;
use App\Interfaces\CalculationInterface;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\JsonResponse;

class CalculationController extends Controller
{

    const VALIDATION_MESSAGE = 'Invalid Validation';
    
    public function __construct(
        private readonly CalculationInterface $calculateService
    ) 
    {
    }

    /**
     * Function to return the values to API
     *
     * @param CalculateRequest $request
     * @return JsonResponse
     */
    public function getCalculation(CalculateRequest $request): JsonResponse
    {
        try {
            $data = $request->validated();

            $resultCost = $this->calculateService->calculateCost((float)$data['budget'], $data['vehicleType']);

            return response()->json([
                'result' => $resultCost
            ], Response::HTTP_OK);

        } catch (ValidationException $exception) {

            Log::error($exception->getMessage());

            return response()->json([
                'result' => self::VALIDATION_MESSAGE
            ], Response::HTTP_BAD_REQUEST);
        }
    }
}
