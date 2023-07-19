<?php

namespace App\Http\Controllers;

use Gsantoscomp\SharedVetDb\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();

        return response()->json($permissions);
    }

    public function store(Request $request)
    {
        $request->validate([
            'module' => 'required',
            'page' => 'required',
            'user_type_id' => 'required',
        ]);

        $permission = Permission::create($request->all());

        return response()->json(['message' => 'Permissão cadastrada com sucesso', 'data' => $permission], 201);
    }

    public function show($id)
    {
        $permission = Permission::find($id);

        if (!$permission) {
            return response()->json(['message' => 'Permissão não encontrada'], 404);
        }

        return response()->json($permission);
    }

    public function update(Request $request, $id)
    {
        $permission = Permission::find($id);

        if (!$permission) {
            return response()->json(['message' => 'Registro de permissão não encontrado'], 404);
        }

        $permission->update($request->all());

        return response()->json(['message' => 'Registro de permissão atualizado com sucesso', 'data' => $permission]);
    }

    public function destroy($id)
    {
        $permission = Permission::find($id);

        if (!$permission) {
            return response()->json(['message' => 'Registro de permissão não encontrado'], 404);
        }

        $permission->delete();

        return response()->json(['message' => 'Registro de permissão removido com sucesso'], 200);
    }
}
