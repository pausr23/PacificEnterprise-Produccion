@extends('dishes.layout')

@section('content')

<div class="grid grid-cols-[20%,80%] md:pl-6">

<div class="mr-5">

    <img class="lg:w-40 md:w-60 xxs:w-full xxs:h-auto lg:my-0 md:my-2" src="https://i.ibb.co/KX69vv5/Pacific-Enterprise.png" alt="Pacific-Enterprise">


    <div id="sidebar-menu" class="hidden lg:grid pl-2 pt-6 text-white font-light text-sm font-main">
        <a class="py-3 mb-6 pl-2 secondary-color transition-colors duration-300 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg" href="{{ route('dashboard.principal') }}">Panel Principal</a>
        <a class="py-3 mb-6 pl-2 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg" href="{{ route('factures.ordering') }}">Punto de Venta</a>
        <a class="py-3 mb-6 pl-2 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg" href="{{ route('factures.order') }}">Órdenes</a>
        <a class="py-3 mb-6 pl-2 block rounded-lg hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035]" href="{{ route('factures.history') }}">Historial de Ventas</a>

        @if(Auth::check() && Auth::user()->job_titles_id == 1)
            <a class="py-3 mb-6 pl-2 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg" href="{{ route('dishes.index') }}">Productos</a>
            <a class="py-3 mb-6 pl-2 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg" href="{{ route('dishes.inventory') }}">Inventario</a>
            <a class="py-3 mb-6 pl-2 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg" href="{{ route('suppliers.index') }}">Proveedores</a>
        @endif
        
        <a href="{{ route('admin.profile') }}" class="flex items-center cursor-pointer lg:m-2 sm:ml-0 ">
            <img class="lg:w-16 lg:h-16 sm:w-10 sm:h-10" src="https://img.icons8.com/?size=100&id=492ILERveW8G&format=png&color=000000" alt="">
            <div class="lg:ml-2">
                <p class="text-base font-semibold ml-1">{{ auth()->user()->name }}</p>
                <p class="text-sm">@ {{ auth()->user()->username }}</p>
            </div>
        </a>
    </div>


    <div id="mobile-sidebar-menu" class="absolute top-0 left-0 w-full h-screen bg-[#16161A] transform translate-x-full transition-transform duration-300 lg:hidden">
        <div class="pl-2 pt-6 text-white font-light text-sm font-main">
            <a class="py-3 mb-6 pl-2 secondary-color transition-colors duration-300 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg" href="{{ route('dashboard.principal') }}">Panel Principal</a>
            <a class="py-3 mb-6 pl-2 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg" href="{{ route('factures.ordering') }}">Punto de Venta</a>
            <a class="py-3 mb-6 pl-2 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg" href="{{ route('factures.order') }}">Órdenes</a>
            <a class="py-3 mb-6 pl-2 block rounded-lg hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035]" href="{{ route('factures.history') }}">Historial de Ventas</a>

            @if(Auth::check() && Auth::user()->job_titles_id == 1)
                <a class="py-3 mb-6 pl-2 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg" href="{{ route('dishes.index') }}">Productos</a>
                <a class="py-3 mb-6 pl-2 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg" href="{{ route('dishes.inventory') }}">Inventario</a>
                <a class="py-3 mb-6 pl-2 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg" href="{{ route('suppliers.index') }}">Proveedores</a>
            @endif
            
            <a href="{{ route('admin.profile') }}" class="flex items-center cursor-pointer lg:m-2 sm:ml-0">
                <img class="lg:w-16 lg:h-16 sm:w-10 sm:h-10" src="https://img.icons8.com/?size=100&id=492ILERveW8G&format=png&color=000000" alt="">
                <div class="lg:ml-2">
                    <p class="text-base font-semibold ml-1">{{ auth()->user()->name }}</p>
                    <p class="text-sm">@ {{ auth()->user()->username }}</p>
                </div>
            </a>
        </div>
    </div>


    <label class="xxs:py-4 xxs:left-6 xxs:z-40 xxs:h-8 xxs:cursor-pointer lg:hidden xxs:flex md:items-center md:justify-center lg:none" for="mobile-checkbox">
        <input class="hidden" type="checkbox" id="mobile-checkbox" onClick="toggleMenu(this)" />
        <svg xmlns="http://www.w3.org/2000/svg" class="xxs:h-6 xxs:w-6 lg:h-0 lg:w-0 md:h-8 md:w-8 ml-5 text-white " fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    </label>


    <div id="content" class="lg:ml-6">

    </div>

    <script>
    function toggleMenu(checkbox) {
        const mobileMenu = document.getElementById('mobile-sidebar-menu');
        const content = document.getElementById('content');
        const isChecked = checkbox.checked;


        if (isChecked) {
            mobileMenu.style.transform = 'translateX(0)';
            mobileMenu.style.display = 'block';
        } else {
            mobileMenu.style.transform = 'translateX(100%)';
            mobileMenu.style.display = 'none';
        }

       
        content.style.display = isChecked ? 'none' : 'block';

       
        const hamburgerIcon = document.querySelector('label[for="mobile-checkbox"]');
        hamburgerIcon.style.display = isChecked ? 'none' : 'flex';
    }

    window.onload = function() {
        const checkbox = document.getElementById('mobile-checkbox');
        checkbox.checked = false; 
        toggleMenu(checkbox);
    };
</script>

</div>

    <div>
        <div class="grid grid-cols-2">
            <form class="my-6" action="{{ route('principal.show') }}" method="POST">
                @csrf

                <label class="font-main text-white mr-4 lg:text-lg md:text-md " for="date">Selecciona una fecha:</label>
                <input class="rounded-lg mr-4 px-3 mt-2 py-2 secondary-color text-white" type="date" name="date" value="{{ old('date', $selectedDate) }}" required>
                <button class="secondary-color rounded-lg mt-2 text-white px-3 py-2 font-semibold" type="submit">Buscar por Día</button>
            </form>

            <div class="my-6 flex items-center">
                <label class="switch" for="toggleSwitch">
                    <input type="checkbox" id="toggleSwitch">
                    <span class="slider round w-14 ml-3"></span>
                </label>
                <span class="font-main text-white ml-9 text-lg xxs:text-xs">Mostrar Gráficos</span>
            </div>
        </div>

        <div class="grid grid-cols-2 xxs:mr-7">
            <div id="earningsView" class="secondary-color rounded-md p-8 w-[92%] ">
                <img id="earningsImage" class="w-12 rounded-full bg-gray-300 p-2 mb-12 " src="https://img.icons8.com/isometric-line/50/stack-of-money.png" alt="Ganancias">
                <p id="earningsLabel" class="text-white font-main text-xs font-light mb-2">Ganancias del día</p>
                <p id="earningsTotal" class="text-white font-main lg:text-4xl md:text-3xl  ">₡{{ number_format($totalEarnings) }}</p>
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

        <div class="grid grid-cols-[30%,65%] xxs:grid-cols-[65%,50%] gap-4 mt-10 xxs:mr-20">

            <div class="border grid text-white border-gray-300 rounded-md lg:p-4 xxs:p-1">
                <div class="grid lg:grid-cols-2 xxs:grid-cols-1">
                    <h1 class="font-main lg:text-lg xxs:text-sm">Pedidos de hoy</h1>
                    <a class="underline opacity-60 content-center justify-self-end text-sm" href="{{ route('factures.history') }}">Ver historial</a>
                </div>
                @foreach($recentInvoices as $invoice)
                    <div class="flex items-center mt-2">
                        <img class="secondary-color rounded-md ml-2 lg:w-10 xxs:w-8 p-1" src="https://img.icons8.com/sf-regular-filled/48/FFFFFF/bank-card-back-side.png" alt="bank-card-back-side" alt="card">
                        <div class="grid">
                            <p class="ml-2  lg:text-lg xxs:text-xs">Orden #{{ $invoice->invoice_number }}</p>
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
