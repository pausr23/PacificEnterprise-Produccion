@extends('dishes.layout')

@section('content')

<div class="grid grid-cols-[20%,80%] pl-12">

    <div class="mr-8">
        <img src="https://i.ibb.co/KX69vv5/Pacific-Enterprise.png" alt="Pacific-Enterprise" border="0">

        <div class="grid pl-12 pt-12 text-white font-light text-sm font-main ">
            <a class="pb-8 hover:bg-gray-600 focus:bg-[#323035] active:bg-[#323035] block" href="">Panel Principal</a>
            <a class="pb-8 hover:bg-gray-600 focus:bg-[#323035] active:bg-[#323035] block" href="">Punto de Venta</a>
            <a class="pb-8 hover:bg-gray-600 focus:bg-[#323035] active:bg-[#323035] block" href="">Historial</a>
            <a class="pb-8 hover:bg-gray-600 focus:bg-[#323035] active:bg-[#323035] block" href="{{ route('dishes.index') }}">Admin</a>
            <a class="pb-8 hover:bg-gray-600 focus:bg-[#323035] active:bg-[#323035] block" href="{{ route('dishes.inventory') }}">Inventario</a>
            <a class="pb-8 hover:bg-gray-600 focus:bg-[#323035] active:bg-[#323035] block" href="{{ route('suppliers.index') }}">Proveedores</a>
        </div>
        
    </div>

    <div class="grid grid-cols-[65%,30%]">

        <div>
            <div class="grid">
                <input class="secondary-color rounded text-xs font-light h-8 text-left text-white w-[92.5%]" id="dish" type="text" name="dish" placeholder="Nombre de item">
            </div>

            <div class="grid grid-cols-2 gap-2 mr-12 mt-10">
                @foreach($categories as $category)
                    <div class="bg-[#FFFF9F] rounded-md category-button" data-id="{{ $category->id }}" style="cursor: pointer;">
                    <img class="mb-4 ml-5 mt-3 w-8" width="50" height="50" src="https://img.icons8.com/ios-filled/50/street-food--v2.png" alt="street-food--v2"/>
                        <h1 class="font-bold ml-5">{{ $category->name }}</h1>
                        <h2 class="text-xs ml-5 mb-3">{{ $category->registeredDishes->count() }} productos</h2>
                    </div>
                @endforeach
            </div>

        <select id="subcategory-select" class="text-white font-main my-6 font-semibold text-xl bg-transparent rounded p-2 focus:outline-none">
            <option value="" disabled selected>Subcategoría</option>
        </select>

        <div class="grid grid-cols-4 gap-2 mr-12 products-container">
        @foreach($dishes as $dish)
            <div class="product-item text-white font-main secondary-color rounded-lg pl-2" data-dish-id="{{ $dish->id }}" data-subcategory-id="{{ $dish->subcategories_id }}" data-dish-price="{{ $dish->dish_price }}" style="border-left: 6px solid #CDA0CB;">
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

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const categories = @json($categories);
                const subcategorySelect = document.getElementById('subcategory-select');
                const productsContainer = document.querySelector('.products-container');

                document.querySelectorAll('.category-button').forEach(function (categoryDiv) {
                    categoryDiv.addEventListener('click', function () {
                        const categoryId = this.getAttribute('data-id');
                        const selectedCategory = categories.find(category => category.id == categoryId);

                        subcategorySelect.innerHTML = '<option value="" disabled selected>Subcategoría</option>';
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

                        filterProductsBySubcategory(''); 
                    });
                });

                subcategorySelect.addEventListener('change', function () {
                    const selectedSubcategoryId = this.value;
                    filterProductsBySubcategory(selectedSubcategoryId);
                });

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
                    <h2 class="text-white font-main font-semibold text-lg pt-4 text-center">Facturacion</h2>    
                <div id="billing-list" class="grid place-items-center mt-5 mb-5"></div>

            <hr class="border-b-1 border-white mt-2" />
            <div class="grid grid-cols-2">
                <h2 class="text-white font-main font-semibold text-lg ml-5 mt-5">Total</h2>
                <h3 id="total-amount" class="text-white text-xs font-semibold  ml-5 mt-6 text-center font-main">₡0</h3>
            </div>

            
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    let billing = {};

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
                });
            </script>

                <h2 class="text-gray-400 text-xs ml-5 mt-2 font-main">Método de Pago</h2>
                <div class="flex justify-around p-4">
                    <div class="group">
                        <button class="w-12 h-8 border-2 border-white flex justify-center items-center bg-transparent hover:bg-white hover:bg-opacity-20 transition duration-200 focus:bg-white focus:bg-opacity-20 focus:outline-none">
                        <img class="w-8" width="64" height="64" src="https://img.icons8.com/sf-black-filled/64/FFFFFF/banknotes.png" alt="banknotes"/>
                        </button>
                        <h2 class="text-white text-xs text-center mt-1 font-main">Efectivo</h2>
                    </div>

                    <div class="group">
                        <button class="w-12 h-8 border-2 border-white flex justify-center items-center bg-transparent hover:bg-white hover:bg-opacity-20 transition duration-200 focus:bg-white focus:bg-opacity-20 focus:outline-none">
                        <img class="w-8" width="50" height="50" src="https://img.icons8.com/ios-filled/50/FFFFFF/credit-card-front.png" alt="credit-card-front"/>
                        </button>
                        <h2 class="text-white text-xs text-center mt-1 font-main">Tarjeta</h2>
                    </div>

                    <div class="group">
                        <button class="w-12 h-8 border-2 border-white flex justify-center items-center bg-transparent hover:bg-white hover:bg-opacity-20 transition duration-200 focus:bg-white focus:bg-opacity-20 focus:outline-none">
                        <img class="w-7" width="50" height="50" src="https://img.icons8.com/ios-filled/50/FFFFFF/mobile-payment.png" alt="mobile-payment"/>
                        </button>
                        <h2 class="text-white text-xs text-center mt-1 font-main">Sinpe</h2>
                    </div>
                </div>

                <div class="flex justify-center">
                    <button class="bg-white rounded-md w-56 h-8 mt-5 mb-5 hover:bg-gray-200 active:bg-gray-300 transition duration-150">
                        <h1 class="font-main text-md">Terminar orden</h1>
                    </button>
                </div>
            </div> 
        </div>
    </div>

@endsection