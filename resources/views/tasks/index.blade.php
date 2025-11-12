@extends('layouts.app')

@section('tasks-content')
    <div class="d-flex justify-content-between">
        <h2>Your Tasks</h2>
        <div>
            <a href="{{ route('tasks.createtask') }}" class="btn btn-primary">Create New Task</a>
        </div>
    </div>

    <div>
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                    <tr>
                        <td>{{ $task->id }}</td>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->description }}</td>
                        <td>{{ $task->status }}</td>
                        <td>{{ $task->name }}</td>
                        <td>IMAGE</td>
                        <td>ACTIONS</td>
                        <td>
                            <a href="" class="btn btn-sm btn-info">Edit</a>
                            <form action="" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                {{-- @foreach ($tasks as $task)
            <tr>
                <td>{{ $task->id }}</td>
                <td>{{ $task->title }}</td>
                <td>{{ $task->description }}</td>
                <td>{{ $task->status }}</td>
                <td>{{ $task->name }}</td>
                <td>
                    @if ($task->image)
                        <img src="{{ asset('storage/' . $task->image) }}" alt="Task Image" width="100">
                    @else
                        No Image
                    @endif
                </td>
                <td>
                    <a href="" class="btn btn-sm btn-info">Edit</a>
                    <form action="" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach --}}

            </tbody>
    </div>
@endsection
{{-- {{ route('tasks.create') }} --}}
{{-- @foreach ($tasks as $task)
            <tr>
                <td>{{ $task->id }}</td>
                <td>{{ $task->title }}</td>
                <td>{{ $task->description }}</td>
                <td>
                    <a href="" class="btn btn-sm btn-info">Edit</a>
                    <form action="" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach --}}
