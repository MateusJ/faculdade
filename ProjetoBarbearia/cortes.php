<?php
session_start();
require_once('php/conexao.php');
function data($data){
      return date("d/m/Y", strtotime($data));
  }
$_SESSION['repetidor'] = '';
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
    <body class="site-herocad overlay" data-stellar-background-ratio="0.5" style="background-image: url(images/tijolin.png); background-attachment: fixed;">
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
            <br>        <br>    
<form id="formularioAgenda" action="php/agendar.php"method="post" enctype="multipart/form-data">   
    <div class="preto">
        <div class="container">
            <div class="row justify-content-around">
                <div class="col-sm-4 bordaLogin1 ">
                    <div class="cortes white">
                        <?php

                            $result_usu =  "SELECT * FROM cabelo";
                            $resultado_usu = mysqli_query($mysqli, $result_usu);
                        ?>

                        <table class="tab">
                            <p class="CARA" style= "color: rgb(255, 193, 7); text-align:center;" >CABELO</p>
                            <tr class="tt">
                                <th> Nome </th>
                                <th> Descrição </th>
                                <th> Valor </th>
                                <th> </th>
                            </tr>


                            <?php while($row_usu = mysqli_fetch_assoc($resultado_usu)){?>

                                <tr>
                                    <td><?php echo $row_usu['nome'];?>&nbsp</td>
                                    <td><?php echo $row_usu['descricao'];?>&nbsp</td>
                                    <td><?php echo $row_usu['valor'];?>&nbsp</td>
                                    <td><input value="<?php echo $row_usu['nome']?>" id="codCabelo" name="codCabelo" type="radio"></td>
                                </tr>
                                
                                
                            <?php }?>
                        </table>
                                
                        <table class="tab">
                            <p class="CARA"style= "color: rgb(255, 193, 7);">BARBA</p>
                            <tr class="tt">
                                <th> Nome </th>
                                <th> Descrição </th>
                                <th> Valor </th>
                                <th> </th>
                            </tr>
                            <?php

                                $result_usu =  "SELECT * FROM barba";
                                $resultado_usu = mysqli_query($mysqli, $result_usu);
                                while($row_usu = mysqli_fetch_assoc($resultado_usu)){
                            ?>

                                    <tr> 
                                        <td><?php echo $row_usu['nome'];?>&nbsp</td>
                                        <td><?php echo $row_usu['descricao'];?>&nbsp</td>
                                        <td><?php echo $row_usu['valor'];?>&nbsp</td>
                                        <td> <input value="<?php echo $row_usu['nome'];?>" id="codBarba" name="codBarba" type="radio"></td>
                                    </tr>
                                    
                            <?php }?>
                        </table>
                    </div>

                    <a data-toggle="modal" data-target="#modalS" class="btnca btn-warning" style="color:black;">Enviar</a>

                    <div class="modal" id="modalS">
                        <div class="modal-dialog modal-dialog-centered modal-md">
                            <div class="modal-content">
                                <div class="modal-body" >
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-3 col-sm-8">
                        
                                                <div class="day">
                                                    <div class="h7" style="color:red"; text-align:center;>
                                                        <p> Clique DUAS VEZES no DIA desejado <br> PARA CONFIRMAR!</p>
                                                         </div>
                                                    <select class="form-control" name="diaSem" id="diaSem" onclick="semana()">
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
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div id="conteudo"></div>
                                                <div class="confirmacao corN">
                                                    <input type="button" onclick="resultados()" id="salvar" name="salvar" class="btncad btn-warning" value="salvar">
        
                                                </div>
                                            </div>
                                            <div class="col-sm-6 justify-content-center">
                                                <br>
                                                <div class="confirmation">
                                    
                                                    <img src="images/DionesBlackP.png" style="width: 150px;">
                                    
                                                    <div id="cabeloAA"></div>     
                                                    <div id="barbaAA"></div>
                                                    <div id="diaAA"></div>
                                                    <div id="horaAA"></div>
                                                    <div id="horaAAA"></div>
                                                    <button type='submit' class="btncad btn-warning">Confirmar</button>
                                                </div>
                                                <div class="erro" >
                                                    Você não selecionou nossos serviços!
                                                </div>
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                                                
                </div>
            </div>
        </div>
    </div>
</form>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/jquery-migrate-3.0.0.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.waypoints.min.js"></script>
<script src="js/jquery.stellar.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/magnific-popup-options.js"></script>
<script>
function semana() {

var diaSem = document.getElementById("diaSem");

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

function resultados() {


var cabelo = $("input[name='codCabelo']:checked").val();
var barba = $("input[name='codBarba']:checked").val();
var dia = document.getElementById('diaSem').value;
var horaHoje = document.getElementById('codHoraH').value;
var horaProx = document.getElementById('codHoraP').value;

if (typeof cabelo === "undefined" && typeof barba === "undefined"){
    $('.erro').show();
}else{
    $('.erro').hide();
    $('.confirmation').show();

    if (typeof cabelo != "undefined"){
        document.getElementById('cabeloAA').innerHTML = cabelo;
    } 
    if (typeof barba != "undefined"){
        document.getElementById('barbaAA').innerHTML = barba;
    }
    document.getElementById('diaAA').innerHTML = dia;
    document.getElementById('horaAA').innerHTML = horaHoje;
    document.getElementById('horaAAA').innerHTML = horaProx;

}   
}
</script>
<script>
    $(document).ready(function(e) {
        $("body").delegate("#diaSem", "change", function(data){
            //Pegando o valor do select
            var valor = $(this).val();
            //Enviando o valor do meu select para ser processado e
            //retornar as informações que eu preciso
            $("#conteudo").load("php/horariosDisp.php?parametro="+ valor);

        });
    });
</script>
<script src="js/main.js"></script>
<script src="js/teste.js"></script>
</body>
</html>