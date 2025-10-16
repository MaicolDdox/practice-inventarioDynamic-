<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-white dark:bg-zinc-800">
        <flux:sidebar sticky stashable class="border-e border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
            <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

            <a href="{{ route('dashboard') }}" class="me-5 flex items-center space-x-2 rtl:space-x-reverse" wire:navigate>
                <x-app-logo />
            </a><hr>

            <flux:navlist variant="outline">
                <flux:navlist.group :heading="__('Platform')" class="grid">
                    <flux:navlist.item icon="home" :href="route('dashboard')" :current="request()->routeIs('dashboard')" wire:navigate>
                        {{ __('Dashboard') }}
                    </flux:navlist.item>


                    <!-- NUEVAS OPCIONES DEL SIDEBAR -->

                    <!-- Opciones para Clases -->
                    <flux:sidebar.group icon="inbox" expandable heading="Clases" class="grid">
                        <flux:sidebar.item href="{{ route('tool_classes.index') }}">Lista de Clases</flux:sidebar.item>
                        <flux:sidebar.item href="{{ route('tool_classes.create') }}">Crear Clase</flux:sidebar.item>
                    </flux:sidebar.group>

                    <!-- Opciones para tipo de herramientas -->
                    <flux:sidebar.group icon="server-stack" expandable heading="Tipo De Items" class="grid">
                        <flux:sidebar.item href="{{ route('tool_types.index') }}">Lista de Tipos de items</flux:sidebar.item>
                        <flux:sidebar.item href="{{ route('tool_types.create') }}">Crear Nuevo Tipo</flux:sidebar.item>
                    </flux:sidebar.group>

                    <!-- Opciones para herramientas -->
                    <flux:sidebar.group icon="list-bullet" expandable heading="Items" class="grid">
                        <flux:sidebar.item href="{{ route('tools.index') }}">Lista de Items</flux:sidebar.item>
                        <flux:sidebar.item href="{{ route('tools.create') }}">Crear Nuevo Items</flux:sidebar.item>
                    </flux:sidebar.group>

                    {{-- Opciones para Atributos --}}
                    <flux:sidebar.group icon="cloud-arrow-down" expandable heading="Atributos" class="grid">
                        <flux:sidebar.item href="{{ route('tool_attributes.index') }}">Lista de Atributos</flux:sidebar.item>
                        <flux:sidebar.item href="{{ route('tool_attributes.create') }}">Creat Nuevo Atributo</flux:sidebar.item>
                    </flux:sidebar.group>

                    {{-- Opciones para crear tools --}}
                    <flux:sidebar.group icon="briefcase" expandable heading="Items" class="grid">
                        <flux:sidebar.item href="{{ route('tools.index') }}">Lista de Items</flux:sidebar.item>
                        <flux:sidebar.item href="{{ route('tools.create') }}">Creat Nuevo Item</flux:sidebar.item>
                    </flux:sidebar.group>

                    <!-- Opciones para Prestamos -->                    
                    <flux:navlist.item href="{{ route('loans.index') }}" icon="flag" >
                        Prestamos
                    </flux:navlist.item>

                    <!-- Opciones para Crear Roles -->
                    <flux:navlist.item href="{{ route('role_creates.index') }}" icon="wrench-screwdriver" >                        
                        Roles
                    </flux:navlist.item>


                </flux:navlist.group>
            </flux:navlist>

            <flux:spacer />

            <flux:navlist variant="outline">
                <!-- CAMPO PARA AGREGAR MAS OPCIONES EN LA PARTE BAJA DEL SIDEBAR -->
            </flux:navlist>

            <!-- Desktop User Menu -->
            <flux:dropdown class="hidden lg:block" position="bottom" align="start">
                <flux:profile
                    :name="auth()->user()->name"
                    :initials="auth()->user()->initials()"
                    icon:trailing="chevrons-up-down"
                />

                <flux:menu class="w-[220px]">
                    <flux:menu.radio.group>
                        <div class="p-0 text-sm font-normal">
                            <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                                <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                    <span
                                        class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white"
                                    >
                                        {{ auth()->user()->initials() }}
                                    </span>
                                </span>

                                <div class="grid flex-1 text-start text-sm leading-tight">
                                    <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                    <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                                </div>
                            </div>
                        </div>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <flux:menu.radio.group>
                        <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate>{{ __('Settings') }}</flux:menu.item>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                            {{ __('Log Out') }}
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>
        </flux:sidebar>

        <!-- Mobile User Menu -->
        <flux:header class="lg:hidden">
            <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

            <flux:spacer />

            <flux:dropdown position="top" align="end">
                <flux:profile
                    :initials="auth()->user()->initials()"
                    icon-trailing="chevron-down"
                />

                <flux:menu>
                    <flux:menu.radio.group>
                        <div class="p-0 text-sm font-normal">
                            <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                                <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                    <span
                                        class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white"
                                    >
                                        {{ auth()->user()->initials() }}
                                    </span>
                                </span>

                                <div class="grid flex-1 text-start text-sm leading-tight">
                                    <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                    <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                                </div>
                            </div>
                        </div>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <flux:menu.radio.group>
                        <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate>{{ __('Settings') }}</flux:menu.item>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                            {{ __('Log Out') }}
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>
        </flux:header>

        {{ $slot }}

        @fluxScripts
    </body>
</html>
