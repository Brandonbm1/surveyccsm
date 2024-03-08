<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;

class QuestionController extends Controller
{
    //
    public function index()
    {
        $questions = Question::orderBy('active', 'desc')->orderBy('id', 'desc')->get();
        return view('pages.stats', ['questions' => json_encode($questions)]);
    }
    public function create(Request $request)
    {
        $data = $request->all();
        $type = $data['type'];
        $description = $data['description'];
        $emptyOptions = true;
        if (empty($description)) {
            return redirect()->back()->withErrors(['description' => 'El campo descripcion es requerido']);
        }
        $options = $request->input('optiondescription');
        if ($type == 1) {
            foreach ($options as $option) {
                if ($option !== null) {
                    $emptyOptions = false;
                }
            }
            if ($emptyOptions) {
                return redirect()->back()->withErrors(['options' => 'Debe haber alguna opción para la pregunta de selección múltiple']);
            }
        }

        $this->setActiveOff($type);
        $question = Question::create([
            'type_id' => $type,
            'description' => $description,
        ]);
        if ($type == 1) {
            foreach ($options as $option) {
                if ($option != null)
                    $question->options()->create([
                        'description' => $option,
                    ]);
            }
        }

        // print_r($question->id);
        return redirect()->back()->with('success', '¡Datos guardados correctamente!');
    }
    // Función para desactivar las preguntas de un tipo (tipo 1: opción múltiple, tipo 2: abierta)
    private function setActiveOff($type_id)
    {
        $questions = Question::where('type_id', $type_id)->get();
        foreach ($questions as $question) {
            $question->active = false;
            $question->save();
        }
    }
    public function getActiveQuestions()
    {
        $questions = Question::where('active', true)->orderBy('type_id', 'asc')->get();

        foreach ($questions as $question) {
            if ($question->type_id == 1) {
                $question->options = $question->options()->pluck('description');
            }
        }

        return view('pages.questions', ['questions' => json_encode($questions)]);
    }
}
