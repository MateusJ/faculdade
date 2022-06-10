<?php
require_once('conexao.php');
session_start();

$dia = $_POST['diaSem'];
$cliente = $_SESSION['cod'];

if (isset($_POST['codHoraH'])){
    $hora = $_POST['codHoraH'];
}else{
    $hora = $_POST['codHoraP'];
}
if (isset($_POST['codCabelo'])){
$cabelo = $_POST['codCabelo'];

$result_usu =  "SELECT * FROM cabelo WHERE nome LIKE '$cabelo'";
    $resultado_usu = mysqli_query($mysqli, $result_usu);
    while($row_usu = mysqli_fetch_assoc($resultado_usu)){
        $_SESSION['codCabelo'] = $row_usu['cod'];
    }

}
if (isset($_POST['codBarba'])){
$barba = $_POST['codBarba'];

$result_usu =  "SELECT * FROM barba WHERE nome LIKE '$barba'";
    $resultado_usu = mysqli_query($mysqli, $result_usu);
    while($row_usu = mysqli_fetch_assoc($resultado_usu)){
        $_SESSION['codBarba'] = $row_usu['cod'];
    }

}   
if (isset($_SESSION['codCabelo']) && isset($_SESSION['codBarba'])){
    $codCabelo = $_SESSION['codCabelo'];
    $codBarba = $_SESSION['codBarba'];

    $sql = "insert into agenda(data_agenda, hora, cliente, cabelo, barba) values ('$dia','$hora','$cliente','$codCabelo', '$codBarba')";
    $query = $mysqli->query($sql)or die($mysqli->error);

} else if (isset($_SESSION['codCabelo'])){
    $codCabelo = $_SESSION['codCabelo'];
    $sql = "insert into agenda(data_agenda, hora, cliente, cabelo) values ('$dia','$hora','$cliente','$codCabelo')";
    $query = $mysqli->query($sql)or die($mysqli->error);

} else {
    $codBarba = $_SESSION['codBarba'];
    $sql = "insert into agenda(data_agenda, hora, cliente, barba) values ('$dia','$hora','$cliente','$codBarba')";
    $query = $mysqli->query($sql)or die($mysqli->error);
}
        
        

if(!$query){
    echo "<script>alert('erro!')</script>";
}else{
    $_SESSION['modalS1'] = '1';
    echo "<script>window.location.href='../indexAgen.php'</script>";
}