@extends('layouts.app')

@section('home-content')
    <div class="text-center">
        <h2 class="mb-3 text-primary fw-bold">Taskly</h2>
        <p>-- by Jabed Hosen</p>
        <p class="lead mb-4">
            Manage your daily activities efficiently with <strong>Taskly</strong> —
            your personal productivity companion. Stay organized, track your progress,
            and achieve more every day!
        </p>
        <p class="lead mb-4">
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iste, a? Ullam assumenda dicta at, fugiat, vel eaque
            quod dignissimos ipsam consectetur ab unde architecto voluptatibus? Quia quas nulla amet. Nisi, unde temporibus
            maxime libero praesentium blanditiis facere debitis iusto quam itaque distinctio, vel saepe cupiditate odit
            cumque dolorem quibusdam consequuntur autem earum perferendis a, fugiat dolores laboriosam. Ducimus assumenda
            necessitatibus, consectetur commodi ullam suscipit tempora id eligendi quaerat magni velit itaque dolores ipsa?
            Voluptatibus quisquam, exercitationem, omnis nisi assumenda sed obcaecati iste sapiente, neque quos veritatis
            iusto distinctio quia suscipit reiciendis.
        </p>
    </div>

    <!-- Feature Highlights Section -->
    <div class="row text-center g-4">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm p-4">
                <div class="card-body">
                    <h5 class="card-title text-success fw-bold">✅ Create & Manage Tasks</h5>
                    <p class="card-text">
                        Easily add, edit, and delete your tasks to keep your to-do list up to date.
                        Stay in control of your priorities with a clean interface.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm p-4">
                <div class="card-body">
                    <h5 class="card-title text-info fw-bold">📅 Set Deadlines</h5>
                    <p class="card-text">
                        Assign deadlines to tasks and never miss an important date.
                        Taskly helps you stay punctual and efficient.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm p-4">
                <div class="card-body">
                    <h5 class="card-title text-warning fw-bold">📊 Track Progress</h5>
                    <p class="card-text">
                        Visualize your progress and accomplishments over time.
                        Motivation comes easy when you can see how far you’ve come!
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Motivation Quote -->
    <div class="mt-5 text-center">
        <blockquote class="blockquote">
            <p class="mb-0 fst-italic">"Great things are done by a series of small tasks." – Vincent van Gogh</p>
        </blockquote>
    </div>
@endsection
