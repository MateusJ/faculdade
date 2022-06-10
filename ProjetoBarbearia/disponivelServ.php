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
    <body class="site-herocad overlay" data-stellar-background-ratio="0.5" style="background-image: url(images/dionesmuroDD.png);">
         
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
            <form action="php/cancelarDia" method="post">
            <br><br>
            <div class="container">
                <h2 style="color: rgb(255,193,7);"> Olá Diones!  </h2>
                <div class="row"> 
                    <div class="col-sm-3">
                     
                        <br><br>
                        <button id="btDiaServ" class="botaoTrasp" name="btDiaServ" value="dia" type="button"><img src="images/ServiDia.png"></button>
                        <br><br><br><br>
                        <button id="btTodServ" class="botaoTrasp" name="btTodServ" value="todos" type="button" ><img src="images/TodoServ"></button>
                        <br><br><br><br>
                        <button id="btOcupDia" class="botaoTrasp" name="btOcupDia" value="disponivel" type="button" ><img src="images/OcuparServ"></button>
                        <br><br><br><br>
                   
                    </div>
                    <div class="col-sm-1"></div>
                    
                    <div class="col-sm-5">
                        <div class="diaServ" name="diaServ" id="diaServ">
                            <div class="bordaLogin5">    
                                <table class="tab1  white">
                                    <thead class="thead">
                                        <tr class="tt">
                                            <th class="col3">Nome </th>
                                            <th class="col5"> Data </th>
                                            <th class="col4"> Hora </th>
                                            <th> </th>
                                        </tr>
                                    </thead>
                                    <tbody class="tbody">
                                        <br><br><br><br><br><br><br><br>
                                        <?php
                                        $hoje = date('d/m');
                        
                                        $result_usu =  "SELECT cliente.nome, agenda.data_agenda, agenda.hora FROM agenda INNER JOIN cliente ON agenda.cliente = cliente.cod WHERE data_agenda = '$hoje' ORDER BY hora ASC";
                                        $resultado_usu = mysqli_query($mysqli, $result_usu);
                                        while($row_usu = mysqli_fetch_assoc($resultado_usu)){?>

                                        <tr>
                                            <td class="col"><?php echo $row_usu['nome'];?></td>
                                            <td class="col1"><?php echo $row_usu['data_agenda'];?></td>
                                            <td class="col2"><?php echo $row_usu['hora'];?></td>
                                            <td></td>
                                        </tr>
                        
                                        <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    
                        <div class="todasServ">
                            <div class="bordaLogin5">    
                                <table class="tab1  white">
                                    <thead class="thead">
                                        <tr class="tt">
                                            <th class="col3"> Nome </th>
                                            <th class="col5"> Data </th>
                                            <th class="col4"> Hora </th>
                                            <th> </th>
                                        </tr>
                                    </thead>
                                    <tbody class="tbody">
                                        <br><br><br><br><br><br><br><br>
                                        <?php
                                        $hoje = date('d/m');
                        
                                        $result_usu =  "SELECT * FROM agenda INNER JOIN cliente ON agenda.cliente = cliente.cod WHERE data_agenda >= '$hoje' ORDER BY data_agenda, hora ASC";
                                        $resultado_usu = mysqli_query($mysqli, $result_usu);
                                        while($row_usu = mysqli_fetch_assoc($resultado_usu)){?>

                                        <tr>
                                            <td class="col"><?php echo $row_usu['nome'];?></td>
                                            <td class="col1"><?php echo $row_usu['data_agenda'];?></td>
                                            <td class="col2"><?php echo $row_usu['hora'];?></td>
                                            <td></td>
                                        </tr>
                        
                                        <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    
                        <div class="escDiaHora">
                    
                            <select class="form-control DiaCells" name="semana" id="semana" onclick="semana()" >
                                <option value="nulo">Opções...</option>
                                <?php
                                $i = 0;
                                for ($x = 0; $x < 5; $x++){
                                    $diasemana = array('Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sabado');
                                    $data = date('Y-m-d');
                                    $diasemana_numero = date('w', strtotime('+'.$i.' day', strtotime($data)));
                                                
                                    if ($diasemana[$diasemana_numero] == 'Sabado'){
                                    $i = $i + 2;
                                    $amanha = new DateTime('+'.$i.' day');
                                    $i++;
                                    $dia = $amanha->format('d/m');
                                    ?>
                                    <option value="<?php echo $amanha->format('d/m');?>"><?php echo $amanha->format('d/m');?></option>    
                                    <?php
                                    }else{
                                        $amanha = new DateTime('+'.$i.' day');
                                        $i++;
                                        $dia = $amanha->format('d/m');
                                        ?>
                                    <option value="<?php echo $amanha->format('d/m');?>"><?php echo $amanha->format('d/m'); ?></option>    
                                    <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <br>
                        <div id="dispHora" style="width:300px; " ></div>
                        <div class="confirmacao empbu">
                            <input type="button" onclick="resultados()" id="salvar" name="salvar" class="btn btn-warning" value="salvar">
                        </div>
                    </div>
                    
                    <div class="col-sm-3">
                        <div class="confirmation">
                         
                            <div class="vgas"><p style="color: black;"> Quantas Vagas Ocupar? </p></div>
                            <select class="form-control" name="quantasVagas">
                                <option value="1">1</option>
                                <option value="2">2</option>
                            </select>
                            <br>
                            <div class="conf"><button type='submit' class="btn btn-warning">Confirmar</button></div>
                        </div>
                    </div>
                </div>
            </div>
            </form>            
        </section>                    
        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/jquery.waypoints.min.js"></script>
        <script src="js/jquery.stellar.min.js"></script>
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/magnific-popup-options.js"></script>
        <script>
            
            document.getElementById('btDiaServ').onclick = function(){
                $('.diaServ').show();
                $('.todasServ').hide();
                $('.escDiaHora').hide();
            }
            document.getElementById('btTodServ').onclick = function(){
                $('.diaServ').hide();
                $('.todasServ').show();
                $('.escDiaHora').hide();
            }
            document.getElementById('btOcupDia').onclick = function(){
                $('.diaServ').hide();
                $('.todasServ').hide();
                $('.escDiaHora').show();
            }

            document.getElementById('semana').onclick = function(){
                
                var diaSem = document.getElementById("semana");
                if (diaSem.value === "nulo"){

                    $('.horariosAtual').hide();
                    $('.proxDias').hide();

                }else if (diaSem.value === "<?php echo date('d/m')?>"){
                    $('.horariosAtual').toggle('hide');
                    $('.proxDias').hide();
                }else {
                    $('.proxDias').toggle('hide');
                    $('.horariosAtual').hide();
                }

            }
            function horaHoje() {
                $('.confirmacao').show();
            }
            function horaProx() {
                $('.confirmacao').show();
            }
            </script>
            <script>
            $(document).ready(function(e) {
                $("body").delegate("#semana", "change", function(data){
                    var hora = $(this).val();
                    $("#dispHora").load("php/horariosDisp.php?parametro="+ hora);

                });
            });
        </script>
        <script>
            function resultados() {
                $('.confirmation').show();
                var dia = document.getElementById('semana').value;
                var horaHoje = document.getElementById('codHoraH').value;
                var horaProx = document.getElementById('codHoraP').value;

                $('.confirmation').show();

                document.getElementById('diaAA').innerHTML = dia;
                document.getElementById('horaAA').innerHTML = horaHoje;
                document.getElementById('horaAAA').innerHTML = horaProx;
 
            }
        </script>
        <script src="js/main.js"></script>
        <script src="js/teste.js"></script>
    </body>
</html>