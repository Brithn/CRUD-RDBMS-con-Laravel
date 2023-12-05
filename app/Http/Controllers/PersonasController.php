<?php

namespace App\Http\Controllers;

use App\Models\Personas;
use Illuminate\Http\Request;

class PersonasController extends Controller
{

    public function index()
    {
        //Página de inicio
        $datos=Personas::orderBy('apellido','desc')->paginate(3);
        return view('inicio',compact('datos'));

    }

    public function create()
    {
        //Formulario donde se agregan los datos
        return view('agregar');
    }

    public function store(Request $request)
    {
        // Sirve para guardar los datos en la BD

        $persona = new Personas();
        $persona->nombre=$request->post('nombre');
        $persona->apellido=$request->post('apellido');
        $persona->fecha_nacimiento=$request->post('fecha_nacimiento');
        $persona->save();

        return redirect()->route('personas.index')->with('success','Registro Guardado Correctamente!');

    }

    public function show($id)
    {
        //Sirve para obtener un registro de la tabla
        $personas = Personas::find($id);
        return view('eliminar',compact('personas'));
    }

    public function edit($id)
    {
        /*Este método sirve para traer los datos que se van a editar
         y los coloca en un formulario*/
         $personas = Personas::find($id);
         return view('actualizar',compact('personas'));
    }

    public function update(Request $request, $id)
    {
        //Este método actualiza los datos en la BD
        $personas = Personas::find($id);
        $personas->nombre=$request->post('nombre');
        $personas->apellido=$request->post('apellido');
        $personas->fecha_nacimiento=$request->post('fecha_nacimiento');
        $personas->update();

        return redirect()->route('personas.index')->with('success','Actualizado con éxito!');
    }
    public function destroy($id)
    {
        //Elimina un registro
        $personas = Personas::find($id);
        $personas->delete();
        return redirect()->route('personas.index')->with('success','Se ha eliminado correctamente el registro!');

    }
}
