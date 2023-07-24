<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProcedurePostRequest;
use App\Http\Requests\ProcedurePutRequest;
use Gsantoscomp\SharedVetDb\Models\Procedure;
use Illuminate\Http\Request;

class ProcedureController extends Controller
{
    public function index()
    {
        $procedures = Procedure::all();

        return response()->json($procedures);
    }

    public function store(ProcedurePostRequest $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);

        $procedure = Procedure::create($request->all());

        return response()->json(['message' => 'Procedimento cadastrado com sucesso', 'data' => $procedure], 201);
    }

    public function show($id)
    {
        $procedure = Procedure::find($id);

        if (!$procedure) {
            return response()->json(['message' => 'Procedimento não encontrado'], 404);
        }

        return response()->json($procedure);
    }

    public function update(ProcedurePutRequest $request, $id)
    {
        $procedure = Procedure::find($id);

        if (!$procedure) {
            return response()->json(['message' => 'Registro de procedimento não encontrado'], 404);
        }

        $procedure->update($request->all());

        return response()->json(['message' => 'Registro de procedimento atualizado com sucesso', 'data' => $procedure]);
    }

    public function destroy($id)
    {
        $procedure = Procedure::find($id);

        if (!$procedure) {
            return response()->json(['message' => 'Registro de procedimento não encontrado'], 404);
        }

        $procedure->delete();

        return response()->json(['message' => 'Registro de procedimento removido com sucesso'], 200);
    }
}
