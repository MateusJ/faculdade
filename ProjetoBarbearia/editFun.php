<?php
session_start();
require_once('php/conexao.php');
 function data($data){
    return date("d/m/Y", strtotime($data));
}
$cod = $_POST['codEx'];
echo $cod;
?>
<html>
<head>
<title>Diones o Barbeiro</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet"> 

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="fonts/fontawesome/css/all.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    

    <!-- Theme Style -->
    <link rel="stylesheet" href="css/style.css">    
</head>
<body class="site-herocad overlay" data-stellar-background-ratio="0.5" style="background-image: url(images/tijolin.png); background-attachment: fixed;">
  	<div class="preto">
		<h1 class="preto">EDITAR</h1>
		<br>
		<?php
		
		$result_usu =  "SELECT * FROM funcionario";
		$resultado_usu = mysqli_query($mysqli, $result_usu);
		while($row_usu = mysqli_fetch_assoc($resultado_usu)){
  		if($row_usu['cod'] == $cod){
    		$_SESSION["codFun"] = $cod;?>
			<div class="ce">
			<form class="sdc bordaCad"method="post" action="php/excluirFun" enctype="multipart/form-data">
				
				<p>
        			<label class="label_1">Nome: </label>
        			<?php echo $row_usu['nome'];?>
    			<p>
				<p>
        			<label class="label_1">Email: </label>
        			<input id="emailFun" name="emailFun" type="text" value="<?php echo $row_usu['email'];?>" >
    			<p>
				<p>
        			<label class="label_1">Telefone: </label>
        			<input id="telFun" type="text" name="telFun" value = "<?php echo $row_usu['telefone'];?>">
    			<p>
				<p>
        			<label class="label_1">Cargo: </label>
        			<input id="cargoFun" type="text" name="cargoFun" value = "<?php echo $row_usu['cargo'];?>">
    			<p>
				<p>
        			<label class="label_1">Aniversario: </label>
        			<?php echo data($row_usu['data_nasc']);?>
    			<p>
				<p>
        			<label class="label_1">CPF:  </label>
        			<?php echo $row_usu['cpf'];?>
    			<p>
				<p>
        			<label class="label_1">RG: </label>
        			<?php echo $row_usu['rg'];?>
    			<p>
				<p>
        			<label class="label_1">Data de Emissão </label>
        			<?php echo data($row_usu['data_emissao']);?>
    			<p>
				
				
				<button type="submit" name="editFun" class="btn btn-warning "> Editar</button>
				<button type="submit" name="excluirFun" class="btn btn-warning "> Excluir</button>
			</form>
			</div>
		<?php }}?>
</div>
</body>
</html>