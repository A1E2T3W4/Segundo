
@extends("layout.main")

@section("TESTE", "Wanandumbo")

@section("content")

<div id="event-create-container" class="col-md-6 offset-md-3">

    <h1>Editar: {{ $event->title }}</h1>

    <form
        action="/events/update/{{ $event->id }}"
        method="POST"
        enctype="multipart/form-data"
    >
        @csrf
        @method("PUT")

        {{-- Imagem --}}
        <div class="form-group">
            <label for="image">Imagem do evento:</label>

            <input
                type="file"
                id="image"
                name="image"
                class="form-control-file"
            >

            @if($event->image)
                <img
                    src="{{ asset('img/events/' . $event->image) }}"
                    alt="{{ $event->title }}"
                    class="image-preview"
                    style="max-width: 200px; margin-top: 10px;"
                >
            @endif
        </div>

        {{-- Título --}}
        <div class="form-group">
            <label for="title">Nome do evento:</label>

            <input
                type="text"
                id="title"
                name="title"
                class="form-control"
                value="{{ old('title', $event->title) }}"
                placeholder="Nome do evento..."
            >
        </div>

        {{-- Cidade --}}
        <div class="form-group">
            <label for="city">Cidade:</label>

            <input
                type="text"
                id="city"
                name="city"
                class="form-control"
                value="{{ old('city', $event->city) }}"
                placeholder="Informe a cidade..."
            >
        </div>

        {{-- Evento privado --}}
        <div class="form-group">
            <label for="private">O teu evento é privado?</label>

            <select name="private" id="private" class="form-control">
                <option value="0" {{ old('private', $event->private) == 0 ? 'selected' : '' }}>
                    Não
                </option>

                <option value="1" {{ old('private', $event->private) == 1 ? 'selected' : '' }}>
                    Sim
                </option>
            </select>
        </div>

        {{-- Data --}}
        <div class="form-group">
            <label for="date">Data do evento:</label>

            <input
                type="date"
                id="date"
                name="date"
                class="form-control"
                value="{{ old('date', $event->date ? $event->date->format('Y-m-d') : '') }}"
            >
        </div>

        {{-- Descrição --}}
        <div class="form-group">
            <label for="description">Descrição:</label>

            <textarea
                name="description"
                id="description"
                class="form-control"
                placeholder="O que vai acontecer no evento..."
            >{{ old('description', $event->description) }}</textarea>
        </div>

        {{-- Infraestrutura --}}
        <div class="form-group">
            <label>Itens de infraestrutura:</label>

            @php
                $selectedItems = old('items', $event->items ?? []);
                if (!is_array($selectedItems)) {
                    $selectedItems = json_decode($selectedItems, true) ?? [];
                }
            @endphp

            @foreach(['Cadeiras', 'Palco', 'Cerveja gratis', 'Open food', 'Brindes'] as $item)
                <div class="form-check">
                    <input
                        type="checkbox"
                        name="items[]"
                        value="{{ $item }}"
                        id="item_{{ $loop->index }}"
                        class="form-check-input"
                        {{ in_array($item, $selectedItems) ? 'checked' : '' }}
                    >

                    <label for="item_{{ $loop->index }}" class="form-check-label">
                        {{ $item }}
                    </label>
                </div>
            @endforeach
        </div>

        {{-- Botão --}}
        <button type="submit" class="btn btn-primary">
            Guardar alterações
        </button>

    </form>

</div>

@endsection
