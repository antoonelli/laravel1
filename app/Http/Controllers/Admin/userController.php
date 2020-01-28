<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserRequest;
use App\User;
use App\Http\Controllers\Controller;

class userController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('admin.users.index', compact('user'));
    }
    public function new()
    {
        return view('admin.users.store');
    }
    public function store(UserRequest $request)
    {
        $userData  = $request->all();
        $userData['password'] = bcrypt($userData['password']);
        User::create($userData);
        flash('User criado com sucesso')->success();
        return redirect()->route('user.index');
    }
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }
    public function update(UserRequest $request, $id)
    {
        $userData = $request->all();
        if ($userData['password']) {
            $userData['password'] = bcrypt($userData['password']);
        }
        if ($dado = User::find($id)) {
            $dado->update($userData);
            flash('Dados do usuario alterado com sucesso')->success();
            return redirect()->route('user.index');
        }
        return 'erro 500300';
    }
    public function delete($id)
    {
        if ($dado = User::find($id)) {
            $dado->delete();
            flash('User deletado com sucesso')->success();
            return redirect()->route('user.index');
        }
        return 'nao foi possivel deletar o User';
    }
}
