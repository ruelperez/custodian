<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Login extends Component
{
    public $eye = 0, $password, $username;

    public function render()
    {

        return view('livewire.login');
    }

    public function clickEye($id){
       $this->eye = $id;
    }

    public function submit(){
        $validated = $this->validate([
            "username" => 'required',
            "password" => 'required'
        ]);

        if(auth()->attempt($validated)){
            session()->regenerate();

            return redirect('/Dashboard/custodian');
        }
        session()->flash('loginFailed','Wrong Password/Username');
    }
}
