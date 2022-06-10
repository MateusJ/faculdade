<?php
session_start();
require_once('conexao.php');

    $cod = $_POST['codEx'];
    
        $sql = "DELETE FROM cliente WHERE cod = '$cod'";
        $query = $mysqli->query($sql)or die($mysqli->error);
        
        if(!$query){
            echo "<script>alert('erro!')</script>";
        }else{
            
        }
?>