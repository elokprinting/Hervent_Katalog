<?php

namespace App\Http\Controllers;

use App\Exceptions\WorkflowRuleException;
use App\Http\Requests\CloseLeadRequest;
use App\Models\Lead;
use App\Services\LeadClosingService;
use Illuminate\Http\JsonResponse;

class CloseLeadController extends Controller
{
    public function __construct(private readonly LeadClosingService $service) {}

    public function __invoke(CloseLeadRequest $request, Lead $lead): JsonResponse
    {
        $this->authorize('close', $lead);

        try {
            $order = $this->service->closeLead($lead, $request->user());

            return response()->json([
                'message' => 'Lead berhasil ditetapkan Closing dan Order dibuat.',
                'order' => $order,
            ], 201);
        } catch (WorkflowRuleException $exception) {
            return response()->json([
                'message' => $exception->getMessage(),
                'errors' => $exception->errors(),
            ], $exception->statusCode());
        }
    }
}
