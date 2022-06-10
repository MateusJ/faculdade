<?php
session_start();
 require_once('conexao.php');

 if(isset($_POST['login'])){
 $email = $_POST['emailLog'];
 $senha = $_POST['senhaLog'];

 $sql = $mysqli->query("SELECT * FROM cliente WHERE email = '{$email}' and senha = '{$senha}'");
 $linhas = mysqli_num_rows($sql);

 $sqlF = $mysqli->query("SELECT * FROM funcionario WHERE email = '{$email}' and senha = '{$senha}'");
 $linhasF = mysqli_num_rows($sqlF);

if($linhas > 0){ 
  $_SESSION["emailUsu"] = $email;
  $_SESSION["senhaUsu"] = $senha;
       
        $resultUsu = "SELECT * FROM cliente WHERE email = '".$_SESSION['emailUsu']."'";
        $resultadoUsu = mysqli_query($mysqli, $resultUsu);
        $linhaUsu = mysqli_fetch_assoc($resultadoUsu);

        $_SESSION['cod']= $linhaUsu['cod'];
        $_SESSION['nome'] = $linhaUsu['nome'];
        $_SESSION['email'] = $linhaUsu['email'];
        $_SESSION['senha'] = $linhaUsu['senha'];
        $_SESSION['telefone'] = $linhaUsu['telefone'];
        $_SESSION['nascimento'] = $linhaUsu['data_nasc'];
        $_SESSION['preferencias'] = $linhaUsu['preferencias'];
        $_SESSION['observacoes'] = $linhaUsu['obs'];
    
  echo "<script>window.location.href='../indexAgen.php'</script>";
}else if($linhasF > 0){
  $_SESSION["emailFun"] = $email;
  $_SESSION["senhaFun"] = $senha;
  echo "<script>window.location.href='../adm.php'</script>";
}else{
  $_SESSION['modalS'] = '1';
  echo "<script>window.location.href='../index.php'</script>";
}
}
?>