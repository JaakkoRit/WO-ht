<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        $users = User::all();
        return view('admin.index', compact('users'));
    }

    public function edit(User $user) {
        return view('admin.edit', compact('user'));
    }

    public function update(Request $request) {

        $user = User::find(request('id'));
        $role = $user->roles()->get()->first()->name;

        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
        ]);

        if (request('role') != $role) {
            $user->changeRole($role);
        }

        $user->update($request->all());
        return redirect()->route('update');
    }

    public function delete(User $user)
    {
        User::destroy($user->id);
        $message = 'User deleted succesfully!';

        return redirect('admin')->with('status', $message);
    }
}
