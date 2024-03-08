<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Option;
class OptionsController extends Controller
{
    //
    public function index($id)
    {
        $options = Option::where('question_id', $id)->get();
        return $options;
    }
}
