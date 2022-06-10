<?php include ("php/conexao.php"); ?>
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
    <body class="site-herocad overlay" data-stellar-background-ratio="0.5" style="background-image: url(images/tijolin.png); background-attachment: fixed;">
         
        
         <header role="banner">
     
      <nav class="navbar navbar-expand-md navbar-dark bg-light">
        <div class="container">
          <a class="navbar-brand" href="indexAgen.php">DIONES O BARBEIRO</a> 
          <div class="collapse navbar-collapse navbar-light" id="navbarsExample05">
            <ul class="navbar-nav ml-auto pl-lg-5 pl-0">
                
              <li class="nav-item">
                <a class="log-out" href="adm.php">Voltar</a>
            </ul>
            </div>
          </div>
            </nav>
              </header>
        <br> 
    <section >

            <br><br><br>
       <div class="container">
    <div class="ce"> 
            
    <form class="sda bordaCad" action="php/cadastroServ.php" method="POST" enctype="multipart/form-data ">
        <h2 class="loginTitle">Novo serviço</h2>
        <br>
    <p>
        <label for="nomeServ" class="label_1">Nome</label>
        <input id="nomeServ" name="nomeServ" required="required" type="text" placeholder="Ex: Corte Classico." >
    <p>
        <label for="descServ" class="label_2">Descrição</label>
        <input id="descServ" name="descServ" required="required" type="text" placeholder="Ex: Corte social baixo.">
    </p>
    <p>
        <label for="valorServ" class="label_3">Valor</label>
        <input id="valorServ" name="valorServ" required="required" type="text" placeholder="Ex: 20,00">
    </p>
    <p>
        <label for="tipoServ" class="label_3">Tipo</label>
        <select id="tipoServ" name="tipoServ" required="required" type="text" placeholder="Ex: 20,00">
        <option value='false'>CABELO</option>
        <option value='true'>BARBA</option>
        </select>
    </p>
    <p><input name="novoServ" type="submit"  class="  btncad btn-warning " value="Novo Serviço"></p>
    </form>
        </div>
           </div>
            
    </section>
    </body>
</html>