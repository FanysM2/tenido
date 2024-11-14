<?php

namespace App\Http\Controllers;
use PDF;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::all();
        return view('questions.index', compact('questions'));
    }

    public function create()
    {
        return view('questions.create');
    }

    public function store(Request $request)
    {
        $request->validate(['text' => 'required|string|max:255']);
        Question::create($request->all());
        return redirect()->route('questions.index');
    }

    public function edit(Question $question)
    {
        return view('questions.edit', compact('question'));
    }

    public function update(Request $request, Question $question)
    {
        $request->validate(['text' => 'required|string|max:255']);
        $question->update($request->all());
        return redirect()->route('questions.index');
    }

    public function destroy(Question $question)
    {
        $question->delete();
        return redirect()->route('questions.index');
    }

    public function answer(Request $request, Question $question)
    {
        $request->validate(['answer' => 'required|string']);

        $question->answers()->create([
            'answer' => $request->answer,
            'user_id' => auth()->id(), // Suponiendo que usas autenticación de usuarios
        ]);
        return redirect()->route('questions.index');
    }

    public function generarReporte()
    {
        $questions = Question::all(); // Obtiene todas las telas
        $data = ['questions' => $questions];
    
        $reportes = PDF::loadView('reportes.document_questions', $data);
        return $reportes->download('reporte_inventario_question.pdf');
    }
}
