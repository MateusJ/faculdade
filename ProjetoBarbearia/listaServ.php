<?php
    session_start();
    require_once('php/conexao.php');
     function data($data){
        return date("d/m/Y", strtotime($data));
    }
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

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
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
        <br> <br>
            <section >
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="preto">
                                <h1 class="white"><strong>Serviços</strong></h1>
                                <a href ="novoServ.php"> Novo Serviço </a>
                                <br>
                               <button href= "#" type="button" class="flo btn-warning" data-toggle="modal" data-target="#myModal1">excluir</button>
                                <br>
                                <br>
                                <form method="post" action="php/editServ.php" enctype="multipart/form-data">
                                    <p class="CARA"style= "color: rgb(255, 193, 7);">CABELO</p>
                                    <table class="tab3 white">
                                        <thead class="funhead">
            
                                            <tr class=tt>
                                                <th>Nome</th>
                                                <th>Descrição</th>
                                                <th>Valor</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody class="funbody">
                                            
                                                <?php 
                                                $result_cab =  "SELECT * FROM cabelo";
                                                $resultado_cab = mysqli_query($mysqli, $result_cab);
                                                while($row_cab = mysqli_fetch_assoc($resultado_cab)){?>

                                                <tr>

                                                    <td class="bord"><?php echo $row_cab['nome'];?></td>
                                                    <td class="bord"><?php echo $row_cab['descricao'];?></td>
                                                    <td class="bord"><?php echo $row_cab['valor'];?></td>
                                                    <td class="bord"><input value="<?php echo $row_cab['cod']?>" id="cabCod" name="cabCod" type="radio"></td>

                                                </tr>
                                                
                
                                            <?php }?>
                                            
                                            
                                        </tbody>
                                    </table>

                                    <p class="CARA"style= "color: rgb(255, 193, 7);">BARBA</p>

                                    <table class="tab3 white">
                                        <thead class="funhead">
            
                                            <tr class=tt>
                                                <th>Nome</th>
                                                <th>Descrição</th>
                                                <th>Valor</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody class="funbody">
                                            
                                                <?php 
                                                $result_barb =  "SELECT * FROM barba";
                                                $resultado_barb = mysqli_query($mysqli, $result_barb);
                                                while($row_barb = mysqli_fetch_assoc($resultado_barb)){?>

                                                <tr>

                                                    <td class="bord"><?php echo $row_barb['nome'];?></td>
                                                    <td class="bord"><?php echo $row_barb['descricao'];?></td>
                                                    <td class="bord"><?php echo $row_barb['valor'];?></td>
                                                    <td class="bord"><input value="<?php echo $row_barb['cod']?>" id="barbCod" name="barbCod" type="radio"></td>

                                                </tr>
                
                                            <?php }?>
                                            
                                            
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> 
            </section>
    </body>
</html>