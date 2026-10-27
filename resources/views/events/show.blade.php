@extends("layout.main")

@section("TESTE", "Wanandumbo")

@section("content")

<div class="col-md-10 offset-md-1">
    <div class="row">
        <div id="imagem-container" class="col-me-6">
            <img src="/img/events/{{ $event->image }}" class="image-fluid" alt="{{ $event->image }}">
        </div>
        <div id="info-container" class="col-md-6">
            <div class="display">
                <div title>
                    <h4>{{ $event->title }}</h4>
                    <p class="event-city"><ion-icon name="location-outline"></ion-icon>{{ $event->city }}</p>
                    <p class="events-participantes"><ion-icon name="people-outline"></ion-icon>{{ count($event->users)}}</p>
                    <p class="event-owner"><ion-icon name="star-outline"></ion-icon>{{ $eventOwner ["name"]}}</p>
                </div>
                <div class="item">
                    <h5>O evento conta com:</h5>
                    <ul id="items-list">
                        @foreach($event->items as $items)
                        <li><ion-icon class="play-outline"></ion-icon><span>{{ $items }}</span></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div>
                <form action="/events/join/{{ $event->id }}" method="POST">
                    @csrf
                    <a href="/events/join/{{ $event->id }}"
                        class="btn btn-primary"
                        id="event-submit"
                        onclick="event.preventDefault();
                        this.closest('form').submit();">
                        Confirmar Presença
                    </a>
                </form>
            </div>

            <div>
            </div>
        </div>
        <div class="col-md-12" id="description-container">
            <h3>Sobre o Evento</h3>
            <p class="event-description">{{ $event->description }}</p>
        </div>
    </div>
</div>

@endsection