<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Register - Don Bide')]
class RegisterPage extends Component
{
    public $name;
    public $email;
    public $password;

    public function save()
    {
        $this->validate([
            'name' => 'required|max: 255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',

        ]);

        // guardar en la base de datos
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password)

        ]);
        auth()->login($user);
        //  redireccionar a home page
        return redirect()->intended();
    }

    public function render()
    {
        return view('livewire.auth.register-page');
    }
}
