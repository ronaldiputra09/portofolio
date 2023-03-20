<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;

class Logout extends Component
{
    public function render()
    {
        return view('livewire.auth.logout');
    }

    public function logout()
    {
        auth()->logout();
        request()->session()->forget('remember_token');
        return redirect()->route('admin.login');
    }
}
