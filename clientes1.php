<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<body>
  <?php include_once "header.php"; ?>
  <main class="container">
    <h1 class="center-align">Cadastrar Filme</h1>
    <div class="card-panel">
    <form onsubmit="return salvarUsuario(event);" method="POST">
        <div class="input-field col s12">
          <i class="material-icons prefix">perm_identity</i>
          <input id="id_filme" type="text" name="id_filme" />
          <label for="id_filme">ID</label>
        </div>
        <div class="input-field col s12">
          <i class="material-icons prefix">movie</i>
          <input id="nomeFilme" type="text" name="nome" required />
          <label for="nomeFilme">Nome do Filme</label>
        </div>
        <div class="input-field col s12">
          <i class="material-icons prefix">timer</i>
          <input id="duracao" type="text" name="duracao" required />
          <label for="duracao">Duração</label>
        </div>
        <div class="input-field col s12">
          <i class="material-icons prefix">event</i>
          <input id="data_lancamento" type="text" class="datepicker" name="data_lancamento" required />
          <label for="data_lancamento">Data de Lançamento</label>
        </div>
        <div class="input-field col s12">
          <i class="material-icons prefix">description</i>
          <input id="descricao" type="text" name="descricao" required />
          <label for="descricao">Descrição</label>
        </div>
        <div class="col s12">
          <i class="material-icons prefix">category</i>
          <span style="margin-left: 12px;">Escolha uma categoria:</span>
          <p>
            <label>
              <input class="with-gap" name="categoria" type="text" required />
              <span>Terror</span>
            </label>
          </p>
        </div>
        <div class="row">
          <div class="col s12 center-align">
            <button class="btn waves-effect waves-light brown lighten-3" type="submit">
              Enviar <i class="material-icons right">send</i>
            </button>
          </div>
        </div>
      </form>
    </div>
  </main>
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      M.Datepicker.init(document.querySelectorAll('.datepicker'), {
        autoClose: true,
        format: 'dd/mm/yyyy',
        yearRange: [1900, 2100],
      });
    });
  </script>
  <script type="text/javascript" src="js/script.js"></script>
</body>
</html>






<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<body>
  <?php 
    include_once "header.php"; 
    include_once "conect.php";
    $conexao = conectar();
  ?>
  <main class="container">
    <table class="highlight">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nome</th>
          <th>Duração</th>
          <th>Data de Lançamento</th>
          <th>Descrição</th>
          <th>Categoria</th>
        </tr>
      </thead>
      <tbody id="filmes">
        <!-- Os filmes serão listados aqui via JavaScript -->
      </tbody>
    </table>
  </main>

  <!-- Modals para Exclusão -->
  <div id="modalDelete" class="modal">
    <div class="modal-content">
      <h4>Atenção!</h4>
      <p>Deseja excluir este filme?</p>
    </div>
    <div class="modal-footer">
      <form id="deleteForm" action="excluir.php" method="POST">
        <input type="hidden" name="id" id="deleteId">
        <button type="submit" class="btn red">Excluir</button>
        <button type="button" class="modal-close btn green">Cancelar</button>
      </form>
    </div>
  </div>

  <script type="text/javascript" src="js/materialize.min.js"></script>
  
</body>
</html>