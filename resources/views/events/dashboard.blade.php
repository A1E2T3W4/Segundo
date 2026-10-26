
@extends("layout.main")

@section("TESTE", "Wanandumbo")

@section("content")

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

                    <td>0</td>

                    <td>
                        <div class="d-flex gap-2">

                            {{-- Ver evento --}}
                            <a href="/events/{{ $event->id }}"
                               class="btn btn-primary btn-sm">
                                Ver
                            </a>

                            {{-- Editar evento --}}
                            <a href="/events/edit/{{ $event->id }}"
                               class="btn btn-warning btn-sm">
                                Editar
                            </a>

                            {{-- Eliminar evento --}}
                            <form action="/events/{{ $event->id }}"
                                  method="POST"
                                  onsubmit="return confirm('Tens a certeza de que queres eliminar este evento?');">

                                @csrf
                                @method("DELETE")

                                <button type="submit"
                                        class="btn btn-danger btn-sm">
                                    <ion-icon name="trash-outline"></ion-icon>
                                    Deletar
                                </button>

                            </form>

                        </div>
                    </td>
                </tr>

            @empty

                <tr>
                    <td colspan="4" class="text-center">
                        Você ainda não tem eventos.
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

@endsection
