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
    <body>
         
        
        <header role="banner">
     
      <nav class="navbar navbar-expand-md navbar-dark bg-light">
        <div class="container">
          <a class="navbar-brand" href="index.php">DIONES O BARBEIRO</a>
        </div>
      </nav>
    </header>
        <section class="site-herocad overlay" data-stellar-background-ratio="0.5" style="background-image: url(images/big_image_1.png);">

            <br><br>
       <div class="container">
    <div class="ce"> 
            
    <form class="sda bordaCad" action="php/cadastroCli.php" method="POST" enctype="multipart/form-data ">
        <h2 class="loginTitle"> CADASTRE-SE</h2>
        <br>
    <p>
        <label for="nomeCad" class="label_1"> Nome</label>
        <input id="nomeCad" name="nomeCad" required="required" type="text" placeholder="Ex: Rebeca de Oliveira Machado " >
    <p>
        <label for="emailCad" class="label_2">Email</label>
        <input id="emailCad" name="emailCad" required="required" type="email" placeholder="Ex: rebeca.tuctuc@gmail.com">
    </p>
    <p>
        <label for="conEmailCad" class="label_2">Confima Email</label>
        <input id="conEmailCad" name="conEmailCad" required="required" type="email" placeholder="Ex: rebeca.tuctuc@gmail.com">
    </p>
    <p>
        <label for="senhaCad" class="label_3">hSena</label>
        <input id="senhaCad" name="senhaCad" required="required" type="password" placeholder="Ex: ab3AoPP902">
    </p>
     <p>
        <label for="conSenhaCad" class="label_3">Confirma Senha</label>
        <input id="conSenhaCad" name="conSenhaCad" required="required" type="password" placeholder="Ex: ab3AoPP902">
    </p>
    <p>
        <label for="telefoneCad" class="label_4">Telefone</label>
        <input id="telefoneCad" name="telefoneCad" required="required" type="tel" placeholder="(48) 000000000">
    </p>
    <p>
        <label for="nascCad" class="label_5" >Data de Nascimento</label>
        <input id="nascCad" name="nascCad" required="required" type="date" placeholder="Ex: 21/01/2001">
    </p>
    <p>
        <label for="prefCad" class="label_6">Preferencias</label>
        <input id="prefCad" name="prefCad" required="required" type="text" placeholder="Ex: gosto do meu cabelo sempre curto">
    </p>
    <p><input name="cadastro" type="submit"  class=" cadBO btnca btn-warning " value="cadastro"></p>
    </form>
        </div>
           </div>
            
        </section>
    </body>
</html>