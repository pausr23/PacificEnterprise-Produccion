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
    public function index(Request $request)
    {
        $today = Carbon::now()->format('Y-m-d');

        $selectedDate = $today;
        $invoices = Invoice::whereDate('created_at', $selectedDate)->get();
        $totalEarnings = $invoices->sum('total');
        $invoiceCount = $invoices->count();
        $events = $this->getEvents();
        if ($request->has('date')) {
            $selectedDate = $request->input('date');
            $invoices = Invoice::whereDate('created_at', $selectedDate)->get();
            $totalEarnings = $invoices->sum('total');
            $invoiceCount = $invoices->count();
            $recentInvoices = Invoice::whereDate('created_at', $selectedDate)
                ->latest()
                ->take(5)
                ->get();
        } else {
            $recentInvoices = Invoice::whereDate('created_at', $selectedDate)
                ->latest()
                ->take(5)
                ->get();
        }

        $earningsLabels = [];
        $earningsValues = array_fill(0, 12, 0);
        for ($i = 1; $i <= 12; $i++) {
            $earningsLabels[] = Carbon::create()->month($i)->format('F');
        }
        $earningsData = Invoice::selectRaw('MONTH(created_at) as month, SUM(total) as total')
            ->groupBy('month')
            ->get();
        foreach ($earningsData as $data) {
            $earningsValues[$data->month - 1] = $data->total;
        }

        $ordersLabels = [];
        $ordersValues = array_fill(0, 12, 0);
        for ($i = 1; $i <= 12; $i++) {
            $ordersLabels[] = Carbon::create()->month($i)->format('F');
        }
        $ordersData = Invoice::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->groupBy('month')
            ->get();
        foreach ($ordersData as $data) {
            $ordersValues[$data->month - 1] = $data->count;
        }

        $events = $this->getEvents();

        return view('dashboard.principal', compact(
            'invoices',
            'recentInvoices',
            'totalEarnings',
            'invoiceCount',
            'selectedDate',
            'earningsLabels',
            'earningsValues',
            'ordersLabels',
            'ordersValues',
            'events' 
        ));
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
    
    public function showStatistics(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
        ]);
    
        $selectedDate = $request->input('date');
        $earningsLabels = [];
        $earningsValues = array_fill(0, 12, 0);
        
        for ($i = 1; $i <= 12; $i++) {
            $earningsLabels[] = Carbon::create()->month($i)->format('F');
        }

        $earningsData = Invoice::selectRaw('MONTH(created_at) as month, SUM(total) as total')
            ->groupBy('month')
            ->get();

        foreach ($earningsData as $data) {
            $earningsValues[$data->month - 1] = $data->total;
        }

        $ordersLabels = [];
        $ordersValues = array_fill(0, 12, 0);

        for ($i = 1; $i <= 12; $i++) {
            $ordersLabels[] = Carbon::create()->month($i)->format('F');
        }

        $ordersData = Invoice::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->groupBy('month')
            ->get();

        foreach ($ordersData as $data) {
            $ordersValues[$data->month - 1] = $data->count;
        }

        $invoices = Invoice::whereDate('created_at', Carbon::parse($selectedDate))->get();
        $recentInvoices = Invoice::whereDate('created_at', Carbon::parse($selectedDate))
            ->latest()
            ->take(5)
            ->get();

        $totalEarnings = $invoices->sum('total');
        $invoiceCount = $invoices->count();

        $dailyEarningsLabels = [$selectedDate];
        $dailyEarningsValues = [$totalEarnings];
        $dailyOrdersLabels = [$selectedDate];
        $dailyOrdersValues = [$invoiceCount];

        if ($request->ajax()) {
            return response()->json([
                'dailyEarningsLabels' => $dailyEarningsLabels,
                'dailyEarningsValues' => $dailyEarningsValues,
                'dailyOrdersLabels' => $dailyOrdersLabels,
                'dailyOrdersValues' => $dailyOrdersValues,
            ]);
        }

        return view('dashboard.principal', [
            'invoices' => $invoices,
            'recentInvoices' => $recentInvoices,
            'totalEarnings' => $totalEarnings,
            'invoiceCount' => $invoiceCount,
            'selectedDate' => null,
            'earningsLabels' => $earningsLabels,
            'earningsValues' => $earningsValues,
            'ordersLabels' => $ordersLabels,
            'ordersValues' => $ordersValues,
        ]);
    }

    public function searchByMonth(Request $request)
    {
        $request->validate([
            'month' => 'required|date_format:Y-m',
        ]);

        $selectedMonth = $request->input('month');
        $startOfMonth = Carbon::parse($selectedMonth)->startOfMonth();
        $endOfMonth = Carbon::parse($selectedMonth)->endOfMonth();

        $invoices = Invoice::whereBetween('created_at', [$startOfMonth, $endOfMonth])->get();
        $totalEarnings = $invoices->sum('total');
        $invoiceCount = $invoices->count();

        $recentInvoices = Invoice::whereBetween('created_at', [$startOfMonth, $endOfMonth])
            ->latest()
            ->take(5)
            ->get();

        $earningsLabels = [];
        $earningsValues = array_fill(0, 12, 0);

        $ordersLabels = [];
        $ordersValues = array_fill(0, 12, 0);

        for ($i = 1; $i <= 12; $i++) {
            $earningsLabels[] = Carbon::create()->month($i)->format('F');
            $ordersLabels[] = Carbon::create()->month($i)->format('F');
        }

        $earningsData = Invoice::selectRaw('MONTH(created_at) as month, SUM(total) as total')
            ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
            ->groupBy('month')
            ->get();

        foreach ($earningsData as $data) {
            $earningsValues[$data->month - 1] = $data->total;
        }

        $ordersData = Invoice::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
            ->groupBy('month')
            ->get();

        foreach ($ordersData as $data) {
            $ordersValues[$data->month - 1] = $data->count;
        }

        return view('dashboard.principal', [
            'invoices' => $invoices,
            'recentInvoices' => $recentInvoices,
            'totalEarnings' => $totalEarnings,
            'invoiceCount' => $invoiceCount,
            'selectedDate' => null,
            'earningsLabels' => $earningsLabels,
            'earningsValues' => $earningsValues,
            'ordersLabels' => $ordersLabels,
            'ordersValues' => $ordersValues,
        ]);
    }
}
