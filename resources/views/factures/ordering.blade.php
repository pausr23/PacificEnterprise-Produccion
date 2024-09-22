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
            <img class="mb-4 ml-5 mt-3 w-8" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAAFC0lEQVR4nO2ZaaiWRRTHf7dMW7xdS9QW2lDqFtmCt01aPkXWl2gnWkgLW6E+VKAlRNFCG+3RTotpVJQQVFSold1sN0jb0axE0wpzKb36xIH/A8M08z4zcy/VhfuH82HOzJmZ//POnDnnvDCAAfgYDcwGNgCVIxukt/5+gbc9ApUnc+kn8H+JKvDL9AvMbSAy57/e4AD+DYwAzgSeAD4AlgDrgPXAMuALYAZwJdCZOOeuDUdr574ksCfwSMLF9OVj4DSgrcXcBzbMsV9fkbgM+CuTgC/zWrwH5zTYntRbAvYVH+0lAVd+A44MrPNyg909vSVyY8LmejLJrAbGOmuMSjiuK4BtSkkcB2xO2Nhjuj83AGsy7k2NexNtppWQ2AL4LHGBLx27Q+W9mmzu0PgDgI3SLZRHvF3tW4GR0lfyjKNLfo3QBjYBL8kLjZXud8/2JulnAWcFzr+N30Efa56jnyz7q9W+Su3Jzpi3GrzfP/BAgMRi4DBnzJbSmzdz0Sn9Ukd3ouP1rpNukndv2rXJRdItUrtd/fXYiTlEPvdILNE98PGuIlcfbwDveLqp8lodwBDgB2f+hzTmaG9da6P+yvlAW6cS+cUx3OxMWIIOvUMLHTd6qbfhcdI/4+mtjfpd/eWpi/vu8D39pDsm2O4DXADcDXzkuWd7wQ0LMl125YmFQUlYEZnACL6ujQ53xttZPhn4pMXi32vswb0kUUm6Uoh8lTBRfTe2Ap5PGG8OBAWT1n6WMsyQvXm3RrzfsKlNejMM1yZ+wfM0/gW1Ly4kconsbZ5GvNqwqekatwewNpGIHSl0vpOPRgCH5NyT6Q2bsslQTpJ6pneRzTK1d6MMu8ve5mnEXS02NF9jRiaGI7XUvr+2KQ0Ct5W9zdOI+kKGZGLm3ajFHkHDn2oPLiQyRPY2TyPOiGymx3G732QSqe1Wqm3xVgmGy94e7UaMj2ymW/37ZpIw2Uu236q9dyGRTtl/nXOhfLlT/RcWEDnGicOsPaGQyPGyfy1l8KBI5me5NSpC+H1TgO0UHIaInC/b+ws+QhUQS8iS8GPAuM635wT6hqqvPbLwfeo/t4+InJ1KpDtgXPv+xYG+qSJzTWRhyzjRXXH1KxWrDQ2cgh7p2xwnUUsorQjiucBmLCRHWV7uF7SwZpjsl3p9YyJR8QLpx3h6Oy3JuDmwGQsQSah6jNcx9PV2Ud3ArxarXBoe9vTWRv2u3uyT4ebKtdir6j5qMTESRwX0t8j+Ik9vkQRKDypHLB1GuY2rN6+ZjGMDG7EgsVW+0iSWoIVyku6I/qDIfa31SfDPpZuSflpIZJXshyXqO6T/NaJPwuCAFzlVfTMLifwccdFWJUEeqnLE3iXDHxFXnwzfzd6WEFS2khcjIZBVY+qCXeXI/tK79S+TI3KJzI4seHghEatvoUpjqCpyRaLeqpFZeNybYJ3yCivOLS84VoN0ZF1nsd6pzvhlWruLqN/NfZbnpgHTAhuycqnhwUwi9i4h+1Dtqiti1xXJWk/JIXJ6YOJXCss6dbl1lqef0CIQrZxH8QRPbzXlZIxQaOFOYNXzndT/ZgaR2tP85Ont/5FYkFo54cioiD4Z/sWsVHFHD1NPZs6+JkLErQVXjpi+rhG4enPJ2TmyHwOtVfJFi/wj9ofm05lHsorIkxRinGKlmfqfoo6P2lSI2Khg0l7h74APNfZ6r4a1PfCU91dBjqyWvc0zAP7P+BtuZVBP7gW/JwAAAABJRU5ErkJggg==" alt="Icon">
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
    <div class="product-item text-white font-main secondary-color rounded-lg pl-2" data-dish-id="{{ $dish->id }}" data-subcategory-id="{{ $dish->subcategories_id }}" style="border-left: 6px solid #CDA0CB;">
            <div class="flex flex-col h-full justify-between">
                <div>
                    <p class="text-xs font-extralight mt-2 mb-3">{{ $dish->subcategory->name }}</p>
                    <h2 class="font-bold text-sm mb-1">{{ $dish->title }}</h2>
                    <p class="font-extralight text-sm mb-3">₡{{ $dish->dish_price }}</p>
                </div>

                <div class="flex items-center mb-4">
                    <button class="rounded w-6 border-2 border-white hover:scale-105 focus:outline-none inline-flex items-center justify-center" onclick="updateQuantity('{{ $dish->id }}', 1)">
                        <img class="w-4"  src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAdklEQVR4nO3UQQrCMBBA0RzPuBDvv2hA60Iv8boRtF2I0E6oOA+yzYdJmFLSnuGMB+449QzfvIw9wzMZDmMhrrSQ4fKzo8YRzfYa6qfwRZxxl+GKISA64LDFX5hZfeG3Mlx6kW/8D6Nu78uhZ7ji+jzrN1IqgSYK2LXvCFcYxQAAAABJRU5ErkJggg==">
                    </button>

                    <span id="quantity-{{ $dish->id }}" class="text-xs mx-2 font-light">0</span>

                    <button class="rounded w-6 border-2 border-white hover:scale-105 focus:outline-none inline-flex items-center justify-center" onclick="updateQuantity('{{ $dish->id }}', -1)">
                        <img class="w-4" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAPElEQVR4nO3RsQkAIBDAQMfz3b/2QdwjbiAWCha5BVKkFEmSTgANSO5LIHbhwTvzy3AA/UG0A/XotyRJC7QEesYmAFJ2AAAAAElFTkSuQmCC">
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
            <h2 class="text-white font-main font-semibold text-lg text-center">Facturacion</h2>
                
        <div id="billing-list" class="grid place-items-center mt-5 mb-5">
 
    </div>

    <hr class="border-b-1 border-white mt-2" />
    <div class="grid grid-cols-2">
        <h2 class="text-white font-main font-semibold text-lg ml-5 mt-5">Total</h2>
        <h3 id="total-amount" class="text-white text-xs font-semibold text-lg ml-5 mt-6 text-center font-main">₡0</h3>
    </div>

    <script>
document.addEventListener('DOMContentLoaded', function() {
    let billing = {};

    function updateQuantity(dishId, change) {
    if (!billing[dishId]) {
        const productElement = document.querySelector(`.product-item[data-dish-id='${dishId}']`);
        if (productElement) {
            const priceElement = productElement.querySelector('p.font-extralight');
            console.log(priceElement.innerText); // Verifica el texto que se obtiene
            
            billing[dishId] = {
                quantity: 0,
                title: productElement.querySelector('h2').innerText,
                price: parseFloat(priceElement.innerText.replace('₡', '').replace(/,/g, '').trim()) || 0
            };
        }
    }

    // Actualizar la cantidad
    billing[dishId].quantity += change;

    // Evitar cantidades negativas
    if (billing[dishId].quantity < 0) {
        billing[dishId].quantity = 0;
    }

    // Actualizar la vista de facturación
    renderBilling();
}

    function renderBilling() {
    const billingList = document.getElementById('billing-list');
    billingList.innerHTML = ''; // Limpiar la lista actual

    let total = 0;

    for (const id in billing) {
        if (billing[id].quantity > 0) {
            const itemTotal = billing[id].quantity * billing[id].price;
            total += itemTotal;

            // Crear el elemento para la facturación
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

    // Actualizar total
    document.getElementById('total-amount').innerText = `₡${total.toFixed(2)}`;
}

    // Añadir eventos a los botones de agregar y eliminar
    const addButtons = document.querySelectorAll('.product-item button:nth-of-type(1)'); // Botones de agregar
    const removeButtons = document.querySelectorAll('.product-item button:nth-of-type(2)'); // Botones de eliminar

    addButtons.forEach(button => {
        button.addEventListener('click', function() {
            const dishId = this.closest('.product-item').dataset.dishId; // Cambia a data-dish-id
            updateQuantity(dishId, 1);
        });
    });

    removeButtons.forEach(button => {
        button.addEventListener('click', function() {
            const dishId = this.closest('.product-item').dataset.dishId; // Cambia a data-dish-id
            updateQuantity(dishId, -1);
        });
    });
});
</script>


                <h2 class="text-gray-400 text-xs ml-5 mt-2 font-main">Método de Pago</h2>
                <div class="flex justify-around p-4">
                    <div class="group">
                        <button class="w-12 h-8 border-2 border-white flex justify-center items-center bg-transparent hover:bg-white hover:bg-opacity-20 transition duration-200 focus:bg-white focus:bg-opacity-20 focus:outline-none">
                            <img class="w-7" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAAACXBIWXMAAAsTAAALEwEAmpwYAAAC9ElEQVR4nO3aT4hVVRzA8esqKVoEaousaBItqYxiKrI/JEJtpD8zLWoR1aKFM7UYikJbFLhRiKAgaCFEKpVpfwjblEJTGP2BFhFF1EaDTMsgCMusTxz4BS7e3Df3vjfNe2fOF+7m3XPuPef77p/z+/1uVRUKhUKhUCgUCoVOYBnG8QgeH5ItjXUMS6u24GLsxd+Gl1N4HSNNJ38zjsuHNJcbm/zzx+XHL7hoNgL2ypfds3ngnZIv6Xl2bp2AMflzZ52AyZqOh9MlNCRbGutMTNYJmKrpmA482od39FicazUewP249LQrsNfjj8ZYZ2KqFwFTeuMDrMA7Hfa9HfumezzH1KAK+C4m+G1Nm2+wCkdyFHAr3ppFuzdwV24CPonV5Wy5AV/lJGACuxq034HNOQlYjZ8atE/PgMtyEXASF7bodwH+ykHAUVzZot8aHMtFwJoW/a7AzzkIOLnQb4E2D8Efcbl2DKSASexs0P5lPJmTgE9xU4P2a3NbCCVuw5u6s6fHvMTACvg+gqEU8MzE11iZazAkQt0VEfqezj9xdaSE7Id6Y04FjPYhYTEe57okkiFpWxW/jc93QmRiAaTEJuoE3CF/bq8TsDRWbrmSVpbLZhSQ6HL/DDuvVd3AcvwqP1K577yuAhK4Fr/JhzSXa6om4KB8ONho8jUCpgfg44du2/RcCni2GnDwTL8E7OtwoB8iW7sRD+Ee3B2Bznpch6ujuDES1ebFczLT/0HA0/rHH5EaS9Whz7E/CiAv4TlswaOxLN6A60PiEiyaLwEj+NNg1PSPRqT4UQRS27ENj+HBtLqLHELKIx7ocIz3GwtI4Al58ELVBiyK1FSb5OQgsa6VgP9I9fv0BsDHkdg4FiurYficZl811+BsnBOp7JGoA6S3wS0RYd4XidFN2IoX8Srejfv6y3jDnOjz5D9L46qGCZwVIq+Kkvq9eBhP4Xm8gvfwBQ7h9w4TPxyyz6gWAjgT58eVt3y+x1MoFAqFQqFQDQP/AgpANni/wqx8AAAAAElFTkSuQmCC" alt="Icono 1">
                        </button>
                        <h2 class="text-white text-xs text-center mt-1 font-main">Efectivo</h2>
                    </div>

                    <div class="group">
                        <button class="w-12 h-8 border-2 border-white flex justify-center items-center bg-transparent hover:bg-white hover:bg-opacity-20 transition duration-200 focus:bg-white focus:bg-opacity-20 focus:outline-none">
                            <img class="w-7" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAAACXBIWXMAAAsTAAALEwEAmpwYAAABIUlEQVR4nO3aPU7DQBCG4T0GhJsgOAGJuA2hR0hcKiRX4qdJ9aIlLpZhbGWVxp75nmoV7xR+N4pTuBQRERERkV/AI3AAvomj3sse2JQpwBvxvU6dfBZrL8CBPN69AF/k8ekFSEUBLJJRAItkFMAiGQWwSEYBLKYdgSdg5dUb9tRr22FvuADbdp8326xrhHABrjsCXBEwwB+XzC4yQBk57bHPWAAFsDiz1iV7FhsAWLX7vNlmfUPyx+AzAQMch+d72j9C4SiARTIKYJGMAlgkowAWvlvgrmM995m+b0Bprp2znvtMdwBO9e471nOf6Q4QlgJYJJP9FZkPL8CePHZegA15PPwLUNWXCInvpUwB1vU9umC/CfVedqMnLyIiIiIlnx+k7gyiIh0DzQAAAABJRU5ErkJggg==" alt="Icono 2">
                        </button>
                        <h2 class="text-white text-xs text-center mt-1 font-main">Tarjeta</h2>
                    </div>

                    <div class="group">
                        <button class="w-12 h-8 border-2 border-white flex justify-center items-center bg-transparent hover:bg-white hover:bg-opacity-20 transition duration-200 focus:bg-white focus:bg-opacity-20 focus:outline-none">
                            <img class="w-7" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEIAAABCCAYAAADjVADoAAAACXBIWXMAAAsTAAALEwEAmpwYAAABxElEQVR4nO3bvUocURyG8emMbtRGCfESFiSIlxCx0t40wW1svQILMaQQyxQptfKr2GphL0BBg0Ug6WKTViQWfoFIHjnwFsu43ezMOcO+P5hq4Jz/PsXOLszJMjMzs8oBDWARaAFrJV8t7dXIUgGMATvAA9W7B7aB0dgRJoEL4vsBjMcMcUw69mNFmCct/4G5GCG+9hlmXd8Z30v8wN+0R9gr70uMEEe5Ic567r0H7kqIcAu869nnPHf/KEaITm6Idu7+VgkhtnJ7tHP3OymGmAD+DDDCZVizdiGC8EgDVgbwA+pTv8djbUKUzSHEIcQhxCHEIcQhxCHEIcQhxCHEIcQhxCHEIcQhxCHEIcQhxCHEIcQhxCHEIcQhxCHEIcQhxCESD9GNMEM3xRD/gKkK958GblIMEfwCPgMLJV9hj9+8lkyI2BxCHKLuIS6AJWAZ+DmsIR5z70zOAE91DHFQcOjLPmv+LbjmYYwQGwWHfgaaPet90PvURWzGCNEcwOBXYXi9pXtdcK0wy2zlIQJgl3TsZZGPL53ELgCcAm+jhQiAkXA8QG/OV+1OxyXeZKkARoGPwGoFh9tW9Z8j7lkuMzPLhtMLw+/hgr3K2iEAAAAASUVORK5CYII=" alt="Icono 3">
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