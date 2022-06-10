<?php include ("php/conexao.php"); 
session_start();

if (isset($_SESSION['modalS'])){
}else {
  $_SESSION['modalS'] = '0';
}

if (isset($_SESSION['modalS1'])){
}else {
  $_SESSION['modalS1'] = '0';
}

?>

<!doctype html>
<html lang="pt-br">
  <head>
    <title>Diones o Barbeiro</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet"> 

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="fonts/fontawesome/css/all.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    

    <!-- Theme Style -->
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    
    
    <header role="banner">
     
      <nav class="navbar navbar-expand-md navbar-dark bg-light">
        <div class="container">
          <a class="navbar-brand" href="index.php">DIONES O BARBEIRO</a>
          <!--<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

           <div class="collapse navbar-collapse navbar-light" id="navbarsExample05">
            <ul class="navbar-nav ml-auto pl-lg-5 pl-0">
              <li class="nav-item">
                <a class="nav-link active" href="index.php">Home</a>
              </li>
             <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="hairstyle.php" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Haircut</a>
                <div class="dropdown-menu" aria-labelledby="dropdown04">
                  <a class="dropdown-item" href="gerenciadorUsu.php">Crew Cut</a>
                  <a class="dropdown-item" href="hairstyle.php">Regular Hair Cut</a>
                  <a class="dropdown-item" href="hairstyle.php">Shampoo + Cut</a>
                  <a class="dropdown-item" href="hairstyle.php">Beard Trim with Razor</a>
                  <a class="dropdown-item" href="hairstyle.php">Hair Color</a>
                </div> 
 
              <li class="nav-item">
                <a class="nav-link" href="cadastro.php">Cadastro</a>
            </ul>
            
          </div> -->
        </div>
      </nav>
    </header>
    <!-- END header -->

    <section class="site-hero overlay" data-stellar-background-ratio="0.5" style="background-image: url(images/big_image_1.png);">
    <br><br><br><br>  
      <div class="container">
        <div class="row justify-content-around">
          <div class="col-lg-6 col-md-3 col-sm-6 col-7  ">
            <img src="images/DionesBrancoP.png" alt="some text" class="img-md-fluid">
          </div> 
          
          <div class="col-lg-4 col-md-6 col-sm-3 col-4 bordaLogin img-md-fluid">
            
            <h2 class="loginTitle"> LOGIN</h2>
            <form method="post" action="php/loginCli" enctype="multipart/form-data"> 

               <p class="log"> EMAIL:</p> <input id="emailLog" type="text" class = "loginIndex emailIndex col-mb-2" name="emailLog" >
              <br><br>
               <p class="log"> SENHA:</p>  <input id="senhaLog" type="password" class = "loginIndex senhaIndex col-mb-2" name="senhaLog" >
              <br><br>
              <button type="submit" name="login" value="login" class="btn btn-warning botaoGeral">LOGIN</button>
            </form> 
              <br>
              <p><a href="cadastro.php" class="te3 row justify-content-around"> Cadastre-se </a></p> 
          </div>  
        </div> 
      </div>
    </section>
    <!--Modal de Erro-->
    <div class="modal" id="modalS">
      <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
    
          <div class="modal-body">
            Email ou senha incorretos;
          </div>

        </div>
      </div>
    </div>
    <!-- END section -->
    <section class="site-section">
      <div class="container">
        <div class="row justify-content-around">
          <div class="col-md-4 pr-5">
            
            <h2 class="mb-3">Sobre Mim</h2>
            <p class="mb-5">Trabalho como barbeiro desde muito tempo e me mudei para centro da cidade de Sombrio em 2018, com tanto tempo de trabalho adquiri muitas habilidades e com isso quero que por meio deste site você conheça um pouco do meu trabalho. </p>
            
           
          </div>
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-12 slider-wrap">
                <div class="owl-carousel owl-theme no-nav js-carousel-1">
                  
                  <a class="img-bg" style="background-image: url('images/img_5.png')">
                    <div class="text">  
                    </div>
                  </a>

                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- END section -->

 

   <!-- <section class="section-cover cta" data-stellar-background-ratio="0.5" style="background-image: url(images/big_image_2.jpg);">
      <div class="container">
        <div class="row justify-content-center align-items-center intro">
          <div class="col-md-8 text-center element-animate">
            <h2 class="mb-4"><span>Appoint a Haircut Today and</span> Get 25% discount</h2>
            <p><a href="#" class="btn btn-black">Make an Appointment</a></p>
          </div>
        </div>
      </div>
    </section>
     END section -->

    <section class="site-section">
      <div class="container">
        <div class="row">
          <div class="map-responsive">>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3485.6462946856386!2d-49.6350846853321!3d-29.116121995678405!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95223c231964a1bf%3A0x4671b7c89ad91a28!2sR.%20Caetano%20Lumertz%2C%20383%20-%202%20-%20Centro%2C%20Sombrio%20-%20SC%2C%2088960-000!5e0!3m2!1spt-BR!2sbr!4v1571188701089!5m2!1spt-BR!2sbr" width="550" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
          </div>
          <div class="col-md-6 pl-md-5">
            <h3>Como Chegar?</h3>
            <p class="lead">Se você está procurando uma barbearia agradável a barbearia DionesOBarbeiro é o local correto para você.</p>
            <p class=""> Endereço: R. Caetano Lumertz, 383 - Centro, Sombrio - SC, 88960-000<br>
                Horário: <br>
                SEGUNDA-FEIRA &emsp;&emsp;&ensp;Fechado<br>
                TERÇA-FEIRA	&emsp;&emsp;&emsp; 07:30–19:30<br>
                QUARTA-FEIRA &emsp;&emsp;&ensp;07:30–19:30<br>
                QUINTA-FEIRA	&emsp;&emsp;&ensp;&nbsp;07:30–19:30<br>
                SEXTA-FEIRA	&emsp;&emsp;&ensp;&nbsp;&nbsp;&nbsp;07:30–19:30<br>
                SÁBADO &emsp;&emsp;&ensp;&emsp;&emsp;&ensp; 	07:30–19:30<br>
                DOMINGO	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fechado<br><br>
                Whatsapp para falar conosco</p>
                <a href="https://api.whatsapp.com/send?phone=5548996823233&text=Gostaria%20de%20falar%20com%20você!">(48) 99682-3233</a>
          </div>
        </div>
      </div>
    </section>
    <!-- END section -->
    
    
   
    <footer class="site-footer">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-6">
            <h3 class="mb-4">Confira</h3>
            <p class="mb-4">Se esta procurando o melhor lugar para cortar seu cabelo você precisa conhecer a Diones o Barbeiro, então agende-se hoje mesmo pelo site ou pelo whatsapp</p>
            <ul class="list-unstyled">
              <li class="d-flex"><p class="mr-3"><i class="fas fa-plus-square"></i><a href="cadastro.php"> Cadastre-se</a></p></li>
              <li class="d-flex"><p class="mr-3"><i class="fas fa-sign-in-alt"></i><a href="#"> Login</a></p></li>
              <li class="d-flex"><p class="mr-3"><i class="fab fa-whatsapp"></i> +55 48 9682-3233</p></li>
            </ul>
          </div>
          <div class="col-md-2">
            <h3>Redes Sociais</h3>
            <p>
              <a href="https://www.instagram.com/dionesobarbeiro/" target="_blank"><i class="fab fa-instagram"></i> Instagram</a>
            </p>
          </div>
          <div class="col-md-1"></div>
          <div class="col-md-3">
          <h3>Desenvolvedores</h3>
            <p><strong>Vitor de Vicente da Silva</strong><br><a href="https://www.instagram.com/vdevicente_/" target="_blank"><i class="fab fa-instagram"></i> Instagram</a><br><a href="https://www.facebook.com/vitor.devicente.5" target="_blank"><i class="fab fa-facebook-f"></i> Facebook</a></p>
            <p><strong>Mateus Joaquim Machado</strong><br><a href="https://www.instagram.com/mateus_jm_07/" target="_blank"><i class="fab fa-instagram"></i> Instagram</a><br><a href="https://twitter.com/Mateus0312" target="_blank"><i class="fab fa-twitter"></i> Twitter</a></p>
          </div>
        </div>
      </div>
    </footer>
    
    <!-- loader -->
    <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#f4b214"/></svg></div>

    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/jquery-migrate-3.0.0.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>

    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/magnific-popup-options.js"></script>

    <script src="js/main.js"></script>

    <?php if($_SESSION['modalS'] == '1'){ ?>
    <script src="js/modalShow.js"></script>
    
    <?php } 
    $_SESSION['modalS'] = '0'; 
    $_SESSION['modalS1'] = '0'; 
    ?>
  </body>
</html>