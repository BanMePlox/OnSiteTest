<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tareas;
use App\Models\SubTask;

class TareasController extends Controller
{
    //Index: Mostrará todas las tareas
    //Store: Creará una tarea
    //Update: Actualizará una tarea
    //Destroy: Eliminará una tarea

    public function store(Request $request) {
        
        $request->validate([
            'title' => 'required|min:4'
        ]);

        $tarea = new Tareas;
        $tarea->title = $request->title;
        $tarea->estado = $request->estado;
        $tarea->save();

        return redirect()->route('TareasIndex')->with('success', "Tarea creada con éxito!");
    }
    public function index() {
        $Tareas = Tareas::all();
        return view('index', ['tareas' => $Tareas]);
    }

    public function show($id){
        $tareas = Tareas::find($id);
        $subtareas = SubTask::where('task_id', $id)->get();
        return view('show', compact('tareas', 'subtareas'));
    }

    public function update(Request $request, $id){
        $Tareas = Tareas::find($id);
        $Tareas->title = $request->title;
        $Tareas->estado = $request->estado;
        $Tareas->save();
        return redirect()->route('TareasIndex')->with('success', "Tarea actualizada con éxito!");
    }

    public function destroy($id){
        $Tareas = Tareas::find($id);
        $Tareas->delete();
        return redirect()->route('TareasIndex')->with('success', "Tarea eliminada con éxito!");
    }

}
