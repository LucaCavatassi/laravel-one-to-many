@extends('layouts.admin') 

@section('content')
        <div class="container">
            <h1 class="mt-2">Modifica Progetto</h1>
            <div class="d-flex justify-content-between">
                <p>Modifica il form per aggiornare un progetto della tua lista.</p>
                <a href="{{ route("admin.projects.index") }}" class="text-danger">Annulla</a>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="errors-style">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                
            @endif

            <form action="{{ route("admin.projects.update", ["project" => $project->slug]) }}" method="POST">
                @method("PUT")
                @csrf
                <div class="mb-3">
                    <label for="titolo" class="form-label">Titolo</label>
                    <input type="text" class="form-control" id="titolo" aria-describedby="titolo" name="title" value="{{ $project->title }}">

                    <label for="descrizione" class="form-label">Descrizione</label>
                    <textarea type="text-area" class="form-control" id="descrizione" aria-describedby="description" name="description">{{ $project->description }}</textarea>    
                </div>
                <button type="submit" class="btn btn-primary">Invia</button>
                
            </form>
        </div>
@endsection