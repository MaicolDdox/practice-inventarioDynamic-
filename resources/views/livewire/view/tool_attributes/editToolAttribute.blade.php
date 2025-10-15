<x-layouts.app :title="__('Editar Atributo de Item')">
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('Editar Atributo de Item') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('Aquí podrás editar un nuevo Atributo de item') }}</flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    <div class="max-w-lg mx-auto mt-8 bg-white dark:bg-zinc-700 shadow-lg rounded-2xl p-6">
        <p class="text-lg font-semibold bg-white mb-4 dark:bg-zinc-700">Editar Atributo</p>

        <form 
        action="{{ route('tool_attributes.update', $toolAttribute->id) }}" 
        method="post"
        class="space-y-4">

        @csrf
        @method('PUT')
            
            {{-- Select para el tipo de item --}}
            <flux:label for="toolType_id">Tipo De Item</flux:label>
            <flux:select placeholder="{{ $toolAttribute->toolType->name }}" name="toolType_id" id="toolType_id">
                @foreach ($toolTypes as $toolType)
                    <flux:select.option value="{{ $toolType->id }}">{{ $toolType->name }}</flux:select.option>
                @endforeach            
            </flux:select>
            @error('toolType_id')
                <span class="text-red-500 text-sm">{{ $mesagge }}</span>
            @enderror

            {{-- Nombre del campo que desea agregar --}}
            <flux:label for="data">Nombre Del Campo</flux:label>
            <flux:input
            name="data"
            id="data"
            value="{{ $toolAttribute->data }}"
            placeholder="Nombre..."
            />
            @error('data')
                <span class="text-red-500 text-sm">{{ $mesagge }}</span>
            @enderror

            {{-- Select para el tipo de dato --}}
            <flux:label for="data_type">Tipo De Dato</flux:label>
            <flux:select id="data_type" name="data_type" placeholder="{{ $toolAttribute->data_type }}">             
                    <flux:select.option value="string">Texto</flux:select.option>
                    <flux:select.option value="integer">Numero</flux:select.option>
                    <flux:select.option value="boolean">Verdadero / Falso</flux:select.option>
                    <flux:select.option value="date">Fecha</flux:select.option>
                    <flux:select.option value="time">Hora</flux:select.option>
                    <flux:select.option value="text">Descripccion</flux:select.option>   
            </flux:select>
            @error('data_type')
                <span class="text-red-500 text-sm">{{ $mesagge }}</span>
            @enderror

            {{-- Botón --}}
            <flux:button type="submit" class="w-full justify-center">
                Guardar
            </flux:button>
        
            {{-- Botón --}}
            <flux:button href="{{ route('tool_attributes.index') }}" class="w-auto justify-center items-center text-center">
            Volver
            </flux:button>
    
        </form>
    </div>

</x-layouts.app>