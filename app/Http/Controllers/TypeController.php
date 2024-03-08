<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Type;

class TypeController extends Controller
{
    //
    public function index()
    {
        $types = Type::all();
        return $types;
    }
}
