@extends('app')

@section('content')

<div class="container">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Log Name</th>
            <th scope="col">Description</th>
            <th scope="col">Subject ID</th>
            <th scope="col">Subject Type</th>
            <th scope="col">Causer ID</th>
            <th scope="col">Causer Type</th>
            <th scope="col">Created At</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($activityLog as $log)
            <tr>
                <th scope="row">{{ $log->id }}</th>
                <td>{{ $log->log_name }}</td>
                <td>{{ $log->description }}</td>
                <td>{{ $log->subject_id }}</td>
                <td>{{ $log->subject_type }}</td>
                <td>{{ $log->causer_id }}</td>
                <td>{{ $log->causer_type }}</td>
                <td>{{ $log->created_at }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection