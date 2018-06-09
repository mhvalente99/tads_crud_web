<html>
<head>
  <meta charset="utf-8">
  <!-- js -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="js/jQueryPost.js"></script>
  <!-- css -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <div id="alertMsg"></div>
    <div class="text-center">
      <h3>Atletas</h3>
      <hr>
    </div>
    <div class="row">
      <div class="col-sm-6">
        <form id="formulario">
          <input type="hidden" name="codigo" id="codigo">
      
          <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" name="nome" id="nome">
            <small class="form-text text-muted">Inserir nome</small>
          </div>
          <div class="form-group">
            <label for="nome">Idade</label>
            <input type="number" class="form-control" name="idade" id="idade">
            <small class="form-text text-muted">Inserir idade</small>
          </div>
          <div class="form-group">
            <label for="nome">Número Camiseta</label>
            <input type="number" class="form-control" name="numero" id="numero">
            <small class="form-text text-muted">Inserir número da camiseta</small>
          </div>
          <div class="form-group">
            <label for="nome">Posição</label>
            <input type="text" class="form-control" name="posicao" id="posicao">
            <small class="form-text text-muted">Inserir posição</small>
          </div>

          <button type="submit" class="btn btn-primary pull-right">Enviar</button>
        </form>
      </div>
      <div class="col-sm-6">
        <label>Lista de Atletas</label>
        <div id="listaAtleta">
        </div>
      </div>
    </div>
  </div>
</body>
</html>
