<?php
session_start();
require_once('conexao.php');

    $data = $_SESSION['dataCancelar'];
    if(isset($_POST['codHoraH'])){
        $hora = $_POST['codHoraH'];
    }
    if(isset($_POST['codHoraP'])){
        $hora = $_POST['codHoraP'];
    }
    $vagas = $_POST['quantasVagas'];
    $contador = '1';
    
    if($vagas == '1'){
    $sql = "insert into agenda(data_agenda, hora) values ('$data','$hora')";
    $query = $mysqli->query($sql)or die($mysqli->error);
        
echo "<script>window.location.href='../disponivelServ.php'</script>";

    }else if ($vagas == '2'){

        while ($contador <= '2'){
        $sql = "insert into agenda(data_agenda, hora) values ('$data','$hora')";
        $query = $mysqli->query($sql)or die($mysqli->error);
    
        $contador++;
   
            echo "<script>window.location.href='../disponivelServ.php'</script>";
    }
}
?>