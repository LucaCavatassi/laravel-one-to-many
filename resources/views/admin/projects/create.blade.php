@extends('layouts.admin') 

@section('content')
        <div class="container">
            <h1 class="mt-2">Aggiungi Progetto</h1>
            <div class="d-flex justify-content-between">
                <p>Compila il form per aggiungere un nuovo progetto alla tua lista.</p>
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

            <form action="{{ route("admin.projects.store") }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="titolo" class="form-label">Titolo</label>
                    <input type="text" class="form-control" id="titolo" aria-describedby="emailHelp" name="title" value="{{ old("title") }}">

                    <label for="descrizione" class="form-label">Descrizione</label>
                    <textarea type="text-area" class="form-control" id="descrizione" aria-describedby="emailHelp" name="description" value="{{ old("description") }}"></textarea>    
                </div>
                <button type="submit" class="btn btn-primary">Aggiungi</button>
            </form>
        </div>
@endsection