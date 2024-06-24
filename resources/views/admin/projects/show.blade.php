@extends ("layouts.admin")

@section ("content")
    <div class="container">
        <div class="div mt-3 d-flex justify-content-between align-items-center">
            <h2 class="m-0 fw-bold text-primary">Titolo Progetto</h2>
            <a class="text-decoration-underline" href="{{ route("admin.projects.index")}}">Torna alla lista</a>
        </div>
        <h1>{{ $project->title }}</h1>
        <hr>
        <h2 class="fw-bold text-primary mt-3">Descrizione Progetto</h2>
        <p class="fs-2">{{ $project->description }}</p>
        <hr>
        <h4 class="fw-bold text-primary mt-3">Slug ID</h4>
        <p>{{ $project->slug }}</p>
    </div>
@endsection
