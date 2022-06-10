<?php include ("php/conexao.php"); 
 session_start();
 if($_SESSION['emailUsu'] == null or $_SESSION['senhaUsu'] == null){
  echo "<script>window.location.href='index.php'</script>";
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
    <?php
    $email = "";
    $emailErr = "";
    ?>
    
    <header role="banner">
     
      <nav class="navbar navbar-expand-md navbar-dark bg-light">
        <div class="container">
          <a class="navbar-brand" href="index.php">DIONES O BARBEIRO</a>
          <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button> -->

          <div class="collapse navbar-collapse navbar-light" id="navbarsExample05">
            <ul class="navbar-nav ml-auto pl-lg-5 pl-0">
              
              <li class="nav-item">
                <a class="navbar-brand2" href="usuarios.php">Minhas Informações |&nbsp</a>
              </li>
                
              <li class="nav-item">
                <a class="log-out" href="logOut.php">Sair</a>
            </ul>
            
          </div>
        </div>
      </nav>
    </header>
    <!-- END header -->
    
    <!-- Modal -->
    <div class="modal" id="modalS">
      <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">

          <div class="modal-body">
            Cadastrado com Sucesso!!
            <br>
            Teste já o nosso agendamento online!!
          </div>

        </div>
      </div>
    </div>

    <!-- Modal1 -->
    <div class="modal" id="modalS1">
      <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">

          <div class="modal-body">
            Agendado com sucesso!!
          </div>

        </div>
      </div>
    </div>

    <!-- Corpo da Página -->
    <section class="site-hero overlay" data-stellar-background-ratio="0.5" style="background-image: url(images/big_image_1.png);">
        <br><br><br><br><br>
      <div class="container">
          <div class="row justify-content-around">
            <div class="col-lg-6 col-md-7 col-sm-9 col-9">
              <img src="images/DionesBrancoP.png" alt="Image placeholder" class="img-md-fluid">
            </div> 
          
          <div class=" h-25 d-inline-block col-lg-3 col-md-3 col-sm-3 col-3 bordaLogin3  img-md-fluid">
              <a href="cortes.php"  class='btn btn-warning botaoAgen '>AGENDAR</a>
              <br>
              <a href="#" data-toggle="modal" data-target="#myModal5"  class='btn btn-warning botaoAgen '>MEUS HORÁRIOS</a>  
            </div>
          </div>
        </div>
        <div class="modal" id="myModal5">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content">

                    <div class="modal-body"> 
                           <h2 class="preto"> Seus agendamentos </h2>
                        <?php 
                        $cod = $_SESSION['cod'];
                        $result_usu =  "SELECT * FROM agenda where cliente = '$cod'";
                        $resultado_usu = mysqli_query($mysqli, $result_usu);
                        while($row_usu = mysqli_fetch_assoc($resultado_usu)){?>
                        
                            <table class="tab3 white">
                                <thead class="funhead">
                                    <tr class="tt" style="color: black;">
                                        <th>Data</th>
                                        <th>Hora</th>
                                    </tr>
                                </thead>
                                <tbody class="funbody" >
                                    <tr style="color: black;">
                                        <td class="bord"><?php echo $row_usu['data_agenda'];?></td>
                                        <td class="bord"><?php echo $row_usu['hora'];?></td>
                                    </tr>
                                </tbody>
                            </table>
                            
                        
                        <?php } ?>
                    </div>

                </div>
            </div>
        </div>
      </section>
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
    <!-- END section -->
      <h4 class="hTitle">Fotos Ligadas a Barbearia!</h4>

    <section class="site-section">
     <div class="wrap">
	<!-- Define all of the tiles: -->
	<div class="box">
		<div class="boxInner">
			<img src="images/img_1.png"/>
			
		</div>
	</div>
	<div class="box">
		<div class="boxInner">
			<img src="images/img_2.png"/>
			
		</div>
	</div>
	<div class="box">
		<div class="boxInner">
			<img src="images/img_7.png"/>
			
		</div>
	</div>
	<div class="box">
		<div class="boxInner">
			<img src="images/img_4.png"/>
			
		</div>
	</div>
	<div class="box">
		<div class="boxInner">
			<img src="images/img_5.png"/>
			
		</div>
	</div>
	<div class="box">
		<div class="boxInner">
			<img src="images/img_3.png"/>
			
		</div>
	</div>
	<div class="box">
		<div class="boxInner">
			<img src="images/img_6.png"/>
			
		</div>
	</div>
	<div class="box">
		<div class="boxInner">
			<img src="images/img_9.png"/>
			
		</div>
	</div>
	<div class="box">
		<div class="boxInner">
			<img src="images/img_8.png"/>
			
		</div>
	</div>
         <div class="box">
		<div class="boxInner">
			<img src="images/img_10.png"/>
			
		</div>
         </div>
</div>
    </section>

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
              <li class="d-flex"><p class="mr-3"><i class="fas fa-sign-in-alt"></i><a href="#"> Agende-se</a></p></li>
              <li class="d-flex"><p class="mr-3"><i class="fab fa-whatsapp"></i> +55 48 9682-3233</p></li>
            </ul>
          </div>
          <div class="col-md-2">
            <h3>Redes Sociais</h3>
            <p>
              <a href="https://www.instagram.com/dionesobarbeiro/"><i class="fab fa-instagram"></i> Instagram</a>
            </p>
          </div>
          <div class="col-md-1"></div>
          <div class="col-md-3">
          <h3>Desenvolvedores</h3>
            <p><strong>Vitor de Vicente</strong><br><a href="https://www.instagram.com/vdevicente_/" target="_blank"><i class="fab fa-instagram"></i> Instagram</a><br><a href="https://www.facebook.com/vitor.devicente.5" target="_blank"><i class="fab fa-facebook-f"></i> Facebook</a></p>
            <p><strong>Mateus Joaquim Machado</strong><br><a href="https://www.instagram.com/mateus_jm_07/" target="_blank"><i class="fab fa-instagram"></i> Instagram</a><br><a href="https://twitter.com/Mateus0312" target="_blank"><i class="fab fa-twitter"></i> Twitter</a></p>
          </div>
        </div>
      </div>
    </footer>
    <!-- END footer -->
    
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
    
    <?php }else if ($_SESSION['modalS1'] == '1'){?>
    <script src="js/modalShow1.js"></script>

    <?php }$_SESSION['modalS'] = '0'; $_SESSION['modalS1'] = '0'; ?>
  </body>
</html>