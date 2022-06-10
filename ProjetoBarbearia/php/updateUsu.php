<?php
require_once('conexao.php');
session_start();


    $cod = $_SESSION['cod'];
    $nome = $_POST['nomeEdit'];
    $senha = $_POST['senhaEdit'];
    $conSenha = $_POST['consenhaEdit'];
    $telefone = $_POST['telefoneEdit'];
    $dataNasc = $_POST['nascEdit'];
    $preferencias = $_POST['prefEdit'];

        $sql = "UPDATE cliente set nome='$nome',senha='$senha',telefone='$telefone',data_nasc='$dataNasc',preferencias='$preferencias' WHERE cod = '$cod'";
        $query = $mysqli->query($sql)or die($mysqli->error);

        if ($senha != $conSenha) {
            $_SESSION['modalS'] = '1';
            echo "<script>window.location.href='../usuarios.php'</script>";
        }else{
            $resultUsu = "SELECT * FROM cliente WHERE email = '".$_SESSION['emailUsu']."'";
            $resultadoUsu = mysqli_query($mysqli, $resultUsu);
            $linhaUsu = mysqli_fetch_assoc($resultadoUsu);
            
            $_SESSION['nome'] = $linhaUsu['nome'];
            $_SESSION['senha'] = $linhaUsu['senha'];
            $_SESSION['telefone'] = $linhaUsu['telefone'];
            $_SESSION['nascimento'] = $linhaUsu['data_nasc'];
            $_SESSION['preferencias'] = $linhaUsu['preferencias'];
            
            if(!$query){
                echo "<script>alert('erro!')</script>";
            
            }else{
                echo "<script>window.location.href='../usuarios.php'</script>";
            }
        }
?>