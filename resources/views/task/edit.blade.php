@extends('layout')

@section('content')
    <div class="alert alert-primary mt-5">
        Edit Task
    </div>
    @if (isset($task) && $task)
        <form class="mt-5" method="POST" action="{{ route('tasks.update', $task->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $task->title }}">
                @error('title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description">{{ $task->description }}</textarea>
                @error('description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-group mb-3">
                <input type="file" class="form-control" id="image" name="image" value="{{ $task->image }}">
                {{-- <label class="input-group-text" for="inputGroupFile02">Upload</label> --}}
                @error('image')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-group mb-3">
                <select class="form-select" aria-label="Default select example" name="is_completed"
                    value="{{ old('is_completed') }}">
                    <option selected>Status</option>
                    <option value="0" {{ $task->is_completed == 0 ? 'selected' : '' }}>Pending</option>
                    <option value="1" {{ $task->is_completed == 1 ? 'selected' : '' }}>Completed</option>

                </select>
                @error('is_completed')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="due_date" class="form-label">Due Date</label>
                <input type="date" class="form-control" id="due_date" name="due_date" value="{{ $task->due_date }}">
                @error('due_date')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('tasks.index') }}" class="btn btn-danger">Cancel</a>
            </div>

        </form>
    @endif
@endsection
