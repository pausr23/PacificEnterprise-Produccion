<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Invoice;
use App\Models\Event;

class DashboardSummaryController extends Controller
{

    private const VIEW_DASHBOARD = 'dashboard.principal';
    private const FIELD_TOTAL_EARNINGS = 'totalEarnings';
    private const FIELD_INVOICE_COUNT = 'invoiceCount';
    private const FIELD_SELECTED_DATE = 'selectedDate';
    private const FIELD_INVOICES = 'invoices';
    private const FIELD_RECENT_INVOICES = 'recentInvoices';
    private const FIELD_EARNINGS_LABELS = 'earningsLabels';
    private const FIELD_EARNINGS_VALUES = 'earningsValues';
    private const FIELD_ORDERS_LABELS = 'ordersLabels';
    private const FIELD_ORDERS_VALUES = 'ordersValues';
    private const FIELD_EVENTS = 'events';

    public function index(Request $request)
    {
        $selectedDate = $this->getSelectedDate($request);
        $invoices = $this->getInvoicesByDate($selectedDate);
        $totalEarnings = $invoices->sum('total');
        $invoiceCount = $invoices->count();
        $recentInvoices = $this->getRecentInvoices($selectedDate);

        $earningsLabels = $this->getMonthlyLabels();
        $earningsValues = $this->getMonthlyEarnings();
        $ordersLabels = $this->getMonthlyLabels();
        $ordersValues = $this->getMonthlyOrders();

        $events = $this->getEvents();

        return view(self::VIEW_DASHBOARD, [
            self::FIELD_INVOICES => $invoices,
            self::FIELD_RECENT_INVOICES => $recentInvoices,
            self::FIELD_TOTAL_EARNINGS => $totalEarnings,
            self::FIELD_INVOICE_COUNT => $invoiceCount,
            self::FIELD_SELECTED_DATE => $selectedDate,
            self::FIELD_EARNINGS_LABELS => $earningsLabels,
            self::FIELD_EARNINGS_VALUES => $earningsValues,
            self::FIELD_ORDERS_LABELS => $ordersLabels,
            self::FIELD_ORDERS_VALUES => $ordersValues,
            self::FIELD_EVENTS => $events,
        ]);
    }

    protected function getSelectedDate(Request $request): string
    {
        return $request->has('date') ? $request->input('date') : Carbon::now()->format('Y-m-d');
    }

    protected function getInvoicesByDate(string $date)
    {
        return Invoice::whereDate('created_at', $date)->get();
    }

    protected function getRecentInvoices(string $date)
    {
        return Invoice::whereDate('created_at', $date)->latest()->take(5)->get();
    }

    protected function getMonthlyLabels(): array
    {
        return array_map(function ($month) {
            return Carbon::create()->month($month)->format('F');
        }, range(1, 12));
    }

    protected function getMonthlyEarnings(): array
    {
        $earningsValues = array_fill(0, 12, 0);
        $earningsData = Invoice::selectRaw('MONTH(created_at) as month, SUM(total) as total')
            ->groupBy('month')
            ->get();

        foreach ($earningsData as $data) {
            $earningsValues[$data->month - 1] = $data->total;
        }

        return $earningsValues;
    }

    protected function getMonthlyOrders(): array
    {
        $ordersValues = array_fill(0, 12, 0);
        $ordersData = Invoice::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->groupBy('month')
            ->get();

        foreach ($ordersData as $data) {
            $ordersValues[$data->month - 1] = $data->count;
        }

        return $ordersValues;
    }

    public function getEvents()
    {
        $today = Carbon::today();
        $events = Event::where('event_date', '>=', $today)->get();

        return $events->transform(function ($event) {
            $event->event_date = Carbon::parse($event->event_date)->format('Y-m-d');
            return $event;
        });
    }
    
    public function showStatistics(Request $request)
    {
        $request->validate(['date' => 'required|date']);
        $selectedDate = $request->input('date');
        
        $events = $this->getEvents();
        $invoices = $this->getInvoicesByDate($selectedDate);
        $recentInvoices = $this->getRecentInvoices($selectedDate);
        
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

        $earningsLabels = $this->getMonthlyLabels();
        $earningsValues = $this->getMonthlyEarnings();
        $ordersLabels = $this->getMonthlyLabels();
        $ordersValues = $this->getMonthlyOrders();

        return view('dashboard.principal', [
            'invoices' => $invoices,
            'recentInvoices' => $recentInvoices,
            'totalEarnings' => $totalEarnings,
            'invoiceCount' => $invoiceCount,
            'selectedDate' => $selectedDate,
            'earningsLabels' => $earningsLabels,
            'earningsValues' => $earningsValues,
            'ordersLabels' => $ordersLabels,
            'ordersValues' => $ordersValues,
            'events' => $events,
        ]);
    }

    public function searchByMonth(Request $request)
    {
        $request->validate(['month' => 'required|date_format:Y-m']);

        $events = $this->getEvents();
        $selectedMonth = $request->input('month');
        $startOfMonth = Carbon::parse($selectedMonth)->startOfMonth();
        $endOfMonth = Carbon::parse($selectedMonth)->endOfMonth();

        $invoices = Invoice::whereBetween('created_at', [$startOfMonth, $endOfMonth])->get();
        $totalEarnings = $invoices->sum('total');
        $invoiceCount = $invoices->count();
        $recentInvoices = $this->getRecentInvoicesByRange($startOfMonth, $endOfMonth);

        $earningsLabels = $this->getMonthlyLabels();
        $earningsValues = $this->getMonthlyEarningsByRange($startOfMonth, $endOfMonth);
        $ordersLabels = $this->getMonthlyLabels();
        $ordersValues = $this->getMonthlyOrdersByRange($startOfMonth, $endOfMonth);

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
            'events' => $events,
        ]);
    }

    protected function getRecentInvoicesByRange($startDate, $endDate)
    {
        return Invoice::whereBetween('created_at', [$startDate, $endDate])->latest()->take(5)->get();
    }

    protected function getMonthlyEarningsByRange($startDate, $endDate): array
    {
        $earningsValues = array_fill(0, 12, 0);
        $earningsData = Invoice::selectRaw('MONTH(created_at) as month, SUM(total) as total')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->groupBy('month')
            ->get();

        foreach ($earningsData as $data) {
            $earningsValues[$data->month - 1] = $data->total;
        }

        return $earningsValues;
    }

    protected function getMonthlyOrdersByRange($startDate, $endDate): array
    {
        $ordersValues = array_fill(0, 12, 0);
        $ordersData = Invoice::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->groupBy('month')
            ->get();

        foreach ($ordersData as $data) {
            $ordersValues[$data->month - 1] = $data->count;
        }

        return $ordersValues;
    }
}
