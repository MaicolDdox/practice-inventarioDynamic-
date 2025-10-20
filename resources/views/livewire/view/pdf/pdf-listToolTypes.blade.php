<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LISTA TIPO DE ITEMS</title>
</head>

<body>
    <h1>LISTA TIPOS DE ITEMS</h1>

    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <table class="min-w-full text-gray-700 text-sm">
            <thead class="bg-gray-100 text-xs uppercase text-gray-600">
                <tr>
                    <th class="px-6 py-3 text-left">Tipo de Clase</th>
                    <th class="px-6 py-3 text-left">Nombre</th>
                    <th class="px-6 py-3 text-left">Descripción</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach ($toolTypes as $type)
                    <tr>
                        <td class="px-6 py-3">{{ $type->toolClass->class ?? null }}</td>
                        <td class="px-6 py-3">{{ $type->name }}</td>
                        <td class="px-6 py-3 truncate overflow-hidden whitespace-nowrap">{{ $type->description }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
