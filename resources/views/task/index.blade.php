@extends('layout')

@section('content')
    @if (session('success'))
        <div class="alert alert-success mt-5" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="alert alert-primary text-center mt-5">
        Task Manager Tool
    </div>
    <div class="container mt-5">
        <a href ="{{ route('tasks.create') }}" class="btn btn-primary">Create Task</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">image</th>
                <th scope="col">Status</th>
                <th scope="col">Due Date</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($tasks as $task)
                <tr>
                    <th scope="row">{{ $task->id }}</th>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->description }}</td>
                    <td><img src="{{ asset('storage/' . $task->image) }}" alt="{{ $task->title }}" width="100"></td>
                    <td> {{ $task->is_completed == 0 ? 'Pending' : 'Completed' }}</td>
                    <td>{{ $task->due_date }}</td>
                    <td><a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary">Edit</a></td>
                    <td><a href=""
                            onclick="event.preventDefault();
                         let form = document.getElementById('delete-form');
                         form.action = '{{ url('tasks') }}/{{ $task->id }}'; form.submit();"
                            class="btn btn-danger">Delete</a></td>
                </tr>
            @endforeach

        </tbody>

    </table>
    <form id="delete-form" method="POST">
        @csrf
        @method('DELETE')
    </form>
@endsection
