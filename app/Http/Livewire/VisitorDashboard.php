<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Session;

class VisitorDashboard extends Component
{
    public function render()
    {
        return view('livewire.visitor-dashboard', [
            'visitor_name' => Session::get('visitor_name'),
        ]);
    }

    public function logout()
    {
        Session::forget(['visitor_id', 'visitor_name', 'visitor_email']);
        return redirect()->route('visitor.login');
    }

}
