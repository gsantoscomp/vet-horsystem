<?php
namespace App\Http\Controllers;

use Gsantoscomp\SharedVetDb\Models\Animal;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public function index()
    {
        $animals = Animal::all();
        return response()->json($animals);
    }

    public function show($id)
    {
        $animal = Animal::find($id);

        if (!$animal) {
            return response()->json(['message' => 'Animal não encontrado'], 404);
        }
        
        return response()->json($animal);
    }

    public function store(Request $request)
    {
        $animal = Animal::create($request->all());

        return response()->json(['message' => 'Cliente cadastrado com sucesso', 'data' => $animal], 201);
    }

    public function update(Request $request, $id)
    {
        $animal = Animal::find($id);
        
        if (!$animal) {
            return response()->json(['message' => 'Registro de animal não encontrado'], 404);
        }
        
        $animal->update($request->all());
        
        return response()->json(['message' => 'Registro de cliente atualizado com sucesso', 'data' => $animal]);
    }

    public function destroy($id)
    {
        $animal = Animal::find($id);
    
        if (!$animal) {
            return response()->json(['message' => 'Registro de animal não encontrado'], 404);
        }
    
        $animal->delete();
    
        return response()->json(['message' => 'Registro de animal removido com sucesso'], 200);
    }
    
}
