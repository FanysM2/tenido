<?php

namespace App\Http\Controllers;
use PDF;
use App\Models\Tela;
use Illuminate\Http\Request;

class TelaController extends Controller
{
    public function index()
    {
        $telas = Tela::all();

        $labels = $telas->pluck('nombre'); // Nombres de las telas
        $cantidades = $telas->pluck('cantidad'); // Cantidades de las telas
    
       
        return view('telas.index', compact('telas', 'cantidades'));
    }

    public function create()
    {
        return view('telas.create');
    }

    public function store(Request $request)
    {
        $request->validate(['nombre' => 'required', 'cantidad' => 'required|integer']);
        Tela::create($request->all());
        return redirect()->route('telas.index');
    }

    public function dashboard()
    {
        $telas = Tela::all();
        $labels = $telas->pluck('nombre');
        $cantidades = $telas->pluck('cantidad');

        return view('telas.dashboard', compact('labels', 'cantidades'));
    }

    public function generarReporte()
{
    $telas = Tela::all(); // Obtiene todas las telas
    $data = ['telas' => $telas];

    $reportes = PDF::loadView('reportes.document_telas', $data);
    return $reportes->download('reporte_inventario_tela.pdf');
}

public function edit($id)
    {
        $tela = Tela::findOrFail($id);  // Busca la tela por su ID
        return view('telas.edit', compact('tela'));  // Pasa la tela a la vista
    }

    // Método para actualizar la tela en la base de datos
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'cantidad' => 'required|numeric|min:0',
        ]);

        $tela = Tela::findOrFail($id);  // Busca la tela por su ID
        $tela->update($request->all());  // Actualiza los campos de la tela con los datos del formulario

        return redirect()->route('telas.index')->with('success', 'Tela actualizada correctamente.');
    }

    public function destroy($id)
    {
        $tela = Tela::findOrFail($id);  // Buscar la tela por su ID

        $tela->delete();  // Eliminar la tela

        return redirect()->route('telas.index')->with('success', 'Tela eliminada correctamente.');
    }
}
