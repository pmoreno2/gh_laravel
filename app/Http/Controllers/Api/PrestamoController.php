<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Prestamo;
use Illuminate\Http\Request;

class PrestamoController extends Controller
{
    public function index()
    {
        return Prestamo::all();
    }

    public function store(Request $request)
    {
        $prestamo = Prestamo::create($request->all());
        return response()->json($prestamo, 201);
    }

    public function show($id)
    {
        return Prestamo::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $prestamo = Prestamo::findOrFail($id);
        $prestamo->update($request->all());
        return response()->json($prestamo, 200);
    }

    public function destroy($id)
    {
        Prestamo::destroy($id);
        return response()->json(null, 204);
    }
}