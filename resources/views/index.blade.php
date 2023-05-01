@extends('app')

@section('content')
<title>Index</title>
    <div class="container-fluid border p-4 mt-4 bg-dark text-white">
        <form action="{{ route('tareas-create')}}" method="POST">
            @csrf
            @if (session('success'))
                <h6 class="alert alert-success">{{ session('success') }}</h6>
            @endif
            @error('title')
                <h6 class="alert alert-danger">{{ $message }}</h6>
            @enderror
            <div class="mb-3">
                <label for="title" class="form-label">TITULO DE TAREA</label>
                <input type="text" name="title" class="form-control">
                <label for="estado" class="form-label">Completada?</label>
                <input type="checkbox" name="estado" class="switch-input" value="1"
                    {{ old('estado') ? 'checked="checked"' : '0' }}>
            </div>
            <button type="submit" class="btn btn-primary">CREAR TAREA</button>
        </form>
    </div>
<div class="container-fluid text-center text-black">LISTA DE TAREAS</div>
    <div>
        @foreach ($tareas as $tarea)
            <div class="row py-1 text-white border border-black">
                <div class="col-md-9 d-flex align-items-center ps-5">
                    <a href="{{ route('Tareas-Show', ['id' => $tarea->id]) }}"> {{ $tarea->title }}</a>
                </div>

                <div class="col-md-3 d-flex justify-content-center">
                    <form action="{{ route('Tareas-destroy', [$tarea->id]) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </div>
            </div>

    </div>
    @endforeach
@endsection
