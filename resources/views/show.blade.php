@extends('app')

@section('content')
<title>{{$tareas->title}}</title>
    <div class="container-fluid border p-4 mt-4 bg-dark">
        <form action="{{ route('Tareas-update', ['id' => $tareas->id]) }}" method="POST">
            @method ('PATCH')
            @csrf

            @if (session('success'))
                <h6 class="alert alert-success">{{ session('success') }}</h6>
            @endif

            @error('title')
                <h6 class="alert alert-danger">{{ $message }}</h6>
            @enderror
            <div class="mb-3">
                <label for="title" class="form-label">TITULO</label>
                <input type="text" name="title" class="form-control" value="{{ $tareas->title }}">
            </div>
            @if ($tareas->estado == '1')
                <p>Estado actual: Tarea completada</p>
            @else
                <p>Estado actual: Tarea pendiente</p>
            @endif
            <label for="title" class="form-label">Nuevo estado</label>
            <input type="checkbox" name="estado" class="switch-input" value="1"
                {{ old('estado') ? 'checked="checked"' : '0' }}>

            <button type="submit" class="btn btn-primary">ACTUALIZAR TAREA</button>
        </form>
    </div>

    <div class="bg-dark row">

        <div class="col-md-6">
            <div class="col-xs-6">
                <p class="text-center">LISTA DE SUBTAREAS</p>
                @foreach ($subtareas as $subtask)
                    @if ($subtask->task_id == $tareas->id)
                        <p class="list-group-item bg-warning text-black text-center">·{{ $subtask->title }}

                        <form action="{{ route('BorrarSubtarea', [$subtask->id, $subtask->task_id]) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <input type="hidden" name="task_id" value="{{ $subtask->task_id }}">
                            <button class="btn btn-danger btn-sm text-center">Eliminar</button>
                        </form>
                        </p>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="col-md-6">
            <form action="{{ route('CrearSubtarea') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">TITULO</label>
                    <input type="text" name="title" class="form-control">
                    <input type="hidden" name="task_id" value="{{ $tareas->id }}">
                </div>
                <button type="submit" class="btn btn-primary">CREAR SUBTAREA</button>
            </form>
        </div>

    </div>
@endsection
