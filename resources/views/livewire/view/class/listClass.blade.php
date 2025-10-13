<x-layouts.app :title="__('Lista de Clases')">

    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('Lista de Clases') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">
            {{ __('Aquí podrás ver todas las clases agregadas') }}
        </flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    {{-- Botón para crear nueva clase --}}
    <div class="mb-4 text-right">
        <flux:button :href="route('tool_classes.create')" wire:navigate>
            Crear Clase
        </flux:button>
    </div>

    {{-- Verificar si hay clases --}}
    @if ($toolClasses->isEmpty())
        <div class="p-6 bg-yellow-50 text-yellow-800 rounded-xl shadow-sm">
            No hay clases registradas todavía.
        </div>
    @else
        <div class="overflow-x-auto bg-white dark:bg-zinc-800 shadow-lg rounded-2xl">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-zinc-700">
                <thead class="bg-gray-100 dark:bg-zinc-700">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Icono
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Clase
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Descripción</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Acciones</th>
                    </tr>
                </thead>

                <tbody class="bg-white dark:bg-zinc-800 divide-y divide-gray-200 dark:divide-zinc-700">
                    @foreach ($toolClasses as $class)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if ($class->icon)
                                    <img src="{{ asset('storage/' . $class->icon) }}" alt="Icono"
                                        class="w-10 h-10 rounded-lg object-cover">
                                @else
                                    <span class="text-gray-400 italic">Sin icono</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-700 dark:text-gray-100 font-medium">
                                {{ $class->class }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-700 dark:text-gray-300">
                                {{ $class->description ?? 'Sin descripción' }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right space-x-2">
                                <flux:dropdown>
                                    <flux:button icon:trailing="chevron-down">Options</flux:button>
                                    <flux:menu>
                                        <flux:menu.item :href="route('tool_classes.show', $class->id)" icon="ellipsis-horizontal-circle">
                                            Detalles
                                        </flux:menu.item>
                                        <flux:menu.item :href="route('tool_classes.edit', $class->id)" icon="document-duplicate">
                                            Editar
                                        </flux:menu.item>
                                        <form method="POST" action="{{ route('tool_classes.destroy', $class->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <flux:menu.item onclick="confirm('¿Desea borrar esta clase?')" type="submit" icon="trash" variant="danger">
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
