<?php

namespace App\Http\Controllers;

use App\Exceptions\WorkflowRuleException;
use App\Http\Requests\RecordQuotationAcceptanceRequest;
use App\Models\Lead;
use App\Models\Quotation;
use App\Services\LeadClosingService;
use Illuminate\Http\JsonResponse;

class RecordQuotationAcceptanceController extends Controller
{
    public function __construct(private readonly LeadClosingService $service) {}

    public function __invoke(RecordQuotationAcceptanceRequest $request, Lead $lead, Quotation $quotation): JsonResponse
    {
        abort_unless($quotation->lead_id === $lead->id, 404);
        $this->authorize('recordQuotationAcceptance', $lead);

        try {
            $accepted = $this->service->recordQuotationAcceptance($quotation, $request->user());

            return response()->json([
                'message' => 'Persetujuan quotation berhasil dicatat.',
                'quotation' => $accepted,
            ]);
        } catch (WorkflowRuleException $exception) {
            return response()->json([
                'message' => $exception->getMessage(),
                'errors' => $exception->errors(),
            ], $exception->statusCode());
        }
    }
}
