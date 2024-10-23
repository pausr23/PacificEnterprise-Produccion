@extends('dishes.layout')

@section('content')

<div class="grid grid-cols-[20%,80%] pl-12">

    <div class="mr-8">
        <img class="w-72" src="https://i.ibb.co/KX69vv5/Pacific-Enterprise.png" alt="Pacific-Enterprise" border="0">

        <div class="grid pl-10 pt-12 text-white font-light text-sm font-main ">
            <a class="py-3 mb-6 pl-4 block rounded-lg secondary-color hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] transition-colors duration-300" href="{{ route('dashboard.principal') }}">Panel Principal</a>
            <a class="py-3 mb-6 pl-4 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg" href="{{ route('factures.ordering') }}">Punto de Venta</a>
            <a class="py-3 mb-6 pl-4 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg" href="{{ route('factures.order') }}">Órdenes</a>
            <a class="py-3 mb-6 pl-4 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg" href="{{ route('factures.history') }}">Historial de Ventas</a>

            @if(Auth::check() && Auth::user()->job_titles_id == 1)
                <a class="py-3 mb-6 pl-4 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg" href="{{ route('dishes.index') }}">Productos</a>
                <a class="py-3 mb-6 pl-4 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg" href="{{ route('dishes.inventory') }}">Inventario</a>
                <a class="py-3 mb-6 pl-4 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg" href="{{ route('suppliers.index') }}">Proveedores</a>
            @endif
            
            <a class="flex cursor-pointer" href="{{ route('admin.profile') }}" >
                <img class="w-16" src="https://img.icons8.com/?size=100&id=492ILERveW8G&format=png&color=000000" alt="">
                <div class="mt-2 ml-2">
                    <p class="text-lg font-semibold">{{ auth()->user()->name }}</p>
                    <p>@ {{ auth()->user()->username }}</p>
                </div>
            </a>
        </div>
        
    </div>

    <div>
        <div class="grid grid-cols-2">
            <form class="my-6" action="{{ route('principal.show') }}" method="POST">
                @csrf

                <label class="font-main text-white mr-4 text-lg" for="date">Selecciona una fecha:</label>
                <input class="rounded-lg mr-4 px-3 py-2 secondary-color text-white" type="date" name="date" value="{{ old('date', $selectedDate) }}" required>
                <button class="secondary-color rounded-lg text-white px-3 py-2 font-semibold" type="submit">Buscar por Día</button>
            </form>

            <div class="my-6 flex items-center">
                <label class="switch" for="toggleSwitch">
                    <input type="checkbox" id="toggleSwitch">
                    <span class="slider round"></span>
                </label>
                <span class="font-main text-white ml-4 text-lg">Mostrar Gráficos</span>
            </div>
        </div>

        <div class="grid grid-cols-2">
            <div id="earningsView" class="secondary-color rounded-md p-8 w-[92%]">
                <img id="earningsImage" class="w-12 rounded-full bg-gray-300 p-2 mb-12" src="https://img.icons8.com/isometric-line/50/stack-of-money.png" alt="Ganancias">
                <p id="earningsLabel" class="text-white font-main text-xs font-light mb-2">Ganancias del día</p>
                <p id="earningsTotal" class="text-white font-main text-3xl">₡{{ number_format($totalEarnings) }}</p>
            </div>

        <div id="earningsChartContainer" style="display: none;">
            <canvas id="earningsChart"></canvas>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const earningsView = document.getElementById('earningsView');
                const earningsChartContainer = document.getElementById('earningsChartContainer');

                const ordersView = document.getElementById('ordersView');
                const ordersChartContainer = document.getElementById('ordersChartContainer');

                earningsView.style.display = 'block';
                earningsChartContainer.style.display = 'none';

                ordersView.style.display = 'block';
                ordersChartContainer.style.display = 'none';

                const toggleSwitch = document.getElementById('toggleSwitch');

                let earningsChart;
                let ordersChart;

                const earningsData = @json($earningsValues);
                const ordersData = @json($ordersValues);
                const labels = @json($earningsLabels);

                console.log(earningsData);
                console.log(ordersData);

                function createCharts() {
                    const ctxEarnings = document.getElementById('earningsChart').getContext('2d');
                    earningsChart = new Chart(ctxEarnings, {
                        type: 'line',
                        data: {
                            labels: labels,
                            datasets: [{
                                label: 'Ganancias',
                                data: earningsData,
                                borderColor: 'rgba(205, 160, 203, 1)',
                                backgroundColor: 'rgba(205, 160, 203, 0.2)',
                                borderWidth: 2,
                            }]
                        },
                        options: {
                            responsive: true,
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });

                    const ctxOrders = document.getElementById('ordersChart').getContext('2d');
                    ordersChart = new Chart(ctxOrders, {
                        type: 'bar',
                        data: {
                            labels: labels,
                            datasets: [{
                                label: 'Cantidad de Pedidos',
                                data: ordersData,
                                backgroundColor: 'rgba(255, 255, 159, 0.8)',
                                borderColor: 'rgba(255, 255, 159, 100)',
                                borderWidth: 2,
                            }]
                        },
                        options: {
                            responsive: true,
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                }

                createCharts();

                toggleSwitch.addEventListener('change', function() {
                    if (this.checked) {

                        earningsView.style.display = 'none';
                        earningsChartContainer.style.display = 'block';
                        ordersView.style.display = 'none';
                        ordersChartContainer.style.display = 'block';

                    } else {

                        earningsView.style.display = 'block';
                        earningsChartContainer.style.display = 'none';
                        ordersView.style.display = 'block';
                        ordersChartContainer.style.display = 'none';
                    }
                });
            });

            function resetView() {
                document.getElementById('earningsView').style.display = 'block';
                document.getElementById('earningsChartContainer').style.display = 'none';

                document.getElementById('ordersView').style.display = 'block';
                document.getElementById('ordersChartContainer').style.display = 'none';
            }
        </script>

        <div class="secondary-color rounded-md w-[92%] p-8" id="ordersView">
            <img id="ordersImage" class="w-12 rounded-full bg-gray-300 p-2 mb-12" src="https://img.icons8.com/ios/50/1A1A1A/order-completed--v2.png" alt="Pedidos">
            <p id="ordersLabel" class="text-white font-main text-xs font-light mb-2">Cantidad de pedidos</p>
            <p id="ordersTotal" class="text-white font-main text-3xl">{{ $invoiceCount }}</p>
        </div>

        <div id="ordersChartContainer" style="display: none;">
            <canvas id="ordersChart"></canvas>
        </div>
    </div>

        <div class="grid grid-cols-[30%,65%] gap-4 mt-10">

            <div class="border grid text-white border-gray-300 rounded-md p-4">
                <div class="grid grid-cols-2">
                    <h1 class="font-main text-lg">Pedidos de hoy</h1>
                    <a class="underline opacity-60 content-center justify-self-end text-sm" href="{{ route('factures.history') }}">Ver historial</a>
                </div>
                @foreach($recentInvoices as $invoice)
                    <div class="flex items-center mt-2">
                        <img class="secondary-color rounded-md w-10 p-1" src="https://img.icons8.com/sf-regular-filled/48/FFFFFF/bank-card-back-side.png" alt="bank-card-back-side" alt="card">
                        <div class="grid">
                            <p class="ml-2">Orden #{{ $invoice->invoice_number }}</p>
                            <p class="ml-2">${{ $invoice->total }}</p>
                        </div>
                    </div>
                @endforeach

                @if($recentInvoices->isEmpty())
                    <p class="mt-4">No hay pedidos hoy.</p>
                @endif

            </div>

            <div class="border  border-gray-300 rounded-md p-4">

            </div>

        </div>
    </div>

</div>

@endsection
