<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserTypePostRequest;
use App\Http\Requests\UserTypePutRequest;
use Gsantoscomp\SharedVetDb\Models\UserType;
use Illuminate\Http\Request;

class UserTypeController extends Controller
{
    public function index()
    {
        $userTypes = UserType::all();

        return response()->json($userTypes);
    }

    public function store(UserTypePostRequest $request)
    {
        $userType = UserType::create($request->all());

        return response()->json(['message' => 'Tipo de usuário cadastrado com sucesso', 'data' => $userType], 201);
    }

    public function show($id)
    {
        $userType = UserType::find($id);

        if (!$userType) {
            return response()->json(['message' => 'Tipo de usuário não encontrado'], 404);
        }

        return response()->json($userType);
    }

    public function update(UserTypePutRequest $request, $id)
    {
        $userType = UserType::find($id);

        if (!$userType) {
            return response()->json(['message' => 'Registro de tipo de usuário não encontrado'], 404);
        }

        $userType->update($request->all());

        return response()->json(['message' => 'Registro de tipo de usuário atualizado com sucesso', 'data' => $userType]);
    }

    public function destroy($id)
    {
        $userType = UserType::find($id);

        if (!$userType) {
            return response()->json(['message' => 'Registro de tipo de usuário não encontrado'], 404);
        }

        $userType->delete();

        return response()->json(['message' => 'Registro de tipo de usuário removido com sucesso'], 200);
    }
}
