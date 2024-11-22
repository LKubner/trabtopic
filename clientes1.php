
<!DOCTYPE html>
  <html>
  <head>
    <meta charset="UTF-8">
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
     
<style>

/* tamanho da fonte */
.input-field label {
      font-size: 16px !important; /* Forçando o tamanho com !important */
    } 



/* cor label focus  */
.input-field input:focus + label {
   color: black !important;
 }
 /* cor label underline focus  */
 .row .input-field input:focus {
   border-bottom: 1px solid black !important;
   box-shadow: 0 1px 0 0 black !important
 }

  .material-icons{
  color: black !important;
  }

.material-icons.active {
  color: black !important;
  }

/* cor checkbox */
  .checkbox-black[type="checkbox"].filled-in:checked+span:not(.lever):after {
  border: 2px solid #607d8b;
  background-color: #607d8b;
}

/* cores do radio */
[type="radio"]:checked+span:after, [type="radio"].with-gap:checked+span:after {
  background-color:black;
}

[type="radio"]:checked+span:after, [type="radio"].with-gap:checked+span:before, 
[type="radio"].with-gap:checked+span:after 
{
  border: 2px solid black;
}
  
/*cores do select */
ul.dropdown-content li>a, ul.dropdown-content li>span {
    color: #000000; /* Cor do texto das opções */
   /* background-color: #f1f1f1;  Cor de fundo das opções */
}


/* Altera a cor do fundo do cabeçalho do Datepicker */
.datepicker-date-display {
    background-color: #00aaff; /* Cor do cabeçalho */
}

/* Altera a cor do texto da data selecionada no cabeçalho */
.datepicker-date-display .year-text,
.datepicker-date-display .date-text {
    color: #fff; /* Cor do texto da data no cabeçalho */
}

/* Altera a cor dos dias do calendário */
.datepicker-table td div {
    color: #333; /* Cor dos dias */
}

/* Altera a cor de fundo dos dias ao passar o mouse */
.datepicker-table td div:hover {
    background-color: #ffcc00; /* Cor de fundo ao passar o mouse */
    color: #fff;
}

/* Altera a cor do dia selecionado */
.is-selected {
    background-color: #00aaff; /* Cor de fundo do dia selecionado */
    color: #fff; /* Cor do texto do dia selecionado */
}

/* Altera a cor dos botões de navegação (próximo e anterior) */
.datepicker-controls .datepicker-prev,
.datepicker-controls .datepicker-next {
    color: #00aaff; /* Cor das setas de navegação */
}



</style>

</head>

<body>
<?php 
    include_once "header.php" ;
    require_once "conect.php";
?>
   <form onsubmit="return salvarUsuario(event);">
<main class="container"> 

    <h1 class="center-align"> Cadastrar Filme </h1>
    <form action="insere.php" method="get">
     <div class="card-panel">  
     
    <div class="input-field col s12">
      <i class="material-icons prefix"> perm_identity</i>
      <input  id="nomeFilme" type="text" class="validate" name="nomeFilme" required>
     <label for="nomeFilme">Nome do Filme</label>
     <span class="helper-text" data-error="Preencha o campo."> </span>
    </div>
    
        <div class="input-field col s12">
        <i class="material-icons prefix"> date_range</i>
          <input id="duracao" type="text" class="datetime" name="duracao">
          <label for="duracao">Duracao</label>
        </div>
      
        <div class="input-field col s12">
        <i class="material-icons prefix"> date_range</i>
          <input id="data_lancamento" type="text" class="datepicker" name="data_lancamento">
          <label for="data_lancamento">Data de Lançamento</label>
        </div>

        <div class="input-field col s12">
      <i class="material-icons prefix"> airline_seat_recline_normal</i>
      <input  id="nomeFilme" type="text" class="validate" name="nomeCliente" required>
     <label for="nomeFilme">Descrição</label>
     <span class="helper-text" data-error="Preencha o campo."> </span>
    </div>
     

      <div class="col s12">
        <i class="material-icons prefix"> cached</i>
        <span style="margin-left: 12px;"> Escolha uma categoria: </span>
       
        <p>
          <label>
        <input class="with-gap" name="cia" type="radio"  />
        <span>Terror
      </label> 
      
      <label>
        <input class="with-gap" name="cia" type="radio"  />
        <span>Ação</span>
      </label> 
      
       <label>
        <input  name="cia" type="radio"  />
        <span>Aventura</span>
      </label> 
      
      <label>
        <input class="with-gap" name="cia" type="radio"  />
        <span>Sci-Fi</span>
      </label> 

      <label>
        <input class="with-gap" name="cia" type="radio"  />
        <span>Comedia</span>
      </label> 

      <label>
        <input class="with-gap" name="cia" type="radio"  />
        <span>Romance</span>
      </label> 
    
    </p>
      </div>
      </div>
      
</div>

  <div class="row"> 
  <div class="col s12">   
    <p class="center-align">  
        <button class="btn waves-effect waves-light brown  lighten-3" type="submit" name="action">Enviar
    <i class="material-icons right">send</i> </button>
  </p>
</div>
</div>
  

</form>
 



</main>
<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="js/materialize.min.js"></script>

<script>
        // Inicializa o date picker
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.datepicker');
            M.Datepicker.init(elems, {
                autoClose: true, // Fecha o date picker automaticamente após a seleção
                format: 'dd/mm/yyyy', // Define o formato da data
                yearRange: [1900, 2100], // Define o intervalo de anos
                
                
                onSelect: function(date) {
                    console.log('Data selecionada: ', date);
                }
            });
        }); 


        

      document.addEventListener('DOMContentLoaded', function() 
        {
        var elems = document.querySelectorAll('select');
        var instances = M.FormSelect.init(elems);
      });




      
/*

var CPF = document.getElementById("CPF");
CPF.addEventListener("input", function (event) {
  if (CPF.validity) {
    CPF.setCustomValidity(" ");
  } else {
    CPF.setCustomValidity("");
  }
}); */
</script>
<script src="script.js"></script>
</form>
</body>
</html>








<!DOCTYPE html>
  <html>
  <head>
    <meta charset="UTF-8">
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
<body>
<?php 
    include_once "header.php" ;
    require_once "conect.php";
    $conexao = conectar();
?>
<main class="container"> 
<table class="highlight">
        <thead>
          <tr>
              <th>ID</th>
              <th>CPF</th>
              <th>Nome</th>
              <th>Data nasc</th>  
              <th>Operação </th>       
          </tr>
        </thead>
        <tbody>
  <?php
  $sql = "SELECT * FROM filme";
  $resultado = mysqli_query($conexao,$sql); 
  var_dump($resultado);
  while($linha = mysqli_fetch_assoc($resultado))
  {
  ?>
      <tr>
      <td> <?php echo $linha['id']; ?> </td>
      <td> <?php echo $linha['nomeFilme']; ?> </td>
      <td> <?php echo $linha['duracao']; ?> </td>
      <td><?php  $data_lancamento = date('d/m/Y',strtotime($linha['data_lancamento'])); echo $data_lancamento; ?></td>
      <td> <a href="#modal<?php echo $linha['id']; ?>" class="btn-floating btn-small waves-effect waves-light red modal-trigger"><i class="material-icons">delete</i></a> </td>
      
   <!-- Modal Structure -->
  <div id="modal<?php echo $linha['id']; ?>" class="modal">
    <div class="modal-content">   
      <h2> Atenção! </h2>
      <p>Você confirma a exclusão do cliente:  <?php echo $linha['nomeCliente'];?> ?</p>
    </div>

    <div class="modal-footer"> 
     <form action = "excluir.php" method ="POST">
     <input type = "hidden" name ="id" value="<?php echo $linha['id'];?>">    
    
     <button type="submit" name="btn-deletar" class="modal-action modal-close waves-red btn red darken-1"> 
      Excluir </button>

      <button type="button" name="btn-cancelar" class="modal-action modal-close  btn waves-light green"> 
      Cancelar </button> 
    </form> 

  </div>
  </div>
  
  </tr>
   <?php 
  }
  ?>
          
       
        
         
      </tbody>
      </table>
  

 <br>
      <a href='relatorio.php' class="brown lighten-3 waves-effect waves-light btn"><i class="material-icons right">add</i>Gerar relatório</a>
      <table class="highlight">
</main>



<script type="text/javascript" src="js/materialize.min.js"></script>
<script>
// M.AutoInit();
   document.addEventListener('DOMContentLoaded', function() {
      var elems = document.querySelectorAll('.modal');
      var instances = M.Modal.init(elems, {
        opacity: 0.7,        // Opacidade do background (0.0 a 1.0)
        inDuration: 1000,     // Duração da animação de abertura em milissegundos
        outDuration: 1200,    // Duração da animação de fechamento em milissegundos
        dismissible: true,   // Permite fechar ao clicar fora do modal
        startingTop: '10%',  // Posição inicial do modal em relação ao topo
        endingTop: '15%'     // Posição final do modal em relação ao topo
      });
    });

    document.addEventListener('DOMContentLoaded', function() {
            // Inicializa a sidenav
            var elems = document.querySelectorAll('.sidenav');
            var instances = M.Sidenav.init(elems, {
                edge: 'left'});

            // Configura a largura da sidenav
            var sidenav = document.querySelector('.sidenav');
            sidenav.style.width = '250px'; // Ajuste a largura conforme necessário
        });



</script>

</body>
</html>