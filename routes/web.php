<?php

use App\Http\Controllers\AttributeValueController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\ToolAttributeController;
use App\Http\Controllers\ToolClassController;
use App\Http\Controllers\ToolController;
use App\Http\Controllers\ToolTypeController;
use App\Http\Controllers\RoleCreateController;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use App\Livewire\Settings\TwoFactor;
use App\Models\ToolType;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');

    Route::get('settings/two-factor', TwoFactor::class)
        ->middleware(
            when(
                Features::canManageTwoFactorAuthentication()
                    && Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword'),
                ['password.confirm'],
                [],
            ),
        )
        ->name('two-factor.show');


    //=========================
    //========RUTAS============
    //=========================

    //Rutas para tool_classes (clases de herramientas)
    Route::resource('tool_classes', ToolClassController::class);

    //Rutas para tool_types (Tipo de herramientas)
    Route::resource('tool_types', ToolTypeController::class);

    //Rutas para tool_attributes (Atributos de las herramientas)
    Route::resource('tool_attributes', ToolAttributeController::class);

    //Rutas para tools (Herramientas)
    Route::resource('tools',ToolController::class);

    //Rutas para attribute_values (Valores de Atributos)
    Route::resource('attribute_values', AttributeValueController::class);

    //Rutas para loans (prestamos)
    Route::resource('loans', LoanController::class);

    //Rutas para los Roles
    Route::resource('role_creates', RoleCreateController::class);
});

require __DIR__.'/auth.php';
