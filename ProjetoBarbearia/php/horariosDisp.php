<?php
session_start();
require_once('conexao.php');
$parametro = $_GET['parametro'];
$_SESSION['dataCancelar'] = $parametro;
    $sql = $mysqli->query("SELECT hora FROM AGENDA WHERE data_agenda = '{$parametro}'");

    while($resultado = $sql->fetch_assoc()){
        $array[] = $resultado['hora'];
    }
    
?>

<div class="horariosAtual form-group">
    
    
    <select class="form-control" id="codHoraH" name="codHoraH" style=" height:200px;" size="5" onchange="horaHoje()" >
        <?php
        date_default_timezone_set('America/Sao_Paulo');
        $hora = date('8:00');
        $horaAgr = date('H:i', strtotime('-60 minutes'));
        if (strtotime($horaAgr) > strtotime($hora)){
            $hora = date('H:i', strtotime('-30 minutes', strtotime($horaAgr)));
        }
        while (strtotime($hora) <= strtotime('19:00')){
            $hora = date('H:i', strtotime('+30 minutes',strtotime($hora)));
            $H = substr($hora,0,2);
            $min = substr($hora,3,4);
            if ($min >= '0' && $min < '30' ){
                $min = '30';
            } else if ($min >= '30'){
                $H = date('H', strtotime('+1 hour', strtotime($hora)));
                $min = '00';
            }
        
            $horaFinal = $H.':'.$min;

            $contagem = array_count_values($array);
            $resposta = $contagem[$horaFinal];

            if ($horaFinal < '12:00' || $horaFinal > '13:00'){
                if($resposta < 2){
                    ?><option value="<?php echo $horaFinal;?>"><?php echo $horaFinal;?></option><?php
                }
            }
        }?>
         
        </select>
        <br><br>
   
</div>
<!-- Fim dos horarios dia atual -->

<!-- Horarios dos proximos dias -->
<div class="proxDias form-group">
    

    <select class="form-control" id="codHoraP" name="codHoraP" style=" height:200px;" size="5" onclick="horaProx()">
    
        <?php
        date_default_timezone_set('America/Sao_Paulo');
        $hora = date('8:30');
        $outraHora = date('19:00');
        if (strtotime($horaAgr) > strtotime($hora)){
            $hora = date('H:i', strtotime('-30 minutes', strtotime($hora)));
        }
        
        while (strtotime($hora) <= strtotime('19:00')){
            $hora = date('H:i', strtotime('+30 minutes',strtotime($hora)));

            $contagem = array_count_values($array);
            $resposta = $contagem[$hora];

            if ($hora < '12:00' || $hora > '13:00'){
                if($resposta < 2){
                    ?><option value="<?php echo $hora;?>"><?php echo $hora;?></option><?php
                }
            }
        }
        ?>
    </select>

    
</div>
<!-- Fim dos horarios dos proximos dias-->
