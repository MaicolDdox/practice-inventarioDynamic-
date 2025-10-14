<x-layouts.app :title="__('Crear Tipo De Item')">
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('Nuevo Tipo de Item') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('Aquí podrás crear un nuevo tipo de item') }}</flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    <div class="shadow-lg mt-8 p-6 bg-white dark:bg-zinc-700 rounded-2xl max-w-lg mx-auto">
        <p class="text-gray-700 dark:text-gray-300 text-lg mb-4 font-semibold">Crear Tipo de Item</p>

        <form 
            action="{{ route('tool_types.store') }}" 
            method="POST"
            class="space-y-6"
        >
            @csrf

            {{-- Selección de Clase --}}
            <flux:select for="toolClass_id" name="toolClass_id" placeholder="Clase de Item...">
                @foreach ($toolClasses as $class)                        
                    <flux:select.option id="toolClass_id" value="{{ $class->id }}">{{ $class->class }}</flux:select.option>
                @endforeach
            </flux:select>
            @error('toolClass_id')
                <div class="text-red-500 text-sm">
                    <span>{{ $message }}</span>
                </div>
            @enderror

            {{-- Campo: Nombre --}}
            <flux:label for="name">Nombre del tipo de Item</flux:label>
            <flux:input
                name="name"
                id="name"
                placeholder="Nombre del Item..."
            />
            @error('name')
                <div class="text-red-500 text-sm">
                    <span>{{ $message }}</span>
                </div>
            @enderror

            {{-- Campo: Descripción --}}
            <flux:label for="description">Descripción Corta</flux:label>
            <flux:textarea
                name="description"
                id="description"
                placeholder="Descripción..."
            />
            @error('description')
                <div class="text-red-500 text-sm">
                    <span>{{ $message }}</span>
                </div>
            @enderror

            {{-- Botón de guardar --}}
            <flux:button type="submit" class="w-full justify-center">
                Guardar
            </flux:button>

            {{-- Botón de volver --}}
            <flux:button href="{{ route('tool_types.index') }}" variant="subtle" class="w-full justify-center">
                Volver
            </flux:button>
        </form>
    </div>
</x-layouts.app>
