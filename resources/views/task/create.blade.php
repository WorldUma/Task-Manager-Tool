@extends('layout')

@section('content')
    <div class="alert alert-primary mt-5">
        Add Task
    </div>
    <form class="mt-10" method="POST" action="{{ route('tasks.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" value="{{ old('description') }}"></textarea>
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="input-group mb-3">
            <input type="file" class="form-control" id="image" name="image" value="{{ old('image') }}">
            {{-- <label class="input-group-text" for="inputGroupFile02">Upload</label> --}}
            @error('image')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="input-group mb-3">
            <select class="form-select" aria-label="Default select example" name="is_completed"
                value="{{ old('is_completed') }}">
                <option selected>Status</option>
                <option value="0">Pending</option>
                <option value="1">Completed</option>

            </select>
            @error('is_completed')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="due_date" class="form-label">Due Date</label>
            <input type="date" class="form-control" id="due_date" name="due_date" value="{{ old('due_date') }}">
            @error('due_date')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </form>
@endsection
