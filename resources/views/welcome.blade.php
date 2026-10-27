@extends("layout.main")

@section("TESTE", "Wanandumbo")

@section("content")

<div id="search-container" class="col-md-12">
    <h1 id="bus">Busque um Evento</h1>

    <form action="/" method="GET">
        <input type="text" name="search" id="search" class=" form-control" placeholder="Procurar evento... "">
        
     </form>

</div>
      
    

  <div id=" events-container" class="col-md-12">
        @if($search)
        <h2>Buscando por: {{ $search }}</h2>
        @else
        <h2>Proximos Eventos</h2>
        @endif
<div class="N-evento">
            <p>Veja os Eventos dos proximos dias</p>
</div>
</div>

<div id="cards-container" class="row">

    @foreach($events as $event)

    <div class="col-12 col-sm-6 col-lg-3">
        <div class="card">

            <img src="IMG/events/{{ $event->image }}"
                alt="Imagem do evento"
                class="img">

            <div class="card-body">
                <p class="card-date">{{ date("d/m/Y", strtotime($event->date)) }}</p>

                <h5 class="card-title">
                    {{ $event->title }}
                </h5>

                <p class="card-participantes">
                   {{ count($event->users)}}
                </p>

                <a href="/events/{{ $event->id }}" class="btn btn-primary">
                    Saber mais
                </a>
            </div>

        </div>
    </div>

    @endforeach

    @if(count($events) ==0 && $search)
    <div class="N-evento">
        <p>Não é possivel encontrar nenhum evento com<span style="color: black; font-weight: bolder;"> "{{ $search }}! "</span> <a href="/" 
        style="
        display: inline-block;
        background-color: #6d3ce967;
        color: black;
        padding: 10px 18px;
        text-decoration: none;
        border-radius: 5px;
        font-size: 14px;
        transition: 0.3s;">Ver todos!</a></p>
    </div>
    @elseif(count($events) ==0)
    <div class="N-evento">
        <p>Não á eventos disponiveis no momento</p>
    </div>
    @endif

</div>
@endsection