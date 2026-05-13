<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
        $incidents = [
            [
                'id' => 'DHL001',
                'category' => 'Damaged Parcel',
                'priority' => 'High',
                'status' => 'New'
            ]
        ];

        return view('dashboard', compact('incidents'));
    }
}