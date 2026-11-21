<?php

namespace App\Http\Controllers;

use App\Dominio\Persona;
use App\Dominio\aprendiz as AprendizDominio;
use App\Models\aprendiz as AprendizModelo;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    public function mostrar()
    {
        $persona = new Persona('carlos');
        $aprendiz = new AprendizDominio('ana', 'adso');

        $personas = [$persona, $aprendiz];

        return view('persona', ['persona' => $personas]);
    }

    public function presentar(Request $request)
    {
        $datos = $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'programa' => ['required', 'string', 'max:150'],
        ], [
            'nombre.required' => 'El nombre es obligatorio',
            'programa.required' => 'El programa es obligatorio',
            'programa.string' => 'El programa debe ser una cadena de texto',
            'programa.max' => 'El programa no debe superar los 150 caracteres',
        ]);

        AprendizModelo::create($datos);

        $aprendiz = new AprendizDominio(
            $datos['nombre'],
            $datos['programa']
        );

        return view('persona', [
            'persona' => [$aprendiz],
        ]);
    }

    public function listar()
    {
        $aprendices = AprendizModelo::orderByDesc('id')->get();

        return view('aprendices.index', ['aprendices' => $aprendices]);
    }

    public function editar($id)
    {
        $aprendiz = AprendizModelo::findOrFail($id);

        return view('aprendices.editar', ['aprendiz' => $aprendiz]);
    }

    public function actualizar(Request $request, $id)
    {
        $datos = $request->validate([
            'nombre' => ['required', 'string', 'max:100'],
            'programa' => ['required', 'string', 'max:150'],
        ], [
            'nombre.required' => 'Debes ingresar el nombre del aprendiz.',
            'nombre.string' => 'El nombre debe ser un texto.',
            'nombre.max' => 'El nombre no puede superar los 100 caracteres.',
            'programa.required' => 'Debes ingresar el programa de formación.',
            'programa.string' => 'El programa debe ser un texto.',
            'programa.max' => 'El programa no puede superar los 150 caracteres.',
        ]);

        $aprendiz = AprendizModelo::findOrFail($id);
        $aprendiz->update($datos);

        return redirect('/aprendices');
    }
}
