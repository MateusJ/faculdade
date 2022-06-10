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
<body>
   <section class="site-herocad overlay" data-stellar-background-ratio="0.5" style="background-image: url(images/DionesADM.png);">
        <br><br><br><br><br> 
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <h2 style="color:yellow;"> NOVO HORARIO </h2>
                    <p class="white"> DIAS:  
                        <select id="diaSem" onclick="semana();">
                        <option>Opções...</option>
                        <option class="segunda" value="seg">Segunda-Feira</option>
                        <option class="terca" value="ter">Terça-Feira</option>
                        <option class="quarta" value="qua">Quarta-Feira</option>
                        <option class="quinta" value="qui">Quinta-Feira</option>
                        <option class="sexta" value="sex">Sexta-Feira</option>
                        <option class="sabado" value="sab">Sábado</option>
                        <option class="domingo" value="dom">Domingo</option>
                        </select>
                    </p>
                    
                    <div class="horarios form-group">
                        <label  style="color:white;">Horarios de Trabalho</label>
                        <select multiple name="horas[]"class="form-control" id="exampleFormControlSelect2" style="height:300px; width:168px;">
                            <option>8:30 </option>
                            <option>9:00 </option>
                            <option>9:30 </option>
                            <option>10:00</option>
                            <option>10:30</option>
                            <option>11:00</option>
                            <option>11:30</option>
                            <option>12:00</option>
                            <option>12:30</option>
                            <option>13:00</option>
                            <option>13:30</option>
                            <option>14:00</option>
                            <option>14:30</option>
                            <option>15:00</option>
                            <option>15:30</option>
                            <option>16:00</option>
                            <option>16:30</option>
                            <option>17:00</option>
                            <option>17:30</option>
                            <option>18:00</option>
                            <option>18:30</option>
                            <option>19:00</option>
                            <option>19:30</option>
                        </select>
                    </div>  
                </div>    
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
    <script src="js/toggle.js"></script>
</body>
</html>