<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnswerController extends Controller
{
    //
    public function index($id, $type)
    {
        $answers = [];
        if ($type == 1) {
            $answers = DB::table('questions as q')
                ->join('options as o', 'q.id', '=', 'o.question_id')
                ->leftJoin('answers as a', function ($join) {
                    $join->on('q.id', '=', 'a.question_id')
                        ->on('o.description', '=', 'a.description');
                })
                ->select('q.id as question_id', 'o.description as name', DB::raw('COUNT(a.id) as y'))
                ->where('q.type_id', 1)
                ->groupBy('q.id', 'o.id')
                ->having('q.id', '=', $id)
                ->get();
        } else {
            $answers = Answer::where('question_id', $id)->get();
        }
        return $answers;
    }
    public function reply(Request $request)
    {
        $data = $request->all();
        $question_option = $request->input('question_option');
        $question = $request->input('question');
        if (empty($question_option) || empty($question)) {
            return redirect()->back()->withErrors(['description' => 'Debe responder todas las preguntas']);
        }
        $answers = [
            [
                'question_id' => $data['question_ids'][0],
                'description' => $question_option,
            ],
            [
                'question_id' => $data['question_ids'][1],
                'description' => $question,
            ],
        ];
        Answer::insert($answers);
        return redirect()->back()->with('success', '¡Datos guardados correctamente!');
    }
}
