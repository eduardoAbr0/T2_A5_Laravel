<?php

namespace App\Http\Controllers;
use App\Models\Alumno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AlumnoController extends Controller
{
    //---Altas
    public function create(){
        return view('insertar');
    }

    public function store(Request $request){
        //--Validacion

        Alumno::create($request -> post());
        Session::flash('message', "Agregado correctamente");
        return redirect()->route('alumnos.index')->with('exito','Agregado correctamente');
    }

    //---Bajas
    public function destroy(Alumno $alumno){
        $alumno->delete();
        Session::flash('message', "Eliminado correctamente");
        return redirect()->route('alumnos.index');
    }

    //---Cambios
    public function edit(int $Num_Control){
        $alumno = Alumno::find($Num_Control); 
        return view('editar', compact('alumno'));
    }   

    public function update(Request $request,int $id){
        $alumno = Alumno::find($id);

        $alumno->Num_Control = $request->input('Num_Control');
        $alumno->Nombre = $request->input('Nombre');
        $alumno->Primer_Ap = $request->input('Primer_Ap');
        $alumno->Segundo_Ap = $request->input('Segundo_Ap');
        $alumno->Fecha_Nac = $request->input('Fecha_Nac');
        $alumno->Semestre = $request->input('Semestre');
        $alumno->Carrera = $request->input('Carrera');
        
        $alumno->save();
        
        Session::flash('message',"Alumno modificado correctamente");
        return redirect()->route('alumnos.index');
    }

    //----Consultas
    public function index(Request $request){
        /*$filtro = $request->input('filtro');
    
    
        $alumnos = Alumno::where('Nombre','like', '%{$filtro}%')
            ->orWhere('Primer_Ap', 'like', '%{$filtro}%')
            ->orderBy('id', 'desc')->paginate(5);*/

        $alumnos = Alumno::latest()->get();
        //return view('index', compact('alumnos','filtro'));
        return view('index', compact('alumnos'));
    }

    //---Detalle
    public function show(int $id){
        $alumno = Alumno::find($id);
        return view('detalle', compact('alumno'));
    }
}
