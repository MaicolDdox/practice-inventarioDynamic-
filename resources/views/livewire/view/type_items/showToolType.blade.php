<x-layouts.app :title="__('Listado de Tipos De Item')">
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('Listado De Tipos De Item') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('Aqui podras ver todos los tipos de Item') }}
        </flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    <div class="mb-5">
        <flux:button href="{{ route('tool_types.index') }}">
            Volver
        </flux:button>
    </div>

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
</x-layouts.app>
