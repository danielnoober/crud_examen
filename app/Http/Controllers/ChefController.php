<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chef;

class ChefController extends Controller
{
    public function principal()
    {
        return view('ChefViews.lista_chefs');
    }
    public function lista_chefs()
    {
        $chefs= Chef::select('id', 'nombres', 'apellidos', 'fecha_nacimiento', 'matricula')
            ->orderBy('id', 'asc')
            ->get();
        return view('ChefViews.lista_chefs', compact('chefs'));
        
    }
    public function registrar_chef()
    {
        return view('ChefViews.registrar_chef');
    }
    public function guardar_chef(Request $request)
    {
        $request->validate([
            'nombres' => [
                'required',
                'string',
                'max:45',
                'regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/u'
            ],
            'apellidos' => [
                'required',
                'string',
                'max:45',
                'regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/u'
            ],
            'fecha_nacimiento' => 'required|date',
            'matricula' => [
                'required',
                'string',
                'max:10',
                'unique:chefs,matricula'
            ],
        ], [
            'nombres.required' => 'El campo nombres es obligatorio.',
            'nombres.string' => 'El campo nombres debe ser una cadena de texto.',
            'nombres.max' => 'El campo nombres no debe exceder 45 caracteres.',
            'nombres.regex' => 'El campo nombres solo puede contener letras y espacios.',
            'apellidos.required' => 'El campo apellidos es obligatorio.',
            'apellidos.string' => 'El campo apellidos debe ser una cadena de texto.',
            'apellidos.max' => 'El campo apellidos no debe exceder 45 caracteres.',
            'apellidos.regex' => 'El campo apellidos solo puede contener letras y espacios.',
            'fecha_nacimiento.required' => 'El campo fecha de nacimiento es obligatorio.',
            'fecha_nacimiento.date' => 'El campo fecha de nacimiento debe ser una fecha válida.',
            'matricula.required' => 'El campo matrícula es obligatorio.',
            'matricula.string' => 'El campo matrícula debe ser una cadena de texto.',
            'matricula.max' => 'El campo matrícula no debe exceder 10 caracteres.',
            'matricula.unique' => 'La matrícula ya está registrada.',
        ]);

        $chef = new Chef();
        $chef->nombres = ucwords($request->input('nombres'));
        $chef->apellidos = ucwords($request->input('apellidos'));
        $chef->fecha_nacimiento = $request->input('fecha_nacimiento');
        $chef->matricula = strtoupper($request->input('matricula'));
        $chef->foto = null;
        $chef->save();

        return redirect()->route('lista_chefs');
    }
    public function editar_chef($id)
    {
        $chef = Chef::findOrFail($id);
        return view('ChefViews.editar_chef', compact('chef'));
    }
    public function actualizar_chef(Request $request, $id)
    {
        $request->validate([
            'nombres' => [
                'required',
                'string',
                'max:45',
                'regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/u'
            ],
            'apellidos' => [
                'required',
                'string',
                'max:45',
                'regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/u'
            ],
            'fecha_nacimiento' => 'required|date',
            'matricula' => [
                'required',
                'string',
                'max:10',
                'unique:chefs,matricula,' . $id
            ],
        ], [
            // Custom validation messages
        ]);

        $chef = Chef::findOrFail($id);
        $chef->nombres = ucwords($request->input('nombres'));
        $chef->apellidos = ucwords($request->input('apellidos'));
        $chef->fecha_nacimiento = $request->input('fecha_nacimiento');
        $chef->matricula = strtoupper($request->input('matricula'));
        $chef->save();

        return redirect()->route('lista_chefs');
    }
    public function eliminar_chef($id)
    {
        $chef = Chef::findOrFail($id);
        $chef->delete();
        return redirect()->route('lista_chefs');
    }
}
