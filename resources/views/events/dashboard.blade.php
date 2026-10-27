@extends('layout.main')

@section('TESTE', 'Wanandumbo')

@section('content')

{{-- Mensagem de sucesso ou aviso --}}
@if(session('msg'))
<div class="alert alert-info col-md-10 offset-md-1">
    {{ session('msg') }}
</div>
@endif

{{-- Eventos criados pelo utilizador --}}
<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Meus Eventos</h1>
</div>

<div class="col-md-10 offset-md-1 dashboard-events-container">

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Participantes</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>

        <tbody>
            @forelse($events as $event)
            <tr>
                <th scope="row">
                    {{ $loop->iteration }}
                </th>

                <td>
                    <a href="/events/{{ $event->id }}">
                        {{ $event->title }}
                    </a>
                </td>

                <td>
                    {{ $event->users()->count() }}
                </td>

                <td>
                    <div class="d-flex gap-2 flex-wrap">

                        <a
                            href="/events/{{ $event->id }}"
                            class="btn btn-primary btn-sm">
                            Ver
                        </a>

                        <a
                            href="/events/edit/{{ $event->id }}"
                            class="btn btn-warning btn-sm">
                            Editar
                        </a>

                        <form
                            action="/events/{{ $event->id }}"
                            method="POST"
                            onsubmit="return confirm('Tens a certeza de que queres eliminar este evento?');">
                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="btn btn-danger btn-sm">
                                <ion-icon name="trash-outline"></ion-icon>
                                Eliminar
                            </button>
                        </form>

                    </div>
                </td>
            </tr>

            @empty
            <tr>
                <td colspan="4" class="text-center">
                    Ainda não tens eventos criados.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="dashboard-create-button">
        <a href="/events/create" class="btn btn-primary">
            Criar evento
        </a>
    </div>

</div>

{{-- Eventos em que o utilizador participa --}}
<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Eventos em que participo</h1>
</div>

<div class="col-md-10 offset-md-1 dashboard-events-container">
    @if(isset($eventasparticipant) && $eventasparticipant->isNotEmpty())

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Participantes</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>

        <tbody>
            @foreach($eventasparticipant as $event)
            <tr>
                <td scropt="row">{{$loop->index +1}}</td>
                <td><a href="/events/{{$event->id }}">{{$event->title }}</a></td>
                <td>{{count($event->users) }}</td>
                <td>
                    <a href="#">Sair do evento</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @else

    <div class="N_evento">
        <p>
            Ainda não estás a participar em nenhum evento!
        </p>
    </div>

    @endif

</div>

@endsection