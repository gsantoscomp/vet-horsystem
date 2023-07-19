<?php

namespace App\Http\Controllers;

use Gsantoscomp\SharedVetDb\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();

        return response()->json($clients);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone_number' => 'required',
            'email' => 'required|email',
            'cpf' => 'required',
            'address' => 'required',
        ]);
    
        $client = Client::create($request->all());
    
        return response()->json(['message' => 'Cliente cadastrado com sucesso', 'data' => $client], 201);
    }
    

    public function show($id)
    {
        $client = Client::find($id);

        if (!$client) {
            return response()->json(['message' => 'Cliente não encontrado'], 404);
        }
        
        return response()->json($client);
    }

    public function update(Request $request, $id)
    {
        $client = Client::find($id);
        
        if (!$client) {
            return response()->json(['message' => 'Registro de animal não encontrado'], 404);
        }
        
        $client->update($request->all());
        
        return response()->json(['message' => 'Registro de cliente atualizado com sucesso', 'data' => $client]);
    }
    
    

    public function destroy($id)
    {
        $client = Client::find($id);
    
        if (!$client) {
            return response()->json(['message' => 'Registro de cliente não encontrado'], 404);
        }
    
        $client->delete();
    
        return response()->json(['message' => 'Registro de cliente removido com sucesso'], 200);
    }
}