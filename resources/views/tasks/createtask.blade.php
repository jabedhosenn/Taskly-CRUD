@extends('layouts.app')
@section('title', 'Create Task | Taskly')
@section('add-task')
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
                        <h4 class="mb-0">📝 Create New Task</h4>
                        <a href="{{ route('tasks.index') }}" class="btn btn-light btn-sm">⬅ Back</a>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('tasks.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="title" class="form-label fw-bold">Task Title</label>
                                <input type="text" class="form-control" id="title" name="title"
                                    placeholder="Enter task title" required>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label fw-bold">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="4" placeholder="Describe your task"
                                    required></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="status" class="form-label fw-bold">Status</label>
                                <select class="form-select" id="status" name="status" required>
                                    <option value="">-- Select Status --</option>
                                    <option value="pending">Pending</option>
                                    <option value="in_progress">In Progress</option>
                                    <option value="completed">Completed</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="name" class="form-label fw-bold">Assigned To</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Enter person’s name" required>
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label fw-bold">Task Image (Optional)</label>
                                <input type="file" class="form-control" id="image" name="image" accept="image/*">
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-success btn-lg">
                                    <i class="bi bi-check-circle"></i> Create Task
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
