@extends("layout.main")

@section("TESTE", "Wanandumbo")

@section("content")

<div id="event-create-container" class="col-md-6 offset-md-3">
  <h1>Crie o seu evento</h1>
  <form action="/events" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="title">Imagem do Evento:</label>
      <input type="File" id="image" name="image" class="form-control-file">
    </div>
    <div class="form-group">
      <label for="title">Evento:</label>
      <input type="text" class="form-control" id="title" name="title" placeholder="Nome do evento...">
    </div>
    <div class="form-group">
      <label for="city">Cidade:</label>
      <input type="text" class="form-control" id="city" name="city" placeholder="Informe a cidade...">

      <div class="form-group">
        <label for="title">O seu evento é privado?</label>
        <select name="private" id="privete" class="form-control">
          <option value="0">Não</option>
          <option value="1">Sim</option>
        </select>
      </div>

    </div>
    <div class="form-group">
      <label for="date">Data do Evento:</label>
      <input type="date" name="date" id="date" class="form-control">

    </div>
    <div class="form-group">
      <label for="title">Descrição:</label>
      <textarea name="description" id="description" class="form-control" placeholder="O que vai acontecer no evento..."></textarea>
    </div>

    <div class="form-group">
      <label for="title">Adicione itens de infraestrutura:</label>
      <div class="form-group">
        <input type="checkbox" name="items[]" value="Cadeiras" id="items">Cadeiras
      </div>

      <div class="form-group">
        <input type="checkbox" name="items[]" value="Palco" id="items">Palco
      </div>
      <div class="form-group">
        <input type="checkbox" name="items[]" value="Cerveja gratis" id="items">cerveja gratis
      </div>
      <div class="form-group">
        <input type="checkbox" name="items[]" value="Open food" id="items">Open food
      </div>
      <div class="form-group">
        <input type="checkbox" name="items[]" value="Brindes" id="items">Brindes
      </div>

      <input type="submit" value="Criar Evento" class="btn btn-primary">
  </form>
</div>

@endsection