<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
    

class AdminLoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.login');
        // return "halaman admin";
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required',
            'pwd' => 'required'
        ]);
        
        $email = $data['email'];
        $password = $data['pwd'];
        $role = Auth::hasUser();
        // dd($role);
        $valid = Auth::attempt([
            'email' => $email,
            'password' => $password,
            'role' => 'admin'
        ]);
        if($valid) {
            $request->session()->regenerate();

            return redirect()->route('admin.dashboard');
        }

        return back();
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect('/');
    }
}
