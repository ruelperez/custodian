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
}
