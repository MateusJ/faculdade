<?php
session_start();
require_once('php/conexao.php');
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
    
    
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    

    <!-- Theme Style -->
    <link rel="stylesheet" href="css/style_up.css"> 
    
</head>
    
<body>


    <header role="banner">
     
      <nav class="navbar navbar-expand-md navbar-dark bg-light">
        <div class="container">
          <a class="navbar-brand" href="indexAgen.php">DIONES O BARBEIRO</a> 
          <div class="collapse navbar-collapse navbar-light" id="navbarsExample05">
            <ul class="navbar-nav ml-auto pl-lg-5 pl-0">
                
              <li class="nav-item">
                <a class="log-out" href="indexAgen.php">Voltar</a>
            </ul>
            
          </div> 
        </div>
      </nav>
    </header>
    <section class="site-herocad overlay" data-stellar-background-ratio="0.5" style="background-image: url(images/big_image_1.png);">
            <br>        <br>       
        <div class="container col-12 row justify-content-around">
<div clas="ce">
 <div class="bordaCad1">   
<div class="letraPadrao">
<h1 class="titulo">Seus Dados</h1>
 <p>Nome: <?php
 
if(isset($_SESSION['msg'])){
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}

    
    echo $_SESSION['nome'];
    echo "  ";
     ?></p>
    <br>
    <p>Email: <?php
    echo $_SESSION['email'];
     echo "  ";
        ?></p>
    <br>
    <p>Senha: <?php
    echo $_SESSION['senha'];
     echo "  ";
        ?> </p>
    <br>
    <p>Telefone: <?php
    echo $_SESSION['telefone'];
     echo "  ";
        ?></p>
    <br>
    <p>Data de Nascimento: <?php
    function data($data){
      return date("d/m/Y", strtotime($data));
  }
    echo data($_SESSION['nascimento']);
     echo "  ";
        ?></p>
    <br>
    <p>Preferências: <?php
    echo $_SESSION['preferencias'];
 echo "  ";
        ?></p>
    <br>

    <a href="#" type="button"  class=" cadBO btn btn-info" data-toggle="modal" data-target="#myModal">editar</a>
    
    <!--<input class="btn btn-danger"name="excluir" id="excluir" type="submit" value="excluir">-->
        
    <a href="#" type="button" class="cadBO btn btn-danger" data-toggle="modal" data-target="#myModal1">excluir</a>
    </div>
     </div>
    </div>
    
    
    
     <!-- excluir-->       
  <div class="modal" id="myModal1">
  <div class="modal-dialog modal-dialog-centered modal-md">
      <div class="modal-content">
        <!-- Modal body -->
        <div class="modal-body">
     Você realmente deseja excluir sua conta?
        <br>
     Está ação é irreversivel
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
         <a class=" cadBO btn btn-info" href="php/excluir.php" role="button">Sim</a>
          <button type="button" class="cadBO btn btn-danger" data-dismiss="modal">Não</button>
        </div>
      </div>
    </div>
  </div>

    
        <!-- excluir-->       
  <div class="modal" id="myModal">
  <div class="modal-dialog modal-dialog-centered modal-md">
      <div class="modal-content">
        <!-- Modal body -->
        <div class="modal-body">
            
               <div class="letraPadrao1">
                   <div class="container">
        <h2> EDITAR USUÁRIO </h2>
        <br>
        <form method="POST" action="php/updateUsu.php" enctype="multipart/form-data">
         <div class=" col-md-12">
        <p>
        <label>Nome: </label>
        <input id="nomeEdit" type="text" name="nomeEdit" placeholder="Digite seu novo nome" value="<?php echo $_SESSION['nome'];?>">
        </p>
        </div>
        <div class=" col-md-12">
        <p>
        <label>Senha: </label>
        <input id="senhaEdit" type="text" name="senhaEdit" placeholder="Digite seu nova senha" value="<?php echo $_SESSION['senha'];?>">    
        </p>
        </div>
        <div class=" col-md-12">
        <p>
        <label>Confirma Senha: </label>
        <input id="consenhaEdit" type="text" name="consenhaEdit">    
        </p>
        </div>
        <div class=" col-md-12">      
        <p> 
        <label>Telefone: </label>
        <input id="telefoneEdit" type="tel" name="telefoneEdit" placeholder="Digite seu novo telefone" value="<?php echo $_SESSION['telefone'];?>">
        </p>
        </div>  
        <div class=" col-md-12">
        <p>
        <label>Data de Nascimento: </label>
        <input id="nascEdit" type="date" name="nascEdit" placeholder="Digite seu nome" value="<?php echo $_SESSION['nascimento'];?>">
        </p>
        </div>
        <div class=" col-md-12">
        <p>
        <label>Preferências: </label>
        <input id="prefEdit" type="text" name="prefEdit" placeholder="Digite seu nome" value="<?php echo $_SESSION['preferencias'];?>">
        </p>    
        </div>
      
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="cadBO btn btn-info">Editar</button>
          <button type="button" class=" cadBO btn btn-default" data-dismiss="modal">Não</button>
        </div>
              </form>
                    </div>
            </div></div>
      </div>
    </div>
            </div>
        </div>
    </section>
    
    <!-- Modal -->
    <div class="modal" id="modalS">
    <div class="modal-dialog modal-dialog-centered modal-md">
      <div class="modal-content">
        
        <div class="modal-body">
          Confirmação de Senha Incorreta!!
        </div>
        
      </div>
    </div>
  </div>
  
  
  
  
    <script src="js/main.js"></script>

    <?php if($_SESSION['modalS'] == '1'){ ?>
    <script src="js/modalShow.js"></script>
    
    <?php } 
    unset($_SESSION['modalS']); 
    ?>
</body>
</html>