<?php

namespace App\Http\Controllers;

use App\Models\Tool;
use App\Models\ToolType;
use App\Models\AttributeValue;
use Illuminate\Http\Request;

class ToolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tools = Tool::all();
        return view('livewire.view.tools.list-tools',compact('tools'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $toolTypes = ToolType::with('toolAttribute')->get();
        return view('livewire.view.tools.create-newTool', compact('toolTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validated = $request->validate([
        'toolType_id' => 'required|exists:tool_types,id',
        'name' => 'required|string|max:255',
        'img' => 'nullable|image',
        'description' => 'nullable|string',
        'state' => 'required|in:disponible,prestado',
    ]);

    // Subir imagen si existe
    if ($request->hasFile('img')) {
        $validated['img'] = $request->file('img')->store('tools', 'public');
    }

    // Crear la herramienta
    $tool = Tool::create($validated);

    // Guardar los valores de los atributos dinámicos
    foreach ($request->input('attributes', []) as $attributeId => $value) {
        AttributeValue::create([
            'tool_id' => $tool->id,
            'toolAttribute_id' => $attributeId,
            'value' => $value,
        ]);
    }

    return redirect()->route('tools.index')->with('success', 'Herramienta creada correctamente');
}


    /**
     * Display the specified resource.
     */
    public function show(Tool $tool)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tool $tool)
    {
        return view('livewire.view.tools.edit-tool', compact('tool'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tool $tool)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tool $tool)
    {
        //
    }
}
