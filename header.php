<?php
 $paginaCorrente = basename($_SERVER['SCRIPT_NAME']);
 //echo $pagina_corrente;
 ?>

<div class="navbar-fixed">    
    <nav class="brown  lighten-3">
    <div class="nav-wrapper container">
      <a href="index.php" class="brand-logo"><img src="img/cinema.png" height="55" width="60"></a>
      <a href="#" data-target="mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
        <li> <a class="black-text" <?php if($paginaCorrente == 'index.php'){echo 'style="text-decoration: underline;"';} ?> href="index.php">Home</a></li>    
        <li> <a class="black-text" <?php if($paginaCorrente == 'clientes1.php'){echo 'style="text-decoration: underline;"';} ?> href="clientes1.php">Filmes</a></li> 
        <li> <a class="black-text" <?php if($paginaCorrente == 'quem.php'){echo 'style="text-decoration: underline;"';} ?> href="quem.php">Nós!</a></li>
        <li> <a class="black-text" <?php if($paginaCorrente == 'destinos.php'){echo 'style="text-decoration: underline;"';} ?> href="destinos.php">Top 10 </a></li>
    </ul>
    </div>
  </nav>
</div> 

<!-- Sidenav para Mobile -->
<ul id="mobile" class="sidenav">
      <li>
        <div style="background-size:cover; background-position: center; background-image:url('ema.jpg');" class="user-view">
            <a href="index.php"><img class="circle" src="foto3.jpeg"></a>
            <a href="index.php"><span class="white-text name">Filmes e Cinema</span></a>
            <a href="#email"><span class="white-text email">luciano.2022310952@aluno.iffar.edu.br</span></a>
        </div>
      </li>

        <li><a href="index.php"><i class="material-icons">home</i> Home</a></li>
        <li><a href="clientes1.php">Clientes</a></li>
        <li><a href="quem.php">Quem somos</a></li>
        <li><a href="destinos.php">Destinos</a></li>
        <li><div class="divider"></div></li>
        <li><a class="subheader">Outras opções</a></li>
        <li><a href="#!">BLA BLA</a></li>
    </ul>
