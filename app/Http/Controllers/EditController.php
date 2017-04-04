<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class EditController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('delete');
    }

    public function edit() {
        return view('edit.edit');
    }

    public function update() {
        $user = auth()->user();

        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
        ]);

        $user->update([
            'name' => \request('name'),
            'email' => \request('email')
        ]);

        if (\request('password') !== null) {
            $user->update([
                'password' => bcrypt(\request('password'))
            ]);
        }

        return redirect('home');
    }

    public function delete(User $user)
    {
        User::destroy($user->id);

        $message = 'User deleted succesfully!';
        return redirect('home')->with('status', $message);
    }
}
