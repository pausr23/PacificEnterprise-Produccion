@extends('dishes.layout')

@section('content')
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imprimir Factura</title>
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
        }

        th,
        td {
            padding: 4px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .total {
            font-weight: bold;
        }
    </style>


    <script>
        window.onload = function () {
            window.print();
        };
    </script>
</head>

<body>
    <img class="w-52 mx-auto mb-10" src="https://i.ibb.co/KX69vv5/Pacific-Enterprise.png" alt="">
    <h1 class="mb-10 text-center">FACTURA</h1>
    @if (isset($filePath))
        <iframe src="{{ asset($filePath) }}" style="display:none;"></iframe>
        <table>
            <thead>
                <tr>
                    <th>Cantidad</th>
                    <th>Producto</th>
                    <th>Precio</th>
                </tr>
            </thead>
            <tbody>
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
        <p>No se encontró el archivo de la factura.</p>
    @endif

    <div id="back-button-container" class="flex justify-center mt-10"></div>

    <script>
        setTimeout(function () {
            const backButtonContainer = document.getElementById('back-button-container');
            const backButton = document.createElement('button');
            backButton.textContent = 'Regresar';
            backButton.className = 'bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600';
            backButton.onclick = function () {
                window.history.back();
            };
            backButtonContainer.appendChild(backButton);
        }, 1000); // 5000 milisegundos = 5 segundos
    </script>


</body>

</html>
@endsection