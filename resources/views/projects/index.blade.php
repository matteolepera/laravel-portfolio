@extends("layouts.projects_layout")
@section("win-title", "Progetti")

@section("main-content")
    <h1>I miei progetti</h1>
    <a class="btn btn-primary" href={{ route("projects.create") }}>Aggiungi un progetto</a>
    <table class="table my-4">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Tipo progetto</th>
                <th scope="col">Cliente</th>
                <th scope="col">Data inizio</th>
                <th scope="col">Data fine</th>
                <th scope="col">Descrizione</th>
                <th scope="col">Dettagli</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr>
                    <td>{{ $project->name }}</td>
                    <td>{{ $project->type->name }}</td>
                    <td>{{ $project->client }}</td>
                    <td>{{ $project->start_date }}</td>
                    <td>{{ $project->end_date }}</td>
                    <td>{{ $project->summary }}</td>
                    <td><a href={{ route("projects.show", $project->id)}}>Dettagli progetto</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection