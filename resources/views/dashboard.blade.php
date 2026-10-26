@extends("layout.main")

@section("TESTE", "Wanandumbo")

@section("content")

<div class="dashboard-page">
    <div class="dashboard-container">

        {{-- Cabeçalho --}}
        <div class="dashboard-header">
            <div>
                <span class="dashboard-eyebrow">WANANDUMBO GROUP</span>
                <h1>Dashboard</h1>
                <p>O teu espaço de trabalho</p>
            </div>

            <div class="dashboard-avatar">
                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
            </div>
        </div>

        {{-- Boas-vindas --}}
        <div class="dashboard-hero">
            <div class="dashboard-hero-content">
                <span class="dashboard-tag">
                    <span class="dashboard-tag-dot"></span>
                    PAINEL PRINCIPAL
                </span>

                <h2>Olá, {{ Auth::user()->name }}!</h2>

                <p>
                    Bem-vindo à tua área de trabalho.
                    Gere a tua conta e acompanha as tuas atividades
                    num espaço simples e organizado.
                </p>
            </div>

            <div class="dashboard-hero-art">
                <div class="dashboard-monogram">WG</div>
            </div>
        </div>

       <div class="col-md-10 offset-md-1 dashvoard-title-container">
            <h1>Meus Eventos</h1>
       </div>

       <div class="col-md-10 offset-md-1 dashvoard-Events-container">
            @if(count($eventsevents) > 0 )
            @else
            <p>Você ainda não tem eventos, <a href="events/create">Criar evento</a></p>
            @endif
       </div>

       

    </div>
</div>

@endsection
