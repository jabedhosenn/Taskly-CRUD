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
                    <th>Assigned By</th>
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
                        <td>
                            @if ($task->image)
                                <img src="{{ asset('storage/' . $task->image) }}" alt="Task Image" width="100">
                            @else
                                No Image
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-sm btn-info">Edit</a>
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline"
                                onsubmit="return confirm('Are you sure you want to delete this task?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="bi bi-trash"></i> Delete
                                </button>
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
        </table>
        {{ $tasks->links('pagination::bootstrap-5') }}
    </div>
@endsection
