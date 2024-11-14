<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MarcaController extends Controller
{
    public function index()
    {
        $marcas = Marca::all();
        $esAdmin = auth()->user()->role === 'admin'; // Verificar si el usuario es admin
        return view('marcas.index', compact('marcas', 'esAdmin'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'imagen' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $rutaImagen = $request->file('imagen')->store('marcas', 'public');

        Marca::create([
            'titulo' => $request->titulo,
            'ruta_imagen' => $rutaImagen,
        ]);

        return redirect()->route('marcas.index')->with('success', 'Marca agregada con éxito.');
    }

    public function edit($id)
    {
        $marca = Marca::findOrFail($id);
        return view('marcas.edit', compact('marca'));
    }
    public function update(Request $request, $id)
    {
        $marca = Marca::findOrFail($id);
        $marca->titulo = $request->titulo;
    
        // Verifica si se ha subido una nueva imagen
        if ($request->hasFile('imagen')) {
            // Aquí debes manejar la lógica para almacenar la nueva imagen
            // Por ejemplo:
            $ruta = $request->file('imagen')->store('images', 'public');
            $marca->ruta_imagen = $ruta;
        }
    
        $marca->save();
        return redirect()->route('marcas.index')->with('success', 'Marca actualizada con éxito.');
    }

}