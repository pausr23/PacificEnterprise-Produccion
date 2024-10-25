<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;
use App\Models\Invoice;
use App\Models\Event;

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

        $totalEarnings = $invoices->sum('total');
        $invoiceCount = $invoices->count();
        $events = $this->getEvents();
        return view('dashboard.principal', compact('invoices', 'totalEarnings', 'invoiceCount', 'selectedDate', 'events'));

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
    
        $events = $this->getEvents();
    
        // Usar dd() para depurar
        dd($totalEarnings, $events);
    
        return view('dashboard.principal', [
            'invoices' => $invoices,
            'totalEarnings' => $totalEarnings,
            'invoiceCount' => $invoiceCount,
            'selectedDate' => $selectedDate,
            'events' => $events, // Pasar los eventos a la vista
        ]);
    }


    public function getEvents()
    {
        // Obtener la fecha actual
        $today = Carbon::today();

        // Realizar la consulta a la base de datos en la tabla 'events'
        $events = Event::where('event_date', '>=', $today)->get();

        // Formatear las fechas antes de devolver los eventos
        $events->transform(function ($event) {
            $event->event_date = Carbon::parse($event->event_date)->format('Y-m-d');
            return $event;
        });

        return $events;
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
