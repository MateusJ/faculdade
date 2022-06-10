<?php
session_start();
require_once('conexao.php');
if(isset($_POST['excluirFun'])){
    $cod = $_SESSION['codFun'];
    
$sql = "DELETE FROM funcionario WHERE cod = $cod";
        $query = $mysqli->query($sql)or die($mysqli->error);
        
        if(!$query){
            echo "<script>alert('erro!')</script>";
        }else{
            echo "<script>alert('Excluido com sucesso!')</script>";
            
            unset($_SESSION['codFun']);
        }
}
if(isset($_POST['editFun'])){
    $cod = $_SESSION['codFun'];
    $email = $_POST['emailFun'];
    $tel = $_POST['telFun'];
    $cargo = $_POST['cargoFun'];

 
    $sql = "UPDATE funcionario set email = '$email', telefone = '$tel', cargo = '$cargo' where cod = '$cod'";
        $query = $mysqli->query($sql)or die($mysqli->error);

    if(!$query){
        echo "<script>alert('erro!')</script>";
    }else{
        echo "<script>alert('Excluido com sucesso!')</script>";
        
        unset($_SESSION['codFun']);
    }
}
?>