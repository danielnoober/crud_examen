<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use function PHPUnit\Framework\returnArgument;

class CategoriaController extends Controller
{
    public function principal()
    {
        return view('CategoriaViews.lista_cat');
    }
    public function lista_categorias()
    {
        $categorias = Categoria::select('id','nombre')
            ->orderBy('id', 'asc')
            ->get();
        return view('CategoriaViews.lista_cat', compact('categorias'));
    }
    public function registrar_cat()
    {
        return view('CategoriaViews.registrar_cat');
    }
    public function guardar_cat(Request $request)
    {
        $request->validate([
            'nombre' => [
                'required',
                'string',
                'max:45',
                'regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/u'
            ],
        ], [
            'nombre.required' => 'Por favor, ingrese el nombre de la categoría.',
            'nombre.string' => 'El nombre debe ser una cadena de texto.',
            'nombre.max' => 'El nombre no debe exceder los 45 caracteres.',
            'nombre.regex' => 'El nombre solo puede contener letras y espacios.',
        ]);
      

        $categoria = new Categoria();
        $categoria->nombre = $request->input('nombre');
        $categoria->save();

        return redirect()->route('lista_categoria');
    }
    public function mostrar_cat($id)
    {
        $categoria = Categoria::findOrFail($id);
        return view('CategoriaViews.editar_cat', compact('categoria'));
    }
    public function actualizar_cat(Request $request, $id)
    {
        $request->validate([
            'nombre' => [
                'required',
                'string',
                'max:45',
                'regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/u'
            ],
        ], [
            'nombre.required' => 'Por favor, ingrese el nombre de la categoría.',
            'nombre.string' => 'El nombre debe ser una cadena de texto.',
            'nombre.max' => 'El nombre no debe exceder los 45 caracteres.',
            'nombre.regex' => 'El nombre solo puede contener letras y espacios.',
        ]);

        $categoria = Categoria::findOrFail($id);
        $categoria->nombre = $request->input('nombre');
        $categoria->save();

        return redirect()->route('lista_categoria');
    }
    public function eliminar_cat($id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();
        return redirect()->route('lista_categoria');
    }

}
