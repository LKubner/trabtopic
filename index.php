<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    
    <style>
    .card  {
      transition: transform 0.3s;
    }

    .card:hover  {
      transform: scale(1.1);
	   z-index: 1000; /* Traz a imagem para uma camada superior */
    }


   footer.li {
            display: inline-block;
            margin-right: 10px; /* Espaçamento entre os itens */
        } 

         

  </style>


    </head>

    <body>
    <?php include_once "header.php" ?>

      <h1> Filmes e Cinema </h1>




    <div class="row">
    <div class="col s12 m6 l3">
      <div class="card">
      <span class="card-title">Star Wars Episódio I: A Ameaça Fantasma</span>
        <div class="card-image">
          <img src="img/starwars.jpg"> 
        </div>
        <div class="card-content">
          <p>Primeiro episódio da vasta franquia da saga Star Wars.</p>
        </div>
        <div class="card-action">
          <a href="https://www.youtube.com/watch?v=bD7bpG-zDJQ">Ver trailer</a>
        </div>
      </div>
    </div>


    <div class="col s12 m6 l3">
      <div class="card">
      <span class="card-title">Edward Mãos de Tesoura</span>
        <div class="card-image">
          <img src="img/edward.jfif">
        </div>
        <div class="card-content">
          <p>Classico do Cinema</p>
        </div>
        <div class="card-action">
          <a href="#">Veja Só</a>
        </div>
      </div>
    </div>

    <div class="col s12 m6 l3">
      <div class="card">
        <div class="card-image">
          <img src="img/resident.jpg">
          <span class="card-title">Resident Evil: Bem vindo a Raccon City</span>
        </div>
        <div class="card-content">
          <p>Esse é Legal</p>
        </div>
        <div class="card-action">
          <a href="#">Sequencia proxima</a>
        </div>
      </div>
    </div>


    <div class="col s12 m6 l3">
      <div class="card">
        <div class="card-image">
          <img src="img/chapeu.jfif">
          <span class="card-title">Deu a louca na chapeuzinho vermelho</span>
        </div>
        <div class="card-content">
          <p>Esse filme é maluco</p>
        </div>
        <div class="card-action">
          <a href="#">acessa aí</a>
        </div>
      </div>
    </div>

  </div>
















    
    

   
  <footer class="page-footer brown  lighten-3">
          <div class="container">
            <div class="row">
              <div class="col l3 s12">
                <h5 class="white-text">Endereço</h5>
                <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
              </div>  

              <div class="col l3 s12">
                <h5 class="white-text">Institucional</h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="#!">Fale conosco</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Quem somos</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Contato</a></li>
              
                </ul>
              </div>

              <div class="col l3 offset-l3 s12">
                <h5 class="white-text">Redes Sociais</h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="#!"><img src="img/facebook.png"></a></li>
                  <li><a class="grey-text text-lighten-3" href="#!"><img src="img/youtube.png"></a></li>
                  <li><a class="grey-text text-lighten-3" href="#!"><img src="img/instagram.png"></a></li>
                 
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            © 2024 todos os direitos reservados Luciano Kubner 
            <a class="grey-text text-lighten-4 right" href="#!">Muito mais</a>
            </div>
          </div>
        </footer>



      <!--JavaScript at end of body for optimized loading-->
      <script type="text/javascript" src="js/materialize.min.js"></script>
      <script>

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