<?php
session_start();
unset($_SESSION['emailUsu']);
unset($_SESSION['senhaUsu']);
unset($_SESSION['emailFun']);
unset($_SESSION['senhaFun']);

if(session_destroy()){
    header("Location: index.php");
}
?>