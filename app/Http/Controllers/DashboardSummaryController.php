<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;
use App\Models\Invoice;

class DashboardSummaryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $today = Carbon::now();
        $selectedDate = $today->format('Y-m-d');

        $invoices = Invoice::whereDate('created_at', $today)->get();

        $recentInvoices = Invoice::whereDate('created_at', $today)
        ->latest() 
        ->take(5)  
        ->get();

        $totalEarnings = $invoices->sum('total');
        $invoiceCount = $invoices->count();

        return view('dashboard.principal', compact('invoices', 'recentInvoices', 'totalEarnings', 'invoiceCount', 'selectedDate'));
    }

    public function showStatistics(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
        ]);

        $selectedDate = $request->input('date');

        $invoices = Invoice::whereDate('created_at', Carbon::parse($selectedDate))->get();


        $totalEarnings = $invoices->sum('total');
        $invoiceCount = $invoices->count();

        return view('dashboard.principal', [
            'invoices' => $invoices,
            'totalEarnings' => $totalEarnings,
            'invoiceCount' => $invoiceCount,
            'selectedDate' => $selectedDate,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
