<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista de atributos de clases</title>
</head>

<body>
    <h1>LISTA DE ATRIBUTOS DE CLASE</h1>

    <div class="overflow-x-auto bg-white dark:bg-zinc-800 shadow-lg rounded-2xl">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-zinc-700">
            <thead class="bg-gray-100">
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Tipo De Item
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Dato
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Tipo De Dato
                </th>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($toolAttributes as $toolAttribute)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ $toolAttribute->toolType->name }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ $toolAttribute->data }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ $toolAttribute->data_type }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
