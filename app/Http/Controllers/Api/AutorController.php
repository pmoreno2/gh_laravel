<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Autor;
use Illuminate\Http\Request;

class AutorController extends Controller
{
    public function index()
    {
        return Autor::all();
    }

    public function store(Request $request)
    {
        $autor = Autor::create($request->all());
        return response()->json($autor, 201);
    }

    public function show($id)
    {
        return Autor::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $autor = Autor::findOrFail($id);
        $autor->update($request->all());
        return response()->json($autor, 200);
    }

    public function destroy($id)
    {
        Autor::destroy($id);
        return response()->json(null, 204);
    }
}