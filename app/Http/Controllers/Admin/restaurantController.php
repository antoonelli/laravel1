<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\RestaurantRequest;
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
    public function store(RestaurantRequest $request)
    {
        Restaurant::create($request->all());

        flash('Restaurate criado com sucesso')->success();
        return redirect()->route('restaurants.index');
    }
    public function edit(Restaurant $restaurant)
    {
        return view('admin.restaurants.edit', compact('restaurant'));
    }
    public function update(RestaurantRequest $request, $id)
    {
        if ($dado = Restaurant::find($id)) {
            $dado->update($request->all());
            flash('Dados alterados com sucesso')->success();
            return redirect()->route('restaurants.index');
        }
        return 'erro 500300';
    }
    public function delete($id)
    {
        if ($dado = Restaurant::find($id)) {
            $dado->delete();
            flash('Restaurant apagado com sucesso')->success();
            return redirect()->route('restaurants.index');
        }
        return 'nao foi possivel deletar o restaurant';
    }
}
