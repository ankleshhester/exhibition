<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Visitor;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class VisitorLogin extends Component
{
    public $name, $email;

    protected $rules = [
        'name'  => 'required|string|max:255',
        'email' => 'required|email|max:255',
    ];

    public function login()
    {
        Log::info('Visitor login function executed');
        abort(500, 'Login function executed');

        // Log::info('Livewire login function reached');
        // $this->validate();

        // // Store visitor info in session
        // $visitor = Visitor::firstOrCreate(['email' => $this->email], ['name' => $this->name]);

        // Session::put('visitor_id', $visitor->id);
        // Session::put('visitor_name', $visitor->name);
        // Session::put('visitor_email', $visitor->email);

        // Log::info('Session Data:', Session::all());

        
        // return redirect()->route('visitor.dashboard');
    }

    public function render()
    {
        return view('livewire.visitor-login');
    }
}
