@extends("layouts.projects_layout")
@section("win-title", "Modifica il progetto")
@section("main-content")
    <h1>Modifica il progetto</h1>
    <form class="row g-2" action={{ route("projects.update", $project) }} method="POST">
        @csrf
        @method("PUT")

        <div class="mb-3">
            <label for="name" class="form-label">Nome progetto</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="sito web..."
                value="{{ $project->name }}">
        </div>
        <div class="mb-3 col-6">
            <label for="client" class="form-label">Cliente</label>
            <input type="text" class="form-control" name="client" id="client" placeholder="Mario Rossi"
                value="{{ $project->client }}">
        </div>
        <div class="mb-3 col-3">
            <label for="start_date" class="form-label">Data di inizio</label>
            <input type="date" class="form-control" name="start_date" id="start_date" value="{{ $project->start_date }}">
        </div>
        <div class="mb-3 col-3">
            <label for="end_date" class="form-label">Data di fine</label>
            <input type="date" class="form-control" name="end_date" id="end_date" value="{{ $project->end_date }}">
        </div>
        <div class="mb-3 col-12">
            <label for="summary" class="form-label">Descrizione</label>
            <textarea class="form-control" name="summary" id="summary">"{{ $project->summary }}"
                                    </textarea>
        </div>
        <div class="text-center">
            <input class="btn btn-success col-3 text-center" type="submit" value="Salva">
            <a class="btn btn-warning col-3 text-center" href={{ route("projects.show", $project) }}> Torna indietro</a>
        </div>
    </form>

@endsection