<?php
session_start();
require_once('php/conexao.php');
function data($data){
      return date("d/m/Y", strtotime($data));
  }
?>
<html>
    
<head>
     <section class="site-herocad overlay" data-stellar-background-ratio="0.5" style="background-image: url(images/tijolin.png);">
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
<!-- Corpo da Página -->
<body>
  <div class="preto">
    <div class="container">
      <a class="navbar-brand" href="adm.php">CLIENTES</a>
    </div>
    <br/>

    <!-- Chamada MySql -->
    <?php
    $result_usu =  "SELECT * FROM agenda ORDER BY data_agenda";
    $resultado_usu = mysqli_query($mysqli, $result_usu);
    while($row_usu = mysqli_fetch_assoc($resultado_usu)){?> 

        <!-- Lista de Usuarios -->

        <div class="contorno"> 
            <?php echo $row_usu['data_agenda'];?>&nbsp
            <?php echo $row_usu['hora'];?>&nbsp
            
            
        </div>
    <?php }?>
</body>
</html>