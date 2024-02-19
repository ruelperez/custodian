<?php

namespace App\Http\Livewire;

use App\Models\IsRegistration;
use App\Models\User;
use Livewire\Component;

class Login extends Component
{
    public $eye = 0,$gt=0, $is_reg = 1, $role = 1,$password_confirmation, $password, $username;

    public function render()
    {
        $data = IsRegistration::all();
        foreach ($data as $datas){
            $this->is_reg = $datas->on_off;
        }
        return view('livewire.login');
    }

    public function clickEye($id){
        $this->eye = $id;
    }

    public function reg(){
        $this->gt = 1;
        $this->username = "";
        $this->password = "";
    }

    public function submit_reg(){
        $validated = $this->validate([
            'username' => 'required|unique:users,username',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
            'role' => 'required',
        ]);

        $validated['password'] = bcrypt($validated['password']);
        $user = User::create($validated);
        auth()->login($user);
        return redirect('/Dashboard/custodian');
    }

    public function log(){
        $this->gt = 0;
        $this->username = "";
        $this->password = "";
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
