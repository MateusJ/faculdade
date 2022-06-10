<?php include ("php/conexao.php"); 
 session_start();
 if($_SESSION['emailFun'] == null or $_SESSION['senhaFun'] == null){
  echo "<script>window.location.href='index.php'</script>";
 }
 ?>
<html>
    <head>
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
    </head>
    <body class="site-herocad overlay" data-stellar-background-ratio="0.5" style="background-image: url(images/DionesADM.png);">
        <h3><a class="log-out te5 white" href="logOut.php">Sair</a></h3><br>

        <br><br>
        <h3><a href="listaUsu.php" class="te4 "> <img src="images/Clientes.png"/></a></h3><br><br><br><br><br>
        <h3><a href="listaFun.php" class="te4 "> <img src="images/Funcionarios.png"/></a></h3><br><br><br><br><br>
        <h3><a href="disponivelServ.php" class="te4 "> <img src="images/Servi%C3%A7os.png"/></a></h3><br><br><br><br><br>
        <h3><a href="listaServ.php" class="te4 "> <img src="images/cadsfun.png"/></a></h3><br><br>
 
        
    </body>
</html>