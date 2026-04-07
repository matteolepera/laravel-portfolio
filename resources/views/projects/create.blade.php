@extends("layouts.projects_layout")
@section("win-title", "Aggiungi un progetto")
@section("main-content")
    <h1>Aggiungi un nuovo progetto</h1>
    <form class="row g-2" action={{ route("projects.store") }} method="POST">
        @csrf

        <div class="mb-3 col-6">
            <label for="name" class="form-label">Nome progetto</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="sito web...">
        </div>
        <div class="mb-4 col-6">
            <label class="form-label" for="type_id">Tipo</label>
            <select class="form-select" name="type_id" id="type_id">
                <option selected>Seleziona il tipo</option>
                @foreach ($types as $type)
                    <option value="{{ $type->id }}">{{$type->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3 col-6">
            <label for="client" class="form-label">Cliente</label>
            <input type="text" class="form-control" name="client" id="client" placeholder="Mario Rossi">
        </div>
        <div class="mb-3 col-3">
            <label for="start_date" class="form-label">Data di inizio</label>
            <input type="date" class="form-control" name="start_date" id="start_date">
        </div>
        <div class="mb-3 col-3">
            <label for="end_date" class="form-label">Data di fine</label>
            <input type="date" class="form-control" name="end_date" id="end_date">
        </div>
        <div class="mb-3 col-12">
            <label for="summary" class="form-label">Descrizione</label>
            <textarea class="form-control" name="summary" id="summary"></textarea>
        </div>
        <div class="text-center">
            <input class="btn btn-success col-3 text-center" name="" type="submit" value="Salva">
        </div>
    </form>
@endsection