<x-layouts.app :title="__('Listado de Tipos De Item')">
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('Listado De Tipos De Item') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('Aqui podras ver todos los tipos de Item') }}
        </flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    <div class="mb-5">
        <flux:button href="{{ route('tool_types.create') }}">
            Crear Nuevo +
        </flux:button>

        <flux:button href="{{ route('tool_types.pdf') }}">
            Exportar Reporte PDF
        </flux:button>
    </div>

    @if ($toolTypes->isEmpty())
        <div class="bg-white shadow-lg p-6 text-center rounded-lg">
            <span class="text-lg text-gray-500">No cuentas con ningún tipo de item creado</span>
        </div>
    @else
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <table class="min-w-full text-gray-700 text-sm">
                <thead class="bg-gray-100 text-xs uppercase text-gray-600">
                    <tr>
                        <th class="px-6 py-3 text-left">Tipo de Clase</th>
                        <th class="px-6 py-3 text-left">Nombre</th>
                        <th class="px-6 py-3 text-left">Descripción</th>
                        <th class="px-6 py-3 text-left">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($toolTypes as $type)
                        <tr>
                            <td class="px-6 py-3">{{ $type->toolClass->class ?? null }}</td>
                            <td class="px-6 py-3">{{ $type->name }}</td>
                            <td class="px-6 py-3 ">{{ $type->description }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-right space-x-2">
                                <flux:dropdown>
                                    <flux:button icon:trailing="chevron-down">Options</flux:button>
                                    <flux:menu>
                                        <flux:menu.item :href="route('tool_types.show', $type->id)" icon="ellipsis-horizontal-circle">
                                            Detalles
                                        </flux:menu.item>
                                        <flux:menu.item :href="route('tool_types.edit', $type->id)" icon="document-duplicate">
                                            Editar
                                        </flux:menu.item>
                                        <flux:menu.item :href="route('tool_types.pdf.id', $type->id)" icon="document-duplicate">
                                            Exportar Reporte PDF
                                        </flux:menu.item>
                                        <form method="POST" action="{{ route('tool_types.destroy', $type->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <flux:menu.item onclick="confirm('¿Desea borrar este tipo de item?')" type="submit" icon="trash" variant="danger">
                                                Delete
                                            </flux:menu.item>
                                        </form>
                                    </flux:menu>
                                </flux:dropdown>
                            </td>
                        </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    @endif


</x-layouts.app>
