<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Drink;
use App\Models\Ingredient;
use App\Models\Technique;
use Illuminate\Http\Request;

class DrinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drinks = Drink::all();
        $ingredients = Ingredient::all();
        return view('admin.drinks.index', compact('drinks', 'ingredients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $techniques = Technique::all();
        $ingredients = Ingredient::all();

        return view('admin.drinks.create', compact('techniques', 'ingredients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            'name' => ['required', 'unique:drinks', 'max:250'],
            'technique' => ['required', 'max:250'],
            'ingredients.*.id' => ['exists:ingredients,id', 'nullable'],
            'ingredients.*.quantity' => ['nullable'],
        ]);
        $drink = Drink::create($data);
        // $drink->ingredients()->attach($request->ingredients);
        foreach ($data['ingredients'] as $ingredient) {
            if (isset($ingredient['id']) && $ingredient['quantity']) {
                $drink->ingredients()->attach(
                    [
                        $ingredient['id'] => [
                            'quantity' => $ingredient['quantity']
                        ]
                    ]
                );
            }
        }
        return redirect()->route('admin.drinks.index')->with('message', "$drink->name è stato creato con successo");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Drink $drink)
    {
        return view('admin.drinks.show', compact('drink'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
