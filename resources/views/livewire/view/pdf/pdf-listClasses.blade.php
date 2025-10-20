<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista De Clases</title>
</head>

<body>

    <h1>LISTA DE CLASES</h1>

    <div class="overflow-x-auto bg-white dark:bg-zinc-800 shadow-lg rounded-2xl">
        <table class=" divide-y divide-gray-200 dark:divide-zinc-700">
            <thead class="bg-gray-100 dark:bg-zinc-700">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Clase
                    </th>
                    <th
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider truncate overflow-hidden whitespace-nowrap">
                        Descripción</th>
                </tr>
            </thead>

            <tbody class="bg-white dark:bg-zinc-800 divide-y divide-gray-200 dark:divide-zinc-700">
                @foreach ($toolClasses as $class)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-gray-700 dark:text-gray-100 font-medium">
                            {{ $class->class }}
                        </td>
                        <td class="px-6 py-4 max-w-[200px] text-gray-700 dark:text-gray-300">
                            <div class="truncate overflow-hidden whitespace-nowrap block">
                                {{ $class->description ?? 'Sin descripción' }}
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
