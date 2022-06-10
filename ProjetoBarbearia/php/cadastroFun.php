<?php
require_once('conexao.php');
session_start();

if (isset($_POST['cadastrarFun'])){
    $nome = $_POST['nomeFun'];
    $email = $_POST['emailFun'];
    $conEmail = $_POST['conEmailFun'];
    $senha = $_POST['senhaFun'];
    $conSenha = $_POST['conSenhaFun'];
    $telefone = $_POST['telefoneFun'];
    $cargo = $_POST['cargoFun'];
    $dataNasc = $_POST['nascFun'];
    $cpf = $_POST['cpfFun'];
    $rg = $_POST['rgFun'];
    $dataEmi = $_POST['dataEmi'];

    $testaEmail = $mysqli->query("SELECT COUNT(*) FROM funcionario where email = '{$email}'");
    $linha = $testaEmail->fetch_row();
    

    if ($linha[0] > 0){
        $_SESSION['modalS1'] = '1';
        echo "<script>window.location.href='../cadastrarFun.php'</script>";
    }else if (($senha != $conSenha) or ($email != $conEmail)) {
        
        $_SESSION['modalS'] ='1';
        echo "<script>window.location.href='../cadastrarFun.php'</script>";
    }else{
        $sql = "insert into funcionario(nome, email, senha, telefone, cargo, data_nasc, cpf, rg, data_emissao) values ('$nome','$email','$senha','$telefone','$cargo','$dataNasc','$cpf','$rg','$dataEmi')";
        $query = $mysqli->query($sql)or die($mysqli->error);
        
        if(!$query){
            echo "<script>alert('erro!')</script>";
        
        }else{
            echo "<script>alert('Cadastrado com sucesso!')</script>";
            echo "<script>window.location.href='../adm.php'</script>";
        }
    }

}
?>