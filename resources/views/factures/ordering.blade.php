@extends('dishes.layout')

@section('content')

<div class="grid lg:grid-cols-[20%,80%] md:pl-6 pl-12">

    <div class="mr-5">

    <div class="md:mr-5 hidden lg:block">
        <img class="mb-4 lg:w-60 sm:ml-0" src="https://i.ibb.co/KX69vv5/Pacific-Enterprise.png"
            alt="Pacific-Enterprise">
        <div id="sidebar-menu" class="hidden lg:grid pl-2 pt-6 text-white font-light text-sm font-main">
            <a class="py-3 mb-5 pl-2 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg"
                href="{{ route('dashboard.principal') }}">Panel Principal</a>
            <a class="py-3 mb-5 pl-2 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg secondary-color transition-colors duration-300"
                href="{{ route('factures.ordering') }}">Punto de Venta</a>
            <a class="py-3 mb-5 pl-2 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg"
                href="{{ route('factures.order') }}">Órdenes</a>
            <a class="py-3 mb-5 pl-2 block rounded-lg hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035]"
                href="{{ route('factures.history') }}">Historial de Ventas</a>

            @if(Auth::check() && Auth::user()->job_titles_id == 1)
                <a class="py-3 mb-5 pl-2 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg"
                    href="{{ route('dishes.index') }}">Productos</a>
                <a class="py-3 mb-5 pl-2 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg"
                    href="{{ route('dishes.inventory') }}">Inventario</a>
                <a class="py-3 mb-5 pl-2 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg"
                    href="{{ route('suppliers.index') }}">Proveedores</a>
                <a class="py-3 mb-3 pl-2 hover:bg-[#323035] focus:bg-[#323035] active:bg-[#323035] block rounded-lg"
                    href="{{ route('events.index') }}">Eventos</a>
            @endif
            

            <a href="{{ route('admin.profile') }}" class="flex items-center cursor-pointer lg:m-2 sm:ml-0 ">
                <img class="lg:w-16 lg:h-16 sm:w-10 sm:h-10"
                    src="https://img.icons8.com/?size=100&id=492ILERveW8G&format=png&color=000000" alt="">
                <div class="lg:ml-2">
                    <p class="text-base font-semibold ml-1">{{ auth()->user()->name }}</p>
                    <p class="text-sm">@ {{ auth()->user()->username }}</p>
                </div>
            </a>
            
        </div>
        </div>
    </div>

    <div class="grid lg:grid-cols-[65%,30%] lg:ml-0 md:ml-[3%] xxs:grid-cols-1">

        <div>
            <div class="grid">
                <input class="pl-4 mt-6 lg:mt-0 secondary-color rounded text-xs font-light h-8 text-left text-white lg:w-[95%] md:w-[94%] xxs:w-[87%]"
                    id="dish" type="text" name="dish" placeholder="Nombre de item" oninput="filterDishes()" />
            </div>

            <div class="grid lg:grid-cols-2 xxs:grid-cols-1 gap-3 mr-12 mt-8">
                @foreach($categories as $category)
                    <div class="bg-[#FFFF9F] rounded-md category-button transition-colors duration-200 hover:bg-[#CDA0CB] focus:bg-[#CDA0CB] cursor-pointer"
                        tabindex="0" data-id="{{ $category->id }}" role="button">
                        <img class="mb-4 ml-5 mt-3 w-8" width="50" height="50"
                            src="https://img.icons8.com/ios-filled/50/street-food--v2.png" alt="street-food--v2" />
                        <h1 class="font-bold ml-5">{{ $category->name }}</h1>
                        <h2 class="text-xs ml-5 mb-3">{{ $category->registeredDishes->count() }} productos</h2>
                    </div>
                @endforeach
            </div>

            <select id="subcategory-select"
                class="text-white font-main my-5 font-semibold text-xl bg-transparent rounded p-2 focus:outline-none">
                <option value="" disabled selected>Subcategoría</option>
            </select>

            <div id="dishes-list"
                class="grid lg:grid-cols-4 xxs:grid-cols-1 gap-3 mr-12 md:my-auto products-container overflow-y-auto"
                style="max-height: 315px;">
                @foreach($dishes as $dish)
                    <div class="product-item text-white font-main secondary-color rounded-lg pl-3"
                        data-dish-id="{{ $dish->id }}" 
                        data-subcategory-id="{{ $dish->subcategories_id }}"
                        data-dish-price="{{ $dish->sale_price}}" 
                        data-dish-title="{{ strtolower($dish->title) }}"
                        style="border-left: 6px solid #8FC08B;">
                        <div class="flex flex-col h-full justify-between">
                            <div>
                                <p class="text-xs font-extralight mt-2 mb-3">{{ $dish->subcategory->name }}</p>
                                <h2 class="font-bold text-sm mb-1">{{ $dish->title }}</h2>
                                <p class="font-extralight text-sm mb-3">₡{{ number_format($dish->sale_price, 2) }}</p>
                            </div>

                            <div class="flex items-center mb-4">
                                <button id="add-btn-{{ $dish->id }}"
                                    class="rounded w-6 border-2 border-white hover:scale-105 focus:outline-none inline-flex items-center justify-center"
                                    onclick="addProduct('{{ $dish->id }}')">
                                    <img width="50" height="50"
                                        src="https://img.icons8.com/ios-filled/50/FFFFFF/plus-math.png" alt="plus-math" />
                                </button>

                                <span id="quantity-{{ $dish->id }}"
                                    class="text-xs mx-2 font-light">{{ $dish->units }}</span>

                                <button id="remove-btn-{{ $dish->id }}"
                                    class="rounded w-6 border-2 border-white hover:scale-105 focus:outline-none inline-flex items-center justify-center"
                                    onclick="removeProduct('{{ $dish->id }}')" disabled>
                                    <img width="50" height="50"
                                        src="https://img.icons8.com/ios-filled/50/FFFFFF/minus-math.png" alt="minus-math" />
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
                const addedProducts = {};

                document.addEventListener('DOMContentLoaded', function () {
                    const products = document.querySelectorAll('.product-item');
                    products.forEach(product => {
                        const dishId = product.getAttribute('data-dish-id');
                        const quantityElement = document.querySelector(`#quantity-${dishId}`);
                        const addButton = document.querySelector(`#add-btn-${dishId}`);
                        const currentQuantity = parseInt(quantityElement.textContent) || 0;

                        if (currentQuantity === 0) {
                            addButton.disabled = true;
                        }
                    });
                });

                function addProduct(dishId, maxUnits) {
                    const quantityElement = document.querySelector(`#quantity-${dishId}`);
                    const addButton = document.querySelector(`#add-btn-${dishId}`);
                    const removeButton = document.querySelector(`#remove-btn-${dishId}`);
                    let currentQuantity = parseInt(quantityElement.textContent) || 0;

                    if (!addedProducts[dishId]) {
                        addedProducts[dishId] = 0;
                    }

                    if (currentQuantity > 0) {
                        currentQuantity -= 1;
                        quantityElement.textContent = currentQuantity;

                        addedProducts[dishId] += 1;

                        if (addedProducts[dishId] > 0) {
                            removeButton.disabled = false;
                        }

                        if (currentQuantity === 0) {
                            addButton.disabled = true;
                        }
                    }
                }

                function removeProduct(dishId, maxUnits) {
                    const quantityElement = document.querySelector(`#quantity-${dishId}`);
                    const addButton = document.querySelector(`#add-btn-${dishId}`);
                    const removeButton = document.querySelector(`#remove-btn-${dishId}`);
                    let currentQuantity = parseInt(quantityElement.textContent) || 0;

                    if (addedProducts[dishId] > 0) {
                        currentQuantity += 1;
                        quantityElement.textContent = currentQuantity;

                        addedProducts[dishId] -= 1;

                        if (addedProducts[dishId] === 0) {
                            removeButton.disabled = true;
                        }

                        if (currentQuantity > 0) {
                            addButton.disabled = false;
                        }
                    }
                }
            </script>

        </div>

        <div>
            <div class="secondary-color h-auto lg:my-0 lg:mr-0 xxs:my-8 md:my-8 xxs:mr-10 md:mr-12">
                <h2 class="text-white font-main font-semibold text-lg pt-4 text-center">Facturación</h2>
                <div id="billing-list" class="grid place-items-center mt-5 mb-5"></div>
                <hr class="border-b-1 border-white mt-2" />

                <div class="grid grid-cols-2">
                    <h2 class="text-white font-main font-semibold text-lg ml-5 mt-5">Total</h2>
                    <h3 id="total-amount" class="text-white text-xs font-semibold ml-5 mt-6 text-center font-main">₡0
                    </h3>
                </div>

                <form method="POST" action="{{ route('factures.invoice') }}" id="order-form">
                    @csrf
                    <input type="hidden" name="addedItems" id="addedItemsInput" value='[]'>
                    <input type="hidden" name="payment_method_id" id="paymentMethodInput" value="">

                    <div class="grid grid-cols-1 mb-2">
                        <label class="text-gray-400 text-sm ml-5 font-main mt-5 mb-5">Notas:</label>
                        <textarea
                            class="secondary-color border border-gray-300 text-sm rounded-lg block p-2 text-white lg:w-80 md:w-[80%] xxs:w-[86%] mx-auto"
                            name="note" cols="30" rows="3" placeholder="Notas adicionales"></textarea>
                    </div>

                    <h2 class="text-gray-400 text-sm ml-5 font-main mt-5">Método de Pago:</h2>
                    <div class="flex justify-around p-4">
                        <div class="group">
                            <button type="button"
                                class="payment-method border border-white rounded-lg transition-colors duration-200 hover:border-white-500 focus:border-green-500 p-2"
                                data-value="1">
                                <img class="w-8" src="https://img.icons8.com/sf-black-filled/64/FFFFFF/banknotes.png"
                                    alt="banknotes" />
                            </button>
                            <h2 class="text-white text-xs text-center mt-1 font-main">Efectivo</h2>
                        </div>

                        <div class="group">
                            <button type="button"
                                class="payment-method border border-white rounded-lg transition-colors duration-200 hover:border-white-500 focus:border-green-500 p-2"
                                data-value="2">
                                <img class="w-8" src="https://img.icons8.com/ios-filled/50/FFFFFF/credit-card-front.png"
                                    alt="credit-card-front" />
                            </button>
                            <h2 class="text-white text-xs text-center mt-1 font-main">Tarjeta</h2>
                        </div>

                        <div class="group">
                            <button type="button"
                                class="payment-method border border-white rounded-lg transition-colors duration-200 hover:border-white-500 focus:border-green-500 p-2"
                                data-value="3">
                                <img class="w-8" src="https://img.icons8.com/ios-filled/50/FFFFFF/mobile-payment.png"
                                    alt="mobile-payment" />
                            </button>
                            <h2 class="text-white text-xs text-center mt-1 font-main">Sinpe</h2>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 mt-5" id="payment-amount-section" style="display: none;">
                        <label class="text-gray-400 text-sm ml-5 mt-2 font-main">Monto recibido:</label>
                        <input id="customer-payment" type="number"
                            class="secondary-color border border-gray-300 text-sm rounded-lg block p-2.5 text-white w-36"
                            placeholder="Monto" />
                    </div>

                    <div class="grid grid-cols-2 mt-5" id="change-section" style="display: none;">
                        <label class="text-gray-400 text-sm ml-5 mt-2 font-main">Cambio:</label>
                        <h3 id="change-amount" class="text-white text-xs font-semibold ml-5 mt-2 text-center font-main">
                            ₡0</h3>
                    </div>

                    <div class="flex justify-center">
                        <button type="submit"
                            class="bg-white rounded-md w-56 h-8 mt-5 mb-5 hover:bg-gray-200 active:bg-gray-300 transition duration-150">
                            <h1 class="font-main text-md">Facturar</h1>
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
                document.addEventListener('DOMContentLoaded', function () {
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
                        button.addEventListener('click', function () {
                            const dishId = this.closest('.product-item').dataset.dishId;
                            updateQuantity(dishId, 1);
                        });
                    });

                    document.querySelectorAll('.product-item button:nth-of-type(2)').forEach(button => {
                        button.addEventListener('click', function () {
                            const dishId = this.closest('.product-item').dataset.dishId;
                            updateQuantity(dishId, -1);
                        });
                    });

                    document.querySelectorAll('.payment-method').forEach(button => {
                        button.addEventListener('click', function () {
                            const methodId = this.dataset.value;
                            document.getElementById('paymentMethodInput').value = methodId;
                        });
                    });

                    document.getElementById('order-form').onsubmit = function () {
                        const billingArray = Object.keys(billing).map(id => ({
                            id: id,
                            quantity: billing[id].quantity
                        }));
                        document.getElementById('addedItemsInput').value = JSON.stringify(billingArray);
                    };

                    document.querySelectorAll('.payment-method').forEach(button => {
                        button.addEventListener('click', function () {
                            const methodId = this.dataset.value;

                            document.getElementById('payment-amount-section').style.display = 'none';
                            document.getElementById('change-section').style.display = 'none';

                            if (methodId === "1") {
                                document.getElementById('payment-amount-section').style.display = 'grid';
                                document.getElementById('change-section').style.display = 'grid';
                            }

                            document.getElementById('paymentMethodInput').value = methodId;
                        });
                    });

                    document.getElementById('customer-payment').addEventListener('input', updateChange);
                });
            </script>
        </div>

    </div>
    @endsection