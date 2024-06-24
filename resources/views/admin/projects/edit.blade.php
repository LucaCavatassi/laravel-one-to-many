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

            <form action="{{ route("admin.projects.update", ["project" => $project]) }}" method="POST">
                @method("PUT")
                @csrf
                <div class="mb-3">
                    <label for="titolo" class="form-label">Titolo</label>
                    <input type="text" class="form-control" id="titolo" aria-describedby="titolo" name="title" value="{{ old('title', $project->title) }}">

                    <label for="descrizione" class="form-label">Descrizione</label>
                    <textarea type="text-area" class="form-control" id="descrizione" aria-describedby="description" name="description">{{ old('description', $project->description) }}</textarea>    

                    <select class="fs-6 p-1" name="type_id" id="type">
                        <option disabled="disabled" selected="selected">Seleziona un linguaggio</option>
                        @foreach ($types as $type)
                            <option value="{{$type->id}}">{{ $type->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Invia</button>
                
            </form>
        </div>
@endsection