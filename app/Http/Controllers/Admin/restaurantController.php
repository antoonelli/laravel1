<?php

namespace App\Http\Controllers\Admin;

use App\Restaurant;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class restaurantController extends Controller
{
    public function index()
    {
        $restaurant = Restaurant::all();
        return view('admin.restaurants.index', compact('restaurant'));
    }
    public function new()
    {
        return view('admin.restaurants.store');
    }
    public function store(Request $request)
    {
        Restaurant::create($request->all());

        echo 'restautante criado com sucesso';
    }
    public function edit(Restaurant $restaurant)
    {
        return view('admin.restaurants.edit', compact('restaurant'));
    }
    public function update(Request $request, $id)
    {
        if ($dado = Restaurant::find($id)) {
            $dado->update($request->all());
            return 'dados alterados';
        }
        return 'erro 500300';
    }
    public function delete($id)
    {
        if ($dado = Restaurant::find($id)) {
            $dado->delete();
            return 'deletado com sucesso';
        }
        return 'nao foi possivel deletar o restaurant';
    }
}
