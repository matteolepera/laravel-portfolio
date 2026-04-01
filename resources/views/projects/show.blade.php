@extends("layouts.projects_layout")
@section("win-title", "Progetto")

@section("main-content")
    <h1>{{ $project->name }}</h1>
    <h3>{{ $project->client }}</h3>
    <div>
        <p>
            Data di inizio: {{ $project->start_date }} - Data di fine: {{ $project->end_date }}
        </p>
    </div>

    <h4>Descrizione:</h4>
    <p>
        {{ $project->summary }}
    </p>
    <a class="btn btn-primary" href={{ route("projects.index") }}>Torna alla home</a>
@endsection