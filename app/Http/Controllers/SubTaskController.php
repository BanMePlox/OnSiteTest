<?php

namespace App\Http\Controllers;

use App\Models\SubTask;
use App\Models\Tareas;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;

class SubTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required'
        ]);

        $subtask = new SubTask;
        $subtask->title = $request->title;
        $subtask->task_id = $request->task_id;
        $subtask->save();

        return redirect()->route('Tareas-Show', ['id' => $request->task_id])->with('success', "Subtarea creada con éxito!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id, $taskId)
    {
        $subtask = Subtask::find($id);
        $subtask->delete();
    
        if ($subtask) {
            return redirect()->route('Tareas-Show', ['id' => $taskId])->with('success', 'Subtarea eliminada');
        } else {
            return redirect()->route('Tareas-Show', $taskId)->with('error', 'No se pudo encontrar la subtarea');
        }
    }
    
}
