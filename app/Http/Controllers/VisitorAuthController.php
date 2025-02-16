<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitor;
use Illuminate\Support\Facades\Session;

class VisitorAuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        // Store visitor info in database and session
        $visitor = Visitor::firstOrCreate(['email' => $request->email], ['name' => $request->name]);

        Session::put('visitor_id', $visitor->id);
        Session::put('visitor_name', $visitor->name);
        Session::put('visitor_email', $visitor->email);

        // dd(Session::all());

        return redirect()->route('visitor.dashboard');
    }
}
