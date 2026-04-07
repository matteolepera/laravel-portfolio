@extends("layouts.projects_layout")
@section("win-title", "Progetto")

@section("main-content")
    <div>
        <a class="btn btn-warning" href={{ route("projects.edit", $project) }}>Modifica</a>
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDestroyProject">
            Elimina
        </button>
    </div>
    <h1>{{ $project->name }}<span class="badge rounded-pill text-bg-info">{{ $project->type->name }}</span></h1>
    <h4>Cliente:</h4>
    <p>{{ $project->client }}</p>
    <div>
        <p>
            Data di inizio: {{ $project->start_date }} - Data di fine: {{ $project->end_date }}
        </p>
    </div>

    <h4>Descrizione:</h4>
    <p>
        {{ $project->summary }}
    </p>
    <a class="btn btn-primary" href={{ route("projects.index") }}>Torna indietro</a>


    <!-- Modal -->
    <div class="modal fade" id="modalDestroyProject" tabindex="-1" aria-labelledby="modalDestroyProjectLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalDestroyProjectLabel">Conferma eliminazione progetto</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Sei sicuro di voler eliminare il progetto?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                    <form action={{ route("projects.destroy", $project) }} method="POST">
                        @csrf
                        @method("DELETE")
                        <input class="btn btn-danger" type="submit" value="Conferma eliminazione">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection