@extends('dishes.layout')

@section('content')

<div class="grid grid-cols-[20%,80%] pl-12">

    <div class="mr-8">
        <img class="w-72" src="https://i.ibb.co/KX69vv5/Pacific-Enterprise.png" alt="Pacific-Enterprise" border="0">

        <div class="grid pl-10 pt-12 text-white font-light text-sm font-main ">
            <a class="py-3 mb-6 pl-4 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg" href="">Panel Principal</a>
            <a class="py-3 mb-6 pl-4 block rounded-lg secondary-color hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] transition-colors duration-300" href="{{ route('factures.ordering') }}">Punto de Venta</a>
            <a class="py-3 mb-6 pl-4 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg" href="">Órdenes</a>
            <a class="py-3 mb-6 pl-4 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg" href="{{ route('factures.history') }}">Historial</a>

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

    <div class="grid grid-cols-[65%,30%]">

        <div>
            <div class="grid">
                <input class="pl-4 secondary-color rounded text-xs font-light h-8 text-left text-white w-[95%]" id="dish" type="text" name="dish" placeholder="Nombre de item" oninput="filterDishes()" />
            </div>

            <div class="grid grid-cols-2 gap-3 mr-12 mt-8">
                @foreach($categories as $category)
                    <div class="bg-[#FFFF9F] rounded-md category-button transition-colors duration-200 hover:bg-[#CDA0CB] focus:bg-[#CDA0CB] cursor-pointer" tabindex="0" data-id="{{ $category->id }}" role="button">
                    <img class="mb-4 ml-5 mt-3 w-8" width="50" height="50" src="https://img.icons8.com/ios-filled/50/street-food--v2.png" alt="street-food--v2"/>
                        <h1 class="font-bold ml-5">{{ $category->name }}</h1>
                        <h2 class="text-xs ml-5 mb-3">{{ $category->registeredDishes->count() }} productos</h2>
                    </div>
                @endforeach
            </div>

        <select id="subcategory-select" class="text-white font-main my-5 font-semibold text-xl bg-transparent rounded p-2 focus:outline-none">
            <option value="" disabled selected>Subcategoría</option>
        </select>

        <div id="dishes-list" class="grid grid-cols-4 gap-3 mr-12 products-container overflow-y-auto" style="max-height: 315px;"">
        @foreach($dishes as $dish)
        <div class="product-item text-white font-main secondary-color rounded-lg pl-3"
             data-dish-id="{{ $dish->id }}"
             data-subcategory-id="{{ $dish->subcategories_id }}"
             data-dish-price="{{ $dish->dish_price }}"
             data-dish-title="{{ strtolower($dish->title) }}"
             style="border-left: 6px solid #8FC08B;">
                <div class="flex flex-col h-full justify-between">
                    <div>
                        <p class="text-xs font-extralight mt-2 mb-3">{{ $dish->subcategory->name }}</p>
                        <h2 class="font-bold text-sm mb-1">{{ $dish->title }}</h2>
                        <p class="font-extralight text-sm mb-3">₡{{ number_format($dish->dish_price, 2) }}</p>
                    </div>

                    <div class="flex items-center mb-4">
                        
                        <button class="rounded w-6 border-2 border-white hover:scale-105 focus:outline-none inline-flex items-center justify-center" onclick="updateQuantity('{{ $dish->id }}', 1)">
                            <img width="50" height="50" src="https://img.icons8.com/ios-filled/50/FFFFFF/plus-math.png" alt="plus-math"/>
                        </button>

                        <span id="quantity-{{ $dish->id }}" class="text-xs mx-2 font-light">0</span>

                        <button class="rounded w-6 border-2 border-white hover:scale-105 focus:outline-none inline-flex items-center justify-center" onclick="updateQuantity('{{ $dish->id }}', -1)">
                            <img width="50" height="50" src="https://img.icons8.com/ios-filled/50/FFFFFF/minus-math.png" alt="minus-math"/>
                        </button>

                    </div>
                </div>
            </div>
        @endforeach
        </div>

        <script src="{{ asset('js/filterDishes.js') }}"></script>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const categories = @json($categories);
                const subcategorySelect = document.getElementById('subcategory-select');
                const productsContainer = document.querySelector('.products-container');

                const colors = ['#FFFF9F', '#CDA0CB', '#B0E1DF', '#F19DB4'];

                document.querySelectorAll('.category-button').forEach(function (categoryDiv, index) {
                    const color = colors[index % colors.length];
                    categoryDiv.style.backgroundColor = color;

                    categoryDiv.addEventListener('click', function () {
                        const categoryId = this.getAttribute('data-id');
                        const selectedCategory = categories.find(category => category.id == categoryId);

                        subcategorySelect.innerHTML = '';

                        if (selectedCategory) {
                            const categoryOption = document.createElement('option');
                            categoryOption.value = "";
                            categoryOption.textContent = selectedCategory.name;
                            categoryOption.disabled = true;
                            categoryOption.selected = true;
                            subcategorySelect.appendChild(categoryOption);
                        }

                        if (selectedCategory && selectedCategory.subcategories.length > 0) {
                            selectedCategory.subcategories.forEach(function (subcategory) {
                                const option = document.createElement('option');
                                option.value = subcategory.id;
                                option.textContent = subcategory.name;
                                subcategorySelect.appendChild(option);
                            });
                        } else {
                            const option = document.createElement('option');
                            option.value = "";
                            option.textContent = "No hay subcategorías disponibles";
                            subcategorySelect.appendChild(option);
                        }

                        applyBorderColorToProducts(color);

                        filterProductsBySubcategory('');
                    });
                });

                subcategorySelect.addEventListener('change', function () {
                    const selectedSubcategoryId = this.value;
                    filterProductsBySubcategory(selectedSubcategoryId);
                });

                function applyBorderColorToProducts(color) {
                    const products = document.querySelectorAll('.product-item');
                    products.forEach(function (product) {
                        product.style.borderLeft = `6px solid ${color}`;
                    });
                }

                function filterProductsBySubcategory(subcategoryId) {
                    const products = document.querySelectorAll('.product-item');
                    products.forEach(function (product) {
                        if (subcategoryId === '' || product.getAttribute('data-subcategory-id') === subcategoryId) {
                            product.style.display = 'block';
                        } else {
                            product.style.display = 'none';
                        }
                    });
                }
            });
        </script>

        <script>
        
            function updateQuantity(dishId, change) {
            
                const quantityElement = document.querySelector(`#quantity-${dishId}`);
                let currentQuantity = parseInt(quantityElement.textContent) || 0;

                currentQuantity += change;

            
                if (currentQuantity < 0) {
                    currentQuantity = 0;
                }

                quantityElement.textContent = currentQuantity;
            }
        </script>
            
    </div>
        
    <div>
        <div class="secondary-color h-auto">
            <h2 class="text-white font-main font-semibold text-lg pt-4 text-center">Facturación</h2>
            <div id="billing-list" class="grid place-items-center mt-5 mb-5"></div>
            <hr class="border-b-1 border-white mt-2" />

            <div class="grid grid-cols-2">
                <h2 class="text-white font-main font-semibold text-lg ml-5 mt-5">Total</h2>
                <h3 id="total-amount" class="text-white text-xs font-semibold ml-5 mt-6 text-center font-main">₡0</h3>
            </div>

            <div class="grid grid-cols-2 mt-5">
                <label class="text-gray-400 text-sm ml-5 mt-2 font-main">Monto recibido:</label>
                <input id="customer-payment" type="number" class="secondary-color border border-gray-300 text-sm rounded-lg block p-2.5 text-white w-36" placeholder="Monto" />
            </div>

            <div class="grid grid-cols-2 mt-5">
                <label class="text-gray-400 text-sm ml-5 mt-2 font-main">Cambio:</label>
                <h3 id="change-amount" class="text-white text-xs font-semibold ml-5 mt-2 text-center font-main">₡0</h3>
            </div>

            <form method="POST" action="{{ route('factures.invoice') }}" id="order-form">
                @csrf
                <input type="hidden" name="addedItems" id="addedItemsInput" value='[]'>
                <input type="hidden" name="payment_method_id" id="paymentMethodInput" value="">

                <div class="grid grid-cols-1 mb-2">
                    <label class="text-gray-400 text-sm ml-5 mt-2 font-main mt-5 mb-5">Notas:</label>
                    <textarea class="secondary-color border border-gray-300 text-sm rounded-lg block p-2.5 text-white w-80 mx-auto" name="note" cols="30" rows="3" placeholder="Notas adicionales"></textarea>
                </div>

                <h2 class="text-gray-400 text-sm ml-5 mt-2 font-main mt-5">Método de Pago:</h2>
                <div class="flex justify-around p-4">
                    <div class="group">
                        <button type="button" class="payment-method border border-white rounded-lg transition-colors duration-200 hover:border-white-500 focus:border-green-500 p-2" data-value="1">
                            <img class="w-8" src="https://img.icons8.com/sf-black-filled/64/FFFFFF/banknotes.png" alt="banknotes"/>
                        </button>
                        <h2 class="text-white text-xs text-center mt-1 font-main">Efectivo</h2>
                    </div>

                    <div class="group">
                        <button type="button" class="payment-method border border-white rounded-lg transition-colors duration-200 hover:border-white-500 focus:border-green-500 p-2" data-value="2">
                            <img class="w-8" src="https://img.icons8.com/ios-filled/50/FFFFFF/credit-card-front.png" alt="credit-card-front"/>
                        </button>
                        <h2 class="text-white text-xs text-center mt-1 font-main">Tarjeta</h2>
                    </div>

                    <div class="group">
                        <button type="button" class="payment-method border border-white rounded-lg transition-colors duration-200 hover:border-white-500 focus:border-green-500 p-2" data-value="3">
                            <img class="w-8" src="https://img.icons8.com/ios-filled/50/FFFFFF/mobile-payment.png" alt="mobile-payment"/>
                        </button>
                        <h2 class="text-white text-xs text-center mt-1 font-main">Sinpe</h2>
                    </div>
                </div>

                <div class="flex justify-center">
                    <button type="submit" class="bg-white rounded-md w-56 h-8 mt-5 mb-5 hover:bg-gray-200 active:bg-gray-300 transition duration-150">
                        <h1 class="font-main text-md">Terminar orden</h1>
                    </button>
                </div>
            </form>

            @if (session('success'))
                <div class="bg-green-500 text-white p-4 mb-4">
                    {{ session('success') }}
                </div>
            @endif

        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                let billing = {};


                function updateChange() {
                const total = parseFloat(document.getElementById('total-amount').innerText.replace('₡', '')) || 0;
                const payment = parseFloat(document.getElementById('customer-payment').value) || 0;
                const change = payment - total;

                const changeElement = document.getElementById('change-amount');
                changeElement.innerText = `₡${change.toFixed(2)}`;

                if (change < 0) {
                    changeElement.innerText = `₡0`;
                }
            }

            document.getElementById('customer-payment').addEventListener('input', updateChange);

                function updateQuantity(dishId, change) {
                    if (!billing[dishId]) {
                        const productElement = document.querySelector(`.product-item[data-dish-id='${dishId}']`);
                        if (productElement) {
                            const price = parseFloat(productElement.getAttribute('data-dish-price')) || 0;

                            billing[dishId] = {
                                quantity: 0,
                                title: productElement.querySelector('h2').innerText,
                                price: price
                            };
                        }
                    }

                    billing[dishId].quantity += change;

                    if (billing[dishId].quantity < 0) {
                        billing[dishId].quantity = 0;
                    }

                    renderBilling();
                }

                function renderBilling() {
                    const billingList = document.getElementById('billing-list');
                    billingList.innerHTML = '';

                    let total = 0;

                    for (const id in billing) {
                        if (billing[id].quantity > 0) {
                            const itemTotal = billing[id].quantity * billing[id].price;
                            total += itemTotal;

                            const itemDiv = document.createElement('div');
                            itemDiv.className = 'grid grid-cols-3 text-white font-main text-xs gap-x-5 mb-2';
                            itemDiv.innerHTML = `
                                <h2>${billing[id].quantity}</h2>
                                <h2>${billing[id].title}</h2>
                                <h2>₡${itemTotal.toFixed(2)}</h2>
                            `;
                            billingList.appendChild(itemDiv);
                        }
                    }

                    document.getElementById('total-amount').innerText = `₡${total.toFixed(2)}`;

                    updateChange();
                }

                document.querySelectorAll('.product-item button:nth-of-type(1)').forEach(button => {
                    button.addEventListener('click', function() {
                        const dishId = this.closest('.product-item').dataset.dishId;
                        updateQuantity(dishId, 1);
                    });
                });

                document.querySelectorAll('.product-item button:nth-of-type(2)').forEach(button => {
                    button.addEventListener('click', function() {
                        const dishId = this.closest('.product-item').dataset.dishId;
                        updateQuantity(dishId, -1);
                    });
                });

                document.querySelectorAll('.payment-method').forEach(button => {
                    button.addEventListener('click', function() {
                        const methodId = this.dataset.value;
                        document.getElementById('paymentMethodInput').value = methodId;
                    });
                });

                document.getElementById('order-form').onsubmit = function() {
                    const billingArray = Object.keys(billing).map(id => ({
                        id: id,
                        quantity: billing[id].quantity
                    }));
                    document.getElementById('addedItemsInput').value = JSON.stringify(billingArray);
                };
            });
        </script>
    </div>
        
</div>
@endsection