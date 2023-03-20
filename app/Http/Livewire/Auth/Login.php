<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Livewire\Component;

class Login extends Component
{
    public $username, $password;
    public $remember = false;
    protected $rules = [
        'username' => 'required',
        'password' => 'required',
    ];

    protected $messages = [
        'username.required' => 'Username wajib di isi!',
        'password.required' => 'Password wajib di isi!',
    ];

    public function render()
    {
        return view('livewire.auth.login')->layout('layouts.auth');
    }

    public function login()
    {
        $this->validate();

        $user = User::where('username', $this->username)->first();

        if (!$user) {
            $this->addError('username', 'Username tidak ditemukan!');
            return;
        }

        if (auth()->attempt(['username' => $this->username, 'password' => $this->password], $this->remember)) {
            return redirect()->route('admin.dashboard');
        }

        $this->addError('password', 'Password salah!');
    }
}
