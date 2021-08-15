@extends('layouts.main')
@section('title', 'Dashboard')
@section('content')
<body>
    <div class="col-md-10 offset-md-1 dashboard-title-container">
        <h1>Meus Eventos</h1>
    </div>
    <div class="col-md-10 offset-md-1 dashboard-events-container">
        @if(count($events ?? '') > 0)
            <table class="table text-center">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Participantes</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($events as $event)
                        <tr>
                            <td scope="row">{{ $loop->index + 1 }}</td>
                            <td scope="row"><a href="/events/{{ $event->id }}">{{ $event->title }}</a></td>
                            <td scope="row">{{ count($event->users)}}</td>
                            <td scope="row">
                                <a href="/events/edit/{{ $event->id }}" class="btn btn-success edit-btn rounded-full"><ion-icon name="create-outline"></ion-icon> Editar</a>
                                <form action="/events/{{ $event->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger delete-btn rounded-full"><ion-icon name="trash-outline"></ion-icon> Deletar</button>
                                </form>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="none">Você ainda não tem eventos -> <a href="/events/create">Criar evento</a> </p>
        @endif
    </div>
    <div class="col-md-10 offset-md-1 dashboard-title-container">
        <h1>Minhas Inscrições</h1>
    </div>
    <div class="col-md-10 offset-md-1 dashboard-events-container">
        @if(count($eventsAsParticipant) > 0):
            <table class="table text-center">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Participantes</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($eventsAsParticipant as $event)
                        <tr>
                            <td scope="row">{{ $loop->index + 1 }}</td>
                            <td scope="row"><a href="/events/{{ $event->id }}">{{ $event->title }}</a></td>
                            <td scope="row">{{ count($event->users)}}</td>
                            <td>
                                <form action="/events/leave/{{ $event->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger delete-btn rounded-full"><ion-icon name="trash-outline"></ion-icon> Sair do evento</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="none">Você não está participando de nenhum evento! <a href="/">Ver eventos</a></p>
        @endif
    </div>
</body>
@endsection