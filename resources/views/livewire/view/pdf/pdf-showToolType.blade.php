<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detalles de tipo de Item</title>
</head>

<body>
    <h1>Detalles de tipo de item {{ $toolType->nam }}</h1>

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
                <tr>
                    <td class="px-6 py-3">{{ $toolType->toolClass->class ?? null }}</td>
                    <td class="px-6 py-3">{{ $toolType->name }}</td>
                    <td class="px-6 py-3">{{ $toolType->description }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>
