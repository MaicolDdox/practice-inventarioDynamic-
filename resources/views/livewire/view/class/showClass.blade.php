<x-layouts.app :title="__('Detalles de Clase ')">

    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('Detalles Clase') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">
            {{ __('Aquí podrás ver la informacion detallada de tu clase') }}
        </flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    <!-- Boton para retroceder -->
    
    <div class="mb-4 text-right">
        <flux:button :href="route('tool_classes.index')" wire:navigate>
            Volver
        </flux:button>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full">
            <thead>
                <th class="px-6 py-3 text-gray-500">
                    Icono
                </th>
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
                    @if ($toolClass->icon)
                        <img
                        class="w-10 h-10 object-cover"  
                        src="{{ asset('storage/'. $toolClass->icon) }}" 
                        alt="icon">
                    @else
                        <span class="text-gray-500">Icono no Exist!</span>
                    @endif
                </td>
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


</x-layouts.app>