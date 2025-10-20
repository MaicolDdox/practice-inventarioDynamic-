<x-layouts.app :title="__('Lista de Atributos')">

    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('Lista de Atributos') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">
            {{ __('Aquí podrás ver todas los Atributos agregadas') }}
        </flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    {{-- Botón para crear nueva clase --}}
    <div class="mb-4 text-right">
        <flux:button :href="route('tool_attributes.create')" wire:navigate>
            Crear Atributos
        </flux:button>

        <flux:button :href="route('tool_attributes.pdf')" wire:navigate>
            Exportar Reporte PDF
        </flux:button>
    </div>

    {{-- Success --}}
    @if (session('success'))
        <div class="bg-green-200 max-w-sm w-full shadow-lg mt-8 p-3 rounded-r-lg">
            <span class="text-sm text-gray-500">{{ session('success') }}</span>
        </div>
    @endif

    @if ($toolAttributes->isEmpty())

        <div class="bg-white max-w-lg mx-auto shadow-lg mt-8 p-6">
            <span class="text-lg text-gray-500"> No tienes ningun atributo creado </span>
        </div>

    @else

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
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                       Acciones 
                    </th>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($toolAttributes as $toolAttribute )                        
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
                        <td class="px-6 py-4 whitespace-nowrap">
                            <flux:dropdown>
                                <flux:button icon:trailing="chevron-down">
                                    Options
                                </flux:button>
                                <flux:menu>
                                    <flux:menu.item href="{{ route('tool_attributes.edit', $toolAttribute->id) }}" icon="document-duplicate">
                                        Edit
                                    </flux:menu.item>
                                    <form action="{{ route('tool_attributes.destroy', $toolAttribute->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <flux:menu.item onclick="confirm('¿Esta Seguro que desea eliminar este atributo?')" variant="danger" type="submit" icon="trash">
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
