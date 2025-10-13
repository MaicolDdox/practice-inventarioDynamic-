<?php

namespace App\Http\Controllers;

use App\Models\ToolClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ToolClassController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $toolClasses = ToolClass::all();
        return view('livewire.view.class.listClass', compact('toolClasses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('livewire.view.class.create-newClass');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'icon' => 'nullable|image',
            'class' => 'required|string|max:250|unique:tool_classes,class',
            'description' => 'nullable|string|max:500',
        ]);

        $iconPaht = null;

        if ($request->hasFile('icon')) {
            $iconPaht = $request->file('icon')->store('icons','public');
        }

        ToolClass::create([
            'icon' => $iconPaht,
            'class' => $validate['class'],
            'description' => $validate['description'] ?? null,
        ]);

        return redirect()->route('tool_classes.index')->with('success', 'Clase creada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(ToolClass $toolClass)
    {
        return view('livewire.view.class.showClass',compact('toolClass'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ToolClass $toolClass)
    {
        return view('livewire.view.class.editClass',compact('toolClass'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ToolClass $toolClass)
    {
        $validate = $request->validate([
            'icon' => 'nullable|image',
            'class' => 'nullable|string|max:250',
            'description' => 'nullable|string|max:500',
        ]);

        $iconAntiguo = $toolClass->icon;

        if ($request->hasFile('icon')) {
            if ($iconAntiguo && Storage::disk('public')->exists($iconAntiguo)) {
                Storage::disk('public')->delete($iconAntiguo);
            }

            $nuevoIcon = $request->file('icon')->store('icons', 'public');

            $toolClass->icon = $nuevoIcon;
        }

        $toolClass->class = $validate['class'];
        $toolClass->description = $validate['description'] ?? null;
        $toolClass->save();

        return redirect()->route('tool_classes.index')->with('success', 'Clase Actualizada con Exito');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ToolClass $toolClass)
    {
        $toolClass->delete();

        return redirect()->route('tool_classes.index')->with('success','Clase Borrada Correctamente');
    }
}
