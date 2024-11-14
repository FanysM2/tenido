<?php

namespace App\Http\Controllers;
use PDF;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function index()
    {
        $files = File::all();
        return view('files.index', compact('files'));
    }

    public function create()
    {
        return view('files.create');
    }

    public function store(Request $request)
    {
        $request->validate(['file' => 'required|file']);
        
        $path = $request->file('file')->store('uploads');
        
        File::create([
            'name' => $request->file('file')->getClientOriginalName(),
            'path' => $path,
        ]);

        return redirect()->route('files.index');
    }

    public function edit(File $file)
    {
        return view('files.edit', compact('file'));
    }

    public function update(Request $request, File $file)
    {
        $request->validate(['file' => 'nullable|file']);

        if ($request->hasFile('file')) {
            Storage::delete($file->path);
            $path = $request->file('file')->store('uploads');
            $file->update(['name' => $request->file('file')->getClientOriginalName(), 'path' => $path]);
        }

        return redirect()->route('files.index');
    }

    public function destroy(File $file)
    {
        Storage::delete($file->path);
        $file->delete();
        return redirect()->route('files.index');
    }

    public function toggle(Request $request, File $file)
    {
        if ($file->is_taken) {
            // Liberar el archivo
            $file->is_taken = false;
            $file->taken_by = null;
        } else {
            // Tomar el archivo
            $file->is_taken = true;
            $file->taken_by = $request->input('taken_by'); // Guardar el nombre del usuario
        }
        $file->save();

        return redirect()->route('files.index');
    }

    public function generarReporte()
    {
        $files = File::all(); // Obtiene todas las telas
        $data = ['files' => $files];
    
        $reportes = PDF::loadView('reportes.document_files', $data);
        return $reportes->download('reporte_inventario_file.pdf');
    }
}
