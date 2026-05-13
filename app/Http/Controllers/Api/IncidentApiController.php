<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Incident;
use App\Services\AIService;
use Illuminate\Http\Request;

class IncidentApiController extends Controller
{
    protected $aiService;

    public function __construct(AIService $aiService)
    {
        $this->aiService = $aiService;
    }

    public function index()
    {
        return response()->json(Incident::latest()->paginate(20));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'raw_text' => 'required|string',
            'sender' => 'nullable|string',
            'tracking_number' => 'nullable|string',
        ]);

        $aiSummary = $this->aiService->summarizeComplaint($validated['raw_text']);
        $category = $this->aiService->detectCategory($validated['raw_text']);
        $priority = $this->aiService->suggestPriority($validated['raw_text']);

        $incident = Incident::create([
            'title' => 'API Reported Incident',
            'raw_text' => $validated['raw_text'],
            'ai_summary' => $aiSummary,
            'category' => $category,
            'priority' => $priority,
            'status' => 'New',
            'tracking_number' => $validated['tracking_number'],
        ]);

        return response()->json([
            'message' => 'Incident stored successfully via API',
            'incident' => $incident
        ], 201);
    }
}
