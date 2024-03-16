<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Login extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $name = $data['name'];
        $role = $data['role'];

        if (empty($name)) {
            return redirect()->back()->withErrors(['message' => 'Name is required']);
        }

        $user = User::where('name', $name)
            ->where('role', $role)
            ->first();

        if (!$user) {
            $user = User::create([
                'name' => $name,
                'role' => $role,
            ]);
        }
        Auth::login($user);
        return redirect()->intended();
    }

    /**
     * Display the specified resource.
     */
    public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
