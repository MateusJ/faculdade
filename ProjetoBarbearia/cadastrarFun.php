<?php include ("php/conexao.php"); 
session_start();
?>
<html>
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
    <body class="site-herocad overlay" data-stellar-background-ratio="0.5" style="background-image: url(images/big_image_1.png); background-attachment: fixed;">
         
        
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

    <div class="modal" id="modalS">
      <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">

          <div class="modal-body">
            Email ja cadastrado!!
          </div>

        </div>
      </div>
    </div>

    <div class="modal" id="modalS1">
      <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">

          <div class="modal-body">
          Confirmação de senha ou email erradas.
          </div>

        </div>
      </div>
    </div>


            <br><br><br>
      
       <div class="container">
    <div class="ce"> 
    <form class="sda bordaCad" action="php/cadastroFun.php" method="POST" enctype="multipart/form-data ">
        <h2 class="loginTitle"> CADASTRO DE FUNCIONARIO</h2>
        <br>
    <p>
        <label for="nomeFun" class="label_1"> Nome</label>
        <input id="nomeFun" name="nomeFun" required="required" type="text" placeholder="Ex: Rebeca de Oliveira Machado " >
    <p>
        <label for="emailFun" class="label_2">Email</label>
        <input id="emailFun" name="emailFun" required="required" type="email" placeholder="Ex: rebeca.tuctuc@gmail.com">
    </p>
    <p>
        <label for="conEmailFun" class="label_2">Confima Email</label>
        <input id="conEmailFun" name="conEmailFun" required="required" type="email" placeholder="Ex: rebeca.tuctuc@gmail.com">
    </p>
    <p>
        <label for="senhaFun" class="label_3">Senha</label>
        <input id="senhaFun" name="senhaFun" required="required" type="password" placeholder="Ex: ab3AoPP902">
    </p>
     <p>
        <label for="conSenhaFun" class="label_3">Confirma Senha</label>
        <input id="conSenhaFun" name="conSenhaFun" required="required" type="password" placeholder="Ex: ab3AoPP902">
    </p>
    <p>
        <label for="telefoneFun" class="label_4">Telefone</label>
        <input id="telefoneFun" name="telefoneFun" required="required" type="tel" placeholder="(48) 000000000">
    </p>
    <p>
        <label for="cargoFun" class="label_5" >Cargo</label>
        <input id="cargoFun" name="cargoFun" required="required" type="text" placeholder="Ex: 21/01/2001">
    </p>
    <p>
        <label for="nascFun" class="label_5" >Data de Nascimento</label>
        <input id="nascFun" name="nascFun" required="required" type="date" placeholder="Ex: 21/01/2001">
    </p>
    <p>
        <label for="cpfFun" class="label_6">CPF</label>
        <input id="cpfFun" name="cpfFun" required="required" type="text" placeholder="Ex: gosto do meu cabelo sempre curto">
    </p>
    <p>
        <label for="rgFun" class="label_6">RG</label>
        <input id="rgFun" name="rgFun" required="required" type="text" placeholder="Ex: gosto do meu cabelo sempre curto">
    </p>
    <input value="<?php echo date('y/m/d')?>" id="dataEmi" name="dataEmi" type="hidden">
    <p><input name="cadastrarFun" type="submit"  class=" cadBO btn btn-warning " value="cadastro"></p>
    </form>
        </div>
           </div>

    </section>

    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/jquery-migrate-3.0.0.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>

    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/magnific-popup-options.js"></script>


    <?php if($_SESSION['modalS1'] == '1'){ ?>
    <script src="js/modalShow.js"></script>
    
    <?php }  
    $_SESSION['modalS1'] = '0'; 
    ?>

    <?php if($_SESSION['modalS'] == '1'){ ?>
    <script src="js/modalShow1.js"></script>
    
    <?php
    }
    $_SESSION['modalS'] = '0';
    ?>

    </body>
</html>