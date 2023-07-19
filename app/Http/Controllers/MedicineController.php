<?php

namespace App\Http\Controllers;

use Gsantoscomp\SharedVetDb\Models\Medicine;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    public function index()
    {
        $medicines = Medicine::all();

        return response()->json($medicines);
    }

    public function store(MedicinePostRequest $request)
    {
        $request->validate([
            'name' => 'required',
            'quantity' => 'required',
            'purchase_price' => 'required',
            'sale_price' => 'required',
            'description' => 'required',
        ]);

        $medicine = Medicine::create($request->all());

        return response()->json(['message' => 'Medicamento cadastrado com sucesso', 'data' => $medicine], 201);
    }

    public function show($id)
    {
        $medicine = Medicine::find($id);

        if (!$medicine) {
            return response()->json(['message' => 'Medicamento não encontrado'], 404);
        }

        return response()->json($medicine);
    }

    public function update(MedicinePutRequest $request, $id)
    {
        $medicine = Medicine::find($id);

        if (!$medicine) {
            return response()->json(['message' => 'Registro de medicamento não encontrado'], 404);
        }

        $medicine->update($request->all());

        return response()->json(['message' => 'Registro de medicamento atualizado com sucesso', 'data' => $medicine]);
    }

    public function destroy($id)
    {
        $medicine = Medicine::find($id);

        if (!$medicine) {
            return response()->json(['message' => 'Registro de medicamento não encontrado'], 404);
        }

        $medicine->delete();

        return response()->json(['message' => 'Registro de medicamento removido com sucesso'], 200);
    }
}
