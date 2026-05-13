<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class AIService
{
    protected $apiKey;

    public function __construct()
    {
        $this->apiKey = config('services.gemini.key');
    }

    /**
     * Summarize messy complaint text.
     */
    public function summarizeComplaint(string $text): string
    {
        // Placeholder for Gemini API integration
        // return Http::post('...', [...])->json('summary');
        
        return "AI Summary of: " . substr($text, 0, 50) . "...";
    }

    /**
     * Detect category based on text.
     */
    public function detectCategory(string $text): string
    {
        $categories = ['Late Delivery', 'Damaged Parcel', 'Missing Parcel', 'Address Issue', 'System Error', 'Customer Complaint'];
        
        foreach ($categories as $category) {
            if (str_contains(strtolower($text), strtolower($category))) {
                return $category;
            }
        }

        return 'Customer Complaint';
    }

    /**
     * Suggest priority level.
     */
    public function suggestPriority(string $text): string
    {
        if (str_contains(strtolower($text), 'urgent') || str_contains(strtolower($text), 'immediately')) {
            return 'High';
        }

        return 'Medium';
    }
}
