@extends('dishes.layout')

@section('content')
<div class="grid lg:grid-cols-[20%,80%] md:pl-6">

    <!-- Menú lateral -->
    <div class="mr-5">
        @include('components.sidebar-link')
    </div>

    <!-- Content Area -->
    <div class="scrollbar-hide scrollbarw-full overflow-x-scroll max-h-[80%]">
        <div class="flex overflow-x-scroll xl:overflow-visible gap-[1rem] w-full h-full p-4 scrollbar-hide:smt-20 lg:mt-0 md:mt-[1%] lg:ml-0 md:ml-[1%] xxs:mt-[1%]">
            @foreach($transactions as $transactionId => $transaction)
                <div class="flex flex-col flex-shrink-0 w-[calc(30%-0.2rem)] xxs:w-64 h-full rounded-lg bg-[#2d2d2D] text-white p-4">
                    <p class="text-lg font-bold mb-4">Orden #{{ $transactionId }}</p>
                    <div class="border-t border-gray-400 w-full"></div>
                    <div class="overflow-y-auto scrollbar-hide h-[80%]">
                        @if(count($transaction['items']) > 0)
                            <!-- Items Section -->
                            <div class="grid grid-cols-2 mx-auto mb-4">
                                <p class="text-sm font-semibold">Items</p>
                                <p class="text-sm font-semibold text-right">Cantidad</p>
                            </div>
                            @php
                                $hasItems = false;
                            @endphp
                            @foreach($transaction['items'] as $item)
                                @if($item['dishes_categories_id'] != 1)
                                    @php
                                        $hasItems = true;
                                    @endphp
                                    <div class="flex justify-between w-full">
                                        <p>{{ $item['title'] }}</p>
                                        <p>{{ $item['quantity'] }}</p>
                                    </div>
                                @endif
                            @endforeach

                            @if(!$hasItems)
                                <p>No hay comidas por preparar.</p>
                            @endif

                            <!-- Drinks Section -->
                            <p class="text-lg font-bold mt-8">Bebidas</p>
                            <div class="border-t border-gray-400 w-full mx-auto my-4"></div>
                            @foreach($transaction['items'] as $item)
                                @if($item['dishes_categories_id'] == 1)
                                    <div class="flex justify-between w-full">
                                        <p>{{ $item['title'] }}</p>
                                        <p>{{ $item['quantity'] }}</p>
                                    </div>
                                @endif
                            @endforeach
                        @else
                            <p>No items found.</p>
                        @endif
                    </div>
                    <form action="{{ route('markOrderAsReady') }}" method="POST" class="mt-auto">
                        @csrf
                        <input type="hidden" name="invoice_number" value="{{ $transactionId }}">
                        <button type="submit" class="w-full xxs:text-xs bg-[#797979] py-[.5rem] rounded-[.6rem]">Finalizado</button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Success Alert -->
    @if(session('success'))
        <script>
            alert('{{ session("success") }}');
            window.location.reload();
        </script>
    @endif

</div>
@endsection
