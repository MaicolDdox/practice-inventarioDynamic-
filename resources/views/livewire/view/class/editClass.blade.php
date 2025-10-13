<x-layouts.app :title="__('Editar Clase')">
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('Editar Clase') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('Aqui podras Editar una Clase Existente') }}
        </flux:subheading>
        <flux:separator variant="subtle" />


    </div>

    <div class="max-w-lg mx-auto bd-white shadow-lg rounded-2xl mt-8 p-6" >
        <p class="text-lg font-semibold bg-white mb-4 dark:bg-zinc-700">Actualizar Clase</p>

            @if (session('error'))
                <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif

        <form 
            method="POST" 
            action="{{ route('tool_classes.update', $toolClass->id) }}" 
            enctype="multipart/form-data" c
            class="space-y-4" >

            @csrf
            @method('PUT')

            <flux:input
            type="file"
            label='icon'
            wire:model="logo"
            name="icon"
            id="icon"
            />            
            @error('icon')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror

            <flux:label>Imagen Anterior</flux:label>
            <img class="w-10 h-10 object-cover" src="{{ asset('storage/' . $toolClass->icon) }}" alt="Icon">
            
            <flux:label for="class">Nombre De La Clase</flux:label>
            <flux:input
            name="class"
            id="class"
            value="{{ $toolClass->class }}"/>
            @error('class')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror

            <flux:label for="description">Descripccion Corta</flux:label>
            <flux:input
            name="description"
            id="description"
            value="{{ $toolClass->description }}"/>
            @error('description')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror

            {{-- Botón --}}
            <flux:button type="submit" class="w-full justify-center">
                Actualizar
            </flux:button>

            {{-- Botón --}}
            <flux:button href="{{ route('tool_classes.index') }}" class="w-auto justify-center items-center text-center">
                Volver
            </flux:button>
        </form>        
    </div>
    
</x-layouts.app>