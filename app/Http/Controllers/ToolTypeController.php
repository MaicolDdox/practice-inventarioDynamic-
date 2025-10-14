<?php

namespace App\Http\Controllers;

use App\Models\ToolClass;
use App\Models\ToolType;
use Illuminate\Http\Request;

class ToolTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $toolTypes = ToolType::all();
        return view('livewire.view.type_items.listTypeItem', compact('toolTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $toolClasses = ToolClass::all(); 
        return view('livewire.view.type_items.create-newTypeItem', compact('toolClasses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'toolClass_id' => 'required',
            'name' => 'required|string|max:250',
            'description' => 'nullable|string|max:500'
        ]);

        ToolType::create($validate);

        return redirect()->route('tool_types.index')->with('success', 'Tipo de Item agregado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(ToolType $toolType)
    {
        return view('livewire.view.type_items.showToolType', compact('toolType'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ToolType $toolType)
    {
        $toolClasses = ToolClass::all();
        $nameClass = ToolClass::find($toolType->toolClass_id);
        return view('livewire.view.type_items.editToolType', compact('toolType', 'toolClasses', 'nameClass'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ToolType $toolType)
    {
        $validate = $request->validate([
            'toolClass_id' => 'nullable',
            'name' => 'nullable|string|max:250',
            'description' => 'nullable|string|max:500'
        ]);

        $toolType->update($validate);

        return redirect()->route('tool_types.index')->with('success', 'Tipo de Item actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ToolType $toolType)
    {
        $toolType->delete();

        return redirect()->route('tool_types.index')->with('success', 'Tipo de Item Eliminado correctamente');
    }
}
