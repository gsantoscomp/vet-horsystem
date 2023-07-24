<?php
namespace App\Http\Controllers;

use Gsantoscomp\SharedVetDb\Models\Animal;
use App\Http\Requests\AnimalPostRequest;
use App\Http\Requests\AnimalPutRequest;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public function index()
    {
        $animals = Animal::all();

        foreach ($animals as $animal){
            $animal->client;
        }
        
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

    public function store(AnimalPostRequest $request)
    {
        $animal = Animal::create($request->all());

        return response()->json(['message' => 'Cliente cadastrado com sucesso', 'data' => $animal], 201);
    }

    public function update(AnimalPutRequest $request, $id)
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
