@extends('layouts.main')
@section('title', 'Event News')
@section('content')
<body>
    <div id="search-container" class="col-md-12">
        <h1>Busque um evento</h1>
        <form action="">
            <input type="text" id="search" name="search" class="form-control" placeholder="Procurar...">
        </form>
    </div>
    <div id="events-container" class="col-md-12">
        <h2>Próximos Eventos</h2>
        <p class="subtitle">Veja os eventos dos próximos dias!</p>
        <div id="cards-container" class="row">
            @foreach($events as $event)
                <div class="card col-md-4">
                    <img src="../img/events/{{ $event->image }}" alt="{{ $event->title }}">
                    <div class="card-body">
                        <p class="card-date">{{ date('d/m/Y', strtotime($event->date))}}</p>
                        <h5 class="card-title">{{ $event->title }}</h5>
                        <p class="card-participants">X Participantes</p>
                        <a href="/events/{{ $event->id }}" class="btn btn-primary">Saber mais</a>
                    </div>
                </div>
            @endforeach
            @if(count($events) == 0)
                <p class="none">Nenhum evento disponível!</p>
            @endif
        </div>
    </div>
</body>
@endsection