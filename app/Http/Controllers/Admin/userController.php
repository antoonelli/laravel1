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

        echo 'User criado com sucesso';
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
            return 'dados alterados';
        }
        return 'erro 500300';
    }
    public function delete($id)
    {
        if ($dado = User::find($id)) {
            $dado->delete();
            return 'deletado com sucesso';
        }
        return 'nao foi possivel deletar o User';
    }
}
