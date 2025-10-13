<x-layouts.app :title="__('Crear Clase')">
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('Nueva Clase') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('Aqui podras crear una nueva Clase') }}
        </flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    <div class="max-w-lg mx-auto mt-8 bg-white dark:bg-zinc-700 shadow-lg rounded-2xl p-6">
        <p class="text-lg font-semibold bg-white mb-4 dark:bg-zinc-700">Registrar Clase</p>

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif


        <form method="POST" action="{{ route('tool_classes.store') }}" enctype="multipart/form-data" class="space-y-4">
            @csrf
            {{-- Campo: icon --}}
            
                <flux:input
                label="Icono"
                type="file" 
                wire:model="logo"
                name="icon"
                id="icon"/>                 
                @error('icon')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror                

                {{-- Campo: class --}}
                <flux:label for="class">Nombre de la Clase</flux:label>
                <flux:input             
                name="class"
                id="class"
                placeholder="Ejemplo: Clase de Programación" />
                @error('class')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror

                {{-- Campo: description --}}
                <flux:label for="description">Descripcion Corta</flux:label>
                <flux:textarea           
                name="description"
                id="description"
                placeholder="Agrega una breve descripción..." />
                @error('description')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror

                {{-- Botón --}}
                <flux:button type="submit" class="w-full justify-center">
                    Guardar
                </flux:button>

                {{-- Botón --}}
                <flux:button href="{{ route('tool_classes.index') }}" class="w-auto justify-center items-center text-center">
                Volver
                </flux:button>
        </form>
    </div>
</x-layouts.app>
