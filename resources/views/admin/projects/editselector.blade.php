@extends ("layouts.admin")

@section('content')
<div class="container">
    <h1 class="mt-2">Seleziona il progetto che vuoi modificare</h1>
    <ul class="list-group">
        <div class="list-group ms-list">
            @foreach ($projects as $project)
                <span data-bs-toggle="modal" data-bs-target="#{{ $project->id }}">
                    <a class="list-group-item list-group-item-action mb-2 py-3" aria-current="true">{{$project->title }}</a>
                </span> 
                <!-- Modale Eliminazione -->
                <div class="modal fade" id="{{ $project->id }}" tabindex="-1" aria-labelledby="editModal" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            {{-- HEADEAR --}}
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Conferma modifica</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            {{-- BODY --}}
                            <div class="modal-body">
                                <span>Vuoi davvero modificare <strong><i>{{ $project->title }}</i></strong> ?</span>
                            </div>
                            {{-- FOOTER --}}
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Chiudi</button>
                                <a href="{{ route ("admin.projects.edit", ["project" => $project->slug])}}" class="btn btn-primary">Modifica</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </ul>



</div>
@endsection
