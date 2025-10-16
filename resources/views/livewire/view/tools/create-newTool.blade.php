<x-layouts.app :title="__('Crear nuevo Item')">

    {{-- Encabezado --}}
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('Nuevo Item') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">
            {{ __('Aquí podrás crear un nuevo Item') }}
        </flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    {{-- Contenedor principal --}}
    <div class="max-w-lg mx-auto mt-8 bg-white dark:bg-zinc-700 shadow-lg rounded-2xl p-6">
        <p class="text-lg font-semibold mb-4 dark:text-white">Nuevo Item</p>

        <form 
            action="{{ route('tools.store') }}" 
            method="POST" 
            enctype="multipart/form-data"
            class="space-y-4">
            
            @csrf

            {{-- 🔹 CAMPOS BASE (SIEMPRE VISIBLES) --}}
            <flux:label for="name">Nombre del ítem</flux:label>
            <flux:input 
                type="text" 
                name="name" 
                id="name" 
                placeholder="Nombre del ítem..." 
                class="w-full" />
            @error('name') 
                <p class="text-red-500 text-sm">{{ $message }}</p> 
            @enderror

            <flux:label for="img">Imagen</flux:label>
            <flux:input 
                type="file" 
                name="img" 
                id="img" 
                class="w-full" />
            @error('img') 
                <p class="text-red-500 text-sm">{{ $message }}</p> 
            @enderror

            <flux:label for="description">Descripción</flux:label>
            <flux:textarea 
                name="description" 
                id="description" 
                placeholder="Descripción del ítem..."
                class="w-full" />
            @error('description') 
                <p class="text-red-500 text-sm">{{ $message }}</p> 
            @enderror

            <flux:label for="state">Estado</flux:label>
            <flux:select name="state" id="state" class="w-full">
                <flux:select.option value="disponible">Disponible</flux:select.option>
                <flux:select.option value="prestado">Prestado</flux:select.option>
            </flux:select>
            @error('state') 
                <p class="text-red-500 text-sm">{{ $message }}</p> 
            @enderror

            {{-- 🔸 SELECCIÓN DE TIPO (desencadena los atributos dinámicos) --}}
            <flux:label for="toolType_id">Tipo de herramienta</flux:label>
            <flux:select
                name="toolType_id" 
                id="toolType_id"
                placeholder="Selecciona un tipo...">
                <flux:select.option value="">Seleccionar tipo...</flux:select.option>
                @foreach ($toolTypes as $type)
                    <flux:select.option 
                        value="{{ $type->id }}">
                        {{ $type->name }}
                    </flux:select.option>
                @endforeach
            </flux:select>

            {{-- 🔸 CAMPOS DINÁMICOS SEGÚN EL TIPO --}}
            @foreach ($toolTypes as $type)
                <div id="type-{{ $type->id }}" class="type-fields hidden mt-4">
                    <flux:separator variant="subtle" />
                    <flux:subheading size="md" class="mt-2 mb-2">
                        {{ __('Atributos de ') . $type->name }}
                    </flux:subheading>

                    {{-- Renderizado dinámico por tipo de dato --}}
                    @foreach ($type->toolAttribute as $attr)
                        <div class="mb-3">
                            <flux:label>{{ $attr->data }}</flux:label>

                            @switch($attr->data_type)
                                @case('string')
                                    <flux:input type="text" name="attributes[{{ $attr->id }}]" class="w-full" />
                                    @break

                                @case('integer')
                                    <flux:input type="number" name="attributes[{{ $attr->id }}]" class="w-full" />
                                    @break

                                @case('boolean')
                                    <flux:select name="attributes[{{ $attr->id }}]" class="w-full">
                                        <flux:select.option value="1">Sí</flux:select.option>
                                        <flux:select.option value="0">No</flux:select.option>
                                    </flux:select>
                                    @break

                                @case('date')
                                    <flux:input type="date" name="attributes[{{ $attr->id }}]" class="w-full" />
                                    @break

                                @default
                                    <flux:input type="text" name="attributes[{{ $attr->id }}]" class="w-full" />
                            @endswitch
                        </div>
                    @endforeach
                </div>
            @endforeach

            {{-- BOTÓN GUARDAR --}}
            <flux:button type="submit" class="mt-4 w-full">Guardar</flux:button>
        </form>
    </div>

    {{-- SCRIPT PARA MOSTRAR LOS ATRIBUTOS SEGÚN EL TIPO --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const selectTipo = document.getElementById('toolType_id');
            const bloquesTipo = document.querySelectorAll('.type-fields');

            // 🔹 Función para mostrar/ocultar bloques
            function actualizarCampos() {
                bloquesTipo.forEach(b => b.classList.add('hidden'));
                const tipoId = selectTipo.value;
                if (tipoId) {
                    const bloque = document.getElementById(`type-${tipoId}`);
                    if (bloque) bloque.classList.remove('hidden');
                }
            }

            // Escuchar cambios en el select
            selectTipo.addEventListener('change', actualizarCampos);

            // 🔸 Mostrar el bloque inicial si hay un tipo preseleccionado
            actualizarCampos();
        });
    </script>

</x-layouts.app>
