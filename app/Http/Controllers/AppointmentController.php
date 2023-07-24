<?php

namespace App\Http\Controllers;
use App\Http\Requests\AppointmentPostRequest;
use App\Http\Requests\AppointmentPutRequest;
use Gsantoscomp\SharedVetDb\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::all();

        foreach ($appointments as $appointment){
            $appointment->client;
            $appointment->animal;
        }

        return response()->json($appointments);
    }

    public function store(AppointmentPostRequest $request)
    {

        $appointment = Appointment::create($request->all());

        return response()->json(['message' => 'Consulta cadastrada com sucesso', 'data' => $appointment], 201);
    }

    public function show($id)
    {
        $appointment = Appointment::find($id);

        if (!$appointment) {
            return response()->json(['message' => 'Consulta não encontrada'], 404);
        }

        return response()->json($appointment);
    }

    public function update(AppointmentPutRequest $request, $id)
    {
        $appointment = Appointment::find($id);

        if (!$appointment) {
            return response()->json(['message' => 'Registro de consulta não encontrado'], 404);
        }

        $appointment->update($request->all());

        return response()->json(['message' => 'Registro de consulta atualizado com sucesso', 'data' => $appointment]);
    }

    public function destroy($id)
    {
        $appointment = Appointment::find($id);

        if (!$appointment) {
            return response()->json(['message' => 'Registro de consulta não encontrado'], 404);
        }

        $appointment->delete();

        return response()->json(['message' => 'Registro de consulta removido com sucesso'], 200);
    }
}
