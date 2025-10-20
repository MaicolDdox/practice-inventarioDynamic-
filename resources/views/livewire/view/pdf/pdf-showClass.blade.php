<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detalles de clases</title>
</head>

<body>
    <h1>Detalles de Clase {{ $toolClass->class }}</h1>

    <div class="overflow-x-auto">
        <table class="min-w-full">
            <thead>
                <th class="px-6 py-3 text-gray-500">
                    Clase
                </th>
                <th class="px-6 py-3 text-gray-500">
                    Descripccion
                </th>
            </thead>
            <tbody>
                <tr>
                    <td class="px-6 py-3">
                        {{ $toolClass->class }}
                    </td>
                    <td class="px-6 py-3">
                        <p>
                            {{ $toolClass->description }}
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>
