<?php
session_start();
require_once('conexao.php');

if (isset($_POST['cabCod'])){
    $cod = $_POST['cabCod'];
    
    $sql = "DELETE FROM cabelo WHERE cod = $cod";
    $query = $mysqli->query($sql)or die($mysqli->error);
    
    if(!$query){
        echo "<script>alert('erro!')</script>";
    }else{
        echo "<script>alert('Excluido com sucesso!')</script>";
        
    }
}else if (isset($_POST['barbCod'])){
    $cod = $_POST['barbCod'];
    
    $sql = "DELETE FROM barba WHERE cod = $cod";
            $query = $mysqli->query($sql)or die($mysqli->error);
            
            if(!$query){
                echo "<script>alert('erro!')</script>";
            }else{
                echo "<script>alert('Excluido com sucesso!')</script>";
                
            }
}
?>