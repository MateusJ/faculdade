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
    <!-- Corpo da Página -->
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
                                <h1 class="white"><strong>Clientes</strong></h1>
                                <br>
                                <div>
                                    <table class="tab3 white">
                                        <thead class="funhead">
            
                                            <tr class=tt>
                                                <th>Nome</th>
                                                <th>Email</th>
                                                <th>Telefone</th>
                                                <th>Data de Nascimento</th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody class="funbody">
                                            <form method="post" action="php/excluirUsu" enctype="multipart/form-data">
                                                <?php 
                                                $result_usu =  "SELECT * FROM cliente";
                                                $resultado_usu = mysqli_query($mysqli, $result_usu);
                                                while($row_usu = mysqli_fetch_assoc($resultado_usu)){?>
                
                                                        <tr>
                                                            <td class="bord"><?php echo $row_usu['nome'];?></td>
                                                            <td class="bord"><?php echo $row_usu['email'];?></td>
                                                            <td class="bord"><?php echo $row_usu['telefone'];?></td>
                                                            <td class="bord"><?php echo $row_usu['data_nasc'];?></td>
                                                            <td class="bord"><input value="<?php echo $row_usu['cod']?>" id="codEx" name="codEx" type="radio"></td>
                                                            <td><input  type="hidden"></td>
                                                        </tr>
                                                            
                                                        
                                                    <?php }?>
                                                    <button href= "#" type="button" class="flo btn-warning" data-toggle="modal" data-target="#myModal1">excluir</button>
                                                <br><br>
                                                    <div class="modal" id="myModal1">
                                                            <div class="modal-dialog modal-dialog-centered modal-md">
                                                                <div class="modal-content">

                                                                    <div class="modal-body">
                                                                        Você realmente deseja excluir este usuário?
                                                                        <br>
                                                                        Está ação é irreversivel
                                                                    </div>
    
                                                                    <div class="modal-footer">
                                                                        <button type="submit" class="cadBO btn btn-danger" >Sim</button>
                                                                        <button type="button" class="cadBO btn btn-info" data-dismiss="modal">Não</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                </form>
                                                
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </body>
    </html>