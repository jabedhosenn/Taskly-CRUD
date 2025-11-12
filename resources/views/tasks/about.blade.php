@extends('layouts.app')
@section('about-content')
<div class="content text-center my-5">
    <h2 class="text-primary fw-bold mb-3">About Taskly</h2>
    <p class="lead mb-4">
        <strong class="text-primary">Taskly</strong> is a simple and intuitive task management application
        built with <span class="text-danger">Laravel</span>, <span class="text-danger">Blade</span>, <span class="text-danger">MySQL</span> database. It helps you stay organized,
        prioritize your daily activities, and complete your goals efficiently.
    </p>

    <div class="row justify-content-center mt-4">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm p-4">
                <h5 class="text-success mb-3">🚀 Version 1.0.0</h5>
                <p class="mb-3">
                    Taskly introduces a clean design and easy-to-use task features,
                    perfect for personal productivity and small teams.
                </p>
                <p>
                    Developed with ❤️ by
                    <strong>
                        <a href="https://jabedhosen.netlify.app" target="_blank" class="text-decoration-none">
                            Jabed Hosen
                        </a>
                    </strong>
                </p>
            </div>
        </div>
    </div>
</div>

@endsection
