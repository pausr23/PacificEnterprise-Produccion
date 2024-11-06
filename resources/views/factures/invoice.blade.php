@extends('dishes.layout')

@section('content')
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imprimir Factura</title>
    <!-- Estilos CSS -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 10px;
            width: 40%;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-radius: 2rem;
        }

        th,
        td {
            padding: 4px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tbody {
            background-color: #f2f2f2;
            height: 60%;
            /* Asegura que el cuerpo ocupe el 60% de la altura de la tabla */

            overflow-y: auto;
            /* Permite el desplazamiento vertical si el contenido excede la altura */
        }

        .total {
            font-weight: bold;
        }
    </style>

    <!-- Script para imprimir la factura al cargar la página -->
    <script>
        window.onload = function () {
            window.print();
        };
    </script>
</head>

<body>
    <!-- Logo de la empresa -->
    

   

    <!-- Comprobación de si el archivo existe -->
    @if (isset($filePath))
        <!-- iframe oculto para cargar el archivo de la factura -->
        <iframe src="{{ asset($filePath) }}" style="display:none;" title="Factura del archivo cargado"></iframe>


        <!-- Tabla con los detalles de los productos -->
        <div id="back-button-container" class="flex justify-center mb-10"></div>
        <table>
            <thead>
                <tr>
                    <th>Cantidad</th>
                    <th>Producto</th>
                    <th>Precio</th>
                </tr>
            </thead>
            <tbody class=" ml-4"> 
            
                @foreach ($addedItemsWithDetails as $item)
                    <tr>
                        <td>{{ $item['quantity'] }}</td>
                        <td>{{ $item['title'] }}</td>
                        <td>{{ number_format($item['price'], 2) }}</td>
                    </tr>
                @endforeach
                <tr class="mb-20">
                    <td colspan="2" class="total">Total:</td>
                    <td class="total">{{ number_format($total, 2) }}</td>
                </tr>
            </tbody>
        </table>

    @else
        <!-- Mensaje si no se encuentra el archivo -->
        <p>No se encontró el archivo de la factura.</p>
    @endif

    <!-- Contenedor para el botón de regreso -->


    <!-- Script para agregar el botón de regreso después de un tiempo -->
        <script>
        setTimeout(function () {
            const backButtonContainer = document.getElementById('back-button-container');
    
            // Crear el botón "Regresar"
            const backButton = document.createElement('button');
            backButton.textContent = 'Regresar';
            backButton.className = 'bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600';
            backButton.onclick = function () {
                window.location.href = '{{ route('factures.ordering') }}';
            };
            backButtonContainer.appendChild(backButton);
    
            // Crear el botón "Imprimir"
            const printButton = document.createElement('button');
            printButton.textContent = 'Imprimir';
            printButton.className = 'bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600 ml-4';
            printButton.onclick = function () {
                window.location.reload();
            };
            backButtonContainer.appendChild(printButton);
        }, 1000); // 1000 milisegundos = 1 segundo
    </script>
</body>

</html>
@endsection