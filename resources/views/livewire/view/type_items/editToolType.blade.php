<x-layouts.app :title="__('Editar Tipo De Item')">
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('Editar Tipo De Item') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('Aqui podras Editar un Tipo De Item Existente') }}
        </flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    <div class="max-w-lg mx-auto bd-white shadow-lg rounded-2xl mt-8 p-6" >
        <p class="text-lg font-semibold bg-white mb-4 dark:bg-zinc-700">Actualizar Tipo De Item</p>

            @if (session('error'))
                <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif

            <form 
                method="POST" 
                action="{{ route('tool_types.update', $toolType->id) }}" 
                class="space-y-4">
            @csrf
            @method('PUT')

            {{-- Selección de Clase --}}
            <flux:select 
                name="toolClass_id"  
                placeholder="{{ $nameClass->class }}">
                @foreach ($toolClasses as $class)
                    <flux:select.option value="{{ $class->id }}">
                        {{ $class->class }}
                    </flux:select.option>
                @endforeach
            </flux:select>
            @error('toolClass_id')
                <div class="text-red-500 text-sm">
                    <span>{{ $message }}</span>
                </div>
            @enderror


            <flux:label for="name">Nombre Del Tipo De Item</flux:label>
            <flux:input
            name="name"
            id="name"
            value="{{ $toolType->name }}"/>
            @error('name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror

            <flux:label for="description">Descripccion Corta</flux:label>
            <flux:input
            name="description"
            id="description"
            value="{{ $toolType->description }}"/>
            @error('description')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror

            {{-- Botón --}}
            <flux:button type="submit" class="w-full justify-center">
                Actualizar
            </flux:button>

            {{-- Botón --}}
            <flux:button href="{{ route('tool_types.index') }}" class="w-auto justify-center items-center text-center">
                Volver
            </flux:button>
        </form>        
    </div>
    
</x-layouts.app>