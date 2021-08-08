@extends('layouts.main')
@section('title', 'Criar Evento')
@section('content')

<body>
    <div id="event-create-container" class="col-md-6 offset-md-3">
        <h1>Crie o seu evento</h1>
        <form action="/events" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Evento:</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Nome do evento">
            </div>
            <div class="form-group">
                <label for="title">Cidade:</label>
                <input type="text" class="form-control" id="city" name="city" placeholder="Local do evento">
            </div>
            <div class="form-group mb-1">
                <label for="title">Opção de Público:</label>
                <select name="private" id="private">
                    <option value="0">Aberto</option>
                    <option value="1">Fechado</option>
                </select>
            </div>
            <div class="form-group">
                <label for="title">Descrição:</label>
                <textarea name="description" id="description" class="form-group" placeholder="Descrição do evento"></textarea>
            </div>
            <button class="btn btn-primary">Criar evento</button>
        </form>
    </div>
</body>

@endsection