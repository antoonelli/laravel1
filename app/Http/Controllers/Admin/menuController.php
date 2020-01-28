<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\MenuRequest;
use App\Menu;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class menuController extends Controller
{
    public function index()
    {
        $menu = Menu::all();
        return view('admin.menus.index', compact('menu'));
    }
    public function new()
    {
        return view('admin.menus.store');
    }
    public function store(MenuRequest $request)
    {
        Menu::create($request->all());

        flash('Restaurate criado com sucesso')->success();
        return redirect()->route('menus.index');
    }
    public function edit(Menu $menu)
    {
        return view('admin.menus.edit', compact('menu'));
    }
    public function update(MenuRequest $request, $id)
    {
        if ($dado = Menu::find($id)) {
            $dado->update($request->all());
            flash('Dados alterados com sucesso')->success();
            return redirect()->route('menus.index');
        }
        return 'erro 500300';
    }
    public function delete($id)
    {
        if ($dado = Menu::find($id)) {
            $dado->delete();
            flash('menu apagado com sucesso')->success();
            return redirect()->route('menus.index');
        }
        return 'nao foi possivel deletar o menu';
    }
}
