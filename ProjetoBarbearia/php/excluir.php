<?php
session_start();
require_once('conexao.php');

        $cod = $_SESSION['cod'];
    
        $sql = "DELETE FROM cliente WHERE cod = '$cod'";
        $query = $mysqli->query($sql)or die($mysqli->error);
        
        if(!$query){
            echo "<script>alert('erro!')</script>";
        }else{
            echo "<script>alert('Excluido com sucesso!')</script>";
            echo "<script>window.location.href='../index.php'</script>";
            unset($_SESSION['emailUsu']);
            unset($_SESSION['senhaUsu']);
        }
    
?>
