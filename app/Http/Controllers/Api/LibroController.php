<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Libro;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    public function index()
    {
        return Libro::all();
    }

    public function store(Request $request)
    {
        $libro = Libro::create($request->all());
        return response()->json($libro, 201);
    }

    public function show($id)
    {
        return Libro::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $libro = Libro::findOrFail($id);
        $libro->update($request->all());
        return response()->json($libro, 200);
    }

    public function destroy($id)
    {
        Libro::destroy($id);
        return response()->json(null, 204);
    }
}