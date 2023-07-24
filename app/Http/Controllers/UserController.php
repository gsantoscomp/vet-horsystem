<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserPostRequest;
use App\Http\Requests\UserPutRequest;
use Gsantoscomp\SharedVetDb\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        foreach ($users as $user){
            $user->userType;
        }

        return response()->json($users);
    }

    public function store(UserPostRequest $request)
    {
        $user = User::create($request->all());

        return response()->json(['message' => 'Usuário cadastrado com sucesso', 'data' => $user], 201);
    }

    public function show($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'Usuário não encontrado'], 404);
        }

        return response()->json($user);
    }

    public function update(UserPutRequest $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'Registro de usuário não encontrado'], 404);
        }

        $requestData = $request->all();
        $requestData['password'] = bcrypt($requestData['password']);

        $user->update($requestData);

        return response()->json(['message' => 'Registro de usuário atualizado com sucesso', 'data' => $user]);
    }

    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'Registro de usuário não encontrado'], 404);
        }

        $user->delete();

        return response()->json(['message' => 'Registro de usuário removido com sucesso'], 200);
    }
}
