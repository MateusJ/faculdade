<?php
require_once('conexao.php');

if (isset($_POST['novoServ'])){
    $nome = $_POST['nomeServ'];
    $descricao = $_POST['descServ'];
    $valor = $_POST['valorServ'];
    $tipo = $_POST['tipoServ'];

    if ($tipo == "false"){
        $sql = "insert into cabelo(nome, descricao, valor) values ('$nome','$descricao','$valor')";
        $query = $mysqli->query($sql)or die($mysqli->error);
    }else if ($tipo == "true"){
        $sql = "insert into barba(nome, descricao, valor) values ('$nome','$descricao','$valor')";
        $query = $mysqli->query($sql)or die($mysqli->error);
    }    
        if(!$query){
            echo "<script>alert('erro!')</script>";
        
        }else{
            echo "<script>alert('Cadastrado com sucesso!')</script>";
            echo "<script>window.location.href='../adm.php'</script>";
        }

}
?>