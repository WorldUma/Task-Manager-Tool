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
                    <td>
                        <button type="button" class="btn btn-info btn-md show-task" data-id="{{ $task->id }}"
                            data-toggle="modal" data-target="#myModal">
                            Show
                        </button>
                    </td>

                </tr>
            @endforeach

        </tbody>

    </table>
    <form id="delete-form" method="POST">
        @csrf
        @method('DELETE')
    </form>
    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title">Task Details</h4>
                </div>

                <div class="modal-body">
                    <p><strong>Title:</strong> <span id="task-title"></span></p>
                    <p><strong>Description:</strong> <span id="task-description"></span></p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            $(document).ready(function() {
                $('.show-task').on('click', function() {
                    var taskId = $(this).data('id');

                    $.ajax({
                        url: '/tasks/' + taskId,
                        method: 'GET',
                        success: function(task) {
                            //console.log(task)
                            $('#task-title').text(task.title);
                            $('#task-description').text(task.description);
                        },
                        error: function() {
                            alert('Could not fetch task details.');
                        }
                    });
                });
            });
        </script>
    @endpush
@endsection
