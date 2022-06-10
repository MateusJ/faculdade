<?php
require_once('conexao.php');
session_start();

if (isset($_POST['cadastro'])){
    $nome = $_POST['nomeCad'];
    $email = $_POST['emailCad'];
    $conEmail = $_POST['conEmailCad'];
    $senha = $_POST['senhaCad'];
    $conSenha = $_POST['conSenhaCad'];
    $telefone = $_POST['telefoneCad'];
    $dataNasc = $_POST['nascCad'];
    $preferencias = $_POST['prefCad'];
    $idadeMinima = date('Y', strtotime('-12 years'));
    $anoNasc = date('Y', strtotime($dataNasc));

    $testaEmail = $mysqli->query("SELECT COUNT(*) FROM cliente where email = '{$email}'");
    $linha = $testaEmail->fetch_row();
    

    if ($linha[0] > 0){
        echo "<script>alert('Email já cadastrado')</script>";
        echo "<script>window.location.href='../cadastro.php'</script>";
    }else if (($senha != $conSenha) or ($email != $conEmail)) {
        echo "<script>alert('Confirmação de senha ou email erradas.')</script>";
        echo "<script>window.location.href='../cadastro.php'</script>";
    }else if (strtotime($dataNasc) < 1920-01-01){
        echo "<script>alert('idade ta torta.')</script>";
        echo "<script>window.location.href='../cadastro.php'</script>";
    }else if ($anoNasc > $idadeMinima) {
        echo "<script>alert('Muito novo para utilizar este programa.')</script>";
        echo "<script>window.location.href='../cadastro.php'</script>";
    }else {
        $sql = "insert into cliente(nome, email, senha, telefone, data_nasc, preferencias) values ('$nome','$email','$senha','$telefone','$dataNasc','$preferencias')";
        $query = $mysqli->query($sql)or die($mysqli->error);
        
        if(!$query){
            echo "<script>alert('erro!')</script>";
        
        }else{
            $_SESSION["modalS"] = '1';
            $_SESSION["emailUsu"] = $email;
            $_SESSION["senhaUsu"] = $senha;
            $_SESSION['nome'] = $nome;
            $_SESSION['email'] = $email;
            $_SESSION['senha'] = $senha;
            $_SESSION['telefone'] = $telefone;
            $_SESSION['nascimento'] = $dataNasc;
            $_SESSION['preferencias'] = $preferencias;

            $resultUsu = "SELECT * FROM cliente WHERE email = '".$_SESSION['emailUsu']."'";
            $resultadoUsu = mysqli_query($mysqli, $resultUsu);
            $linhaUsu = mysqli_fetch_assoc($resultadoUsu);

            $_SESSION['cod']= $linhaUsu['cod'];
            $_SESSION['observacoes'] = $linhaUsu['obs'];

            echo "<script>window.location.href='../indexAgen.php'</script>";
            
        }
    }

}
?>