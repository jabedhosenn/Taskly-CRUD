@extends('layouts.app')

@section('edit-task')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="card shadow-sm border-0 rounded-3">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">📝 Edit Task</h4>
                        <a href="{{ route('tasks.index') }}" class="btn btn-light btn-sm">⬅ Back</a>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('tasks.update', $task->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{-- @method('PUT') --}}
                            <div class="mb-3">
                                <label for="title" class="form-label fw-bold">Task Title</label>
                                <input type="text" class="form-control" id="title" name="title"
                                    value="{{ $task->title }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label fw-bold">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="4" required>{{ $task->description }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="status" class="form-label fw-bold">Status</label>
                                <select class="form-select" id="status" name="status" required>
                                    <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>Pending
                                    </option>
                                    <option value="in_progress" {{ $task->status == 'in_progress' ? 'selected' : '' }}>In
                                        Progress</option>
                                    <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>Completed
                                    </option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="name" class="form-label fw-bold">Assigned To</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ $task->name }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label fw-bold">Task Image</label>
                                <input type="file" class="form-control" id="image" name="image">
                                @if ($task->image)
                                    <img src="{{ asset('storage/' . $task->image) }}" alt="Task Image" width="100"
                                        class="mt-2">
                                @endif
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-success btn-lg">
                                    <i class="bi bi-check-circle"></i> Update Task
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
