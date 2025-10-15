<?php

namespace App\Http\Controllers;

use App\Models\ToolAttribute;
use App\Models\ToolType;
use Illuminate\Http\Request;

class ToolAttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $toolAttributes = ToolAttribute::all();
        return view('livewire.view.tool_attributes.listToolAttribute', compact('toolAttributes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $toolTypes = ToolType::all();
        return view('livewire.view.tool_attributes.create-newToolAttribute', compact('toolTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'toolType_id' => "required",
            'data' => "required|string|max:250",
            'data_type' => "required",
        ]);

        ToolAttribute::create($validate);

        return redirect()->route('tool_attributes.index')->with('success', 'Atributo creado correctamente');

    }

    /**
     * Display the specified resource.
     */
    public function show(ToolAttribute $toolAttribute)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ToolAttribute $toolAttribute)
    {
        $toolTypes = ToolType::all();
        return view('livewire.view.tool_attributes.editToolAttribute', compact('toolAttribute', 'toolTypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ToolAttribute $toolAttribute)
    {
        $validate = $request->validate([
            'toolType_id' => 'nullable',
            'data' => 'nullable|string|max:250',
            'data_type' => 'nullable',
        ]);

        $toolAttribute->update($validate);

        return redirect()->route('tool_attributes.index')->with('success', 'Atributo actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ToolAttribute $toolAttribute)
    {
        $toolAttribute->delete();

        return redirect()->route('tool_attributes.index')->with('success', 'atributo eliminado correctamente');
    }
}
