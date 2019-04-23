<?php

include ('./php/conexao.php');
$resposta1 = 0;
$resposta2 = 0;
$resposta3 = 0;
$resposta4 = 0;
$resposta5 = 0;

$filtro = filter_input(INPUT_GET, "opcaoAv");

$parametro = filter_input(INPUT_GET, "parametro");

$select_equipe = "SELECT count(resposta_1) as 'r1',count(resposta_2) as 'r2',count(resposta_3) as 'r3',count(resposta_4) as 'r4',count(resposta_5) as 'r5',b.equipe FROM ligacao b
INNER JOIN resposta a ON a.ligacao = b.id_ligacao
where b.equipe = '$parametro'";

$select_campanha = "SELECT count(resposta_1) as 'r1',count(resposta_2) as 'r2',count(resposta_3) as 'r3',count(resposta_4) as 'r4',count(resposta_5) as 'r5',b.campanha FROM ligacao b
INNER JOIN resposta a ON a.ligacao = b.id_ligacao
where b.campanha='$parametro'";

$select_geral = "SELECT count(resposta_1) as 'r1',count(resposta_2) as 'r2',count(resposta_3) as 'r3',count(resposta_4) as 'r4',count(resposta_5) as 'r5' from resposta";

$select_agente = "SELECT count(resposta_1) as 'r1',count(resposta_2) as 'r2',count(resposta_3) as 'r3',count(resposta_4) as 'r4',count(resposta_5) as 'r5',c.nome FROM ligacao b
INNER JOIN resposta a ON a.ligacao = b.id_ligacao
INNER JOIN funcionario c ON c.id_funcionario = b.funcionario
where c.nome = '$parametro'";

if($filtro != ""){
    if ($filtro == "equipe"){
        $resultado = mysqli_query($conn, $select_equipe);
    }
    else if ($filtro == "agente"){
        $resultado = mysqli_query($conn, $select_agente);
    }
    else if ($filtro == "campanha"){
        $resultado = mysqli_query($conn, $select_campanha);
    }
}else{
    $resultado = mysqli_query($conn, $select_geral);
    
}

while($dado = $resultado -> fetch_array()){  
    $resposta1 = $dado['r1'];  
    $resposta2 = $dado['r2'];
    $resposta3 = $dado['r3'];
    $resposta4 = $dado['r4'];
    $resposta5 = $dado['r5'];
}

if($resposta1 == 0 && $resposta2 == 0 && $resposta3 == 0 && $resposta4 == 0 && $resposta5 == 0){
    $url = './option_auto.php';
    echo '<META HTTP-EQUIV=Refresh CONTENT="0.; URL=' . $url . '">';
    echo "<script>alert('Dados não encontrados!');</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <title>Document</title>
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label>Filtrar por:</label>
        
             <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="opcaoAv" id="campanha" value="campanha">
                <label class="form-check-label" for="campanha">Campanha</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="opcaoAv" id="equipe" value="equipe">
                <label class="form-check-label" for="equipe">Equipe</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="opcaoAv" id="agente" value="agente">
                <label class="form-check-label" for="agente">Agente</label>
              </div>

	<input type="text" name="parametro"> 
	<input type="submit" value="buscar"> 
</form>


<div style="width: 900px; height: 500px;">
<canvas id="pie-chart"></canvas>
<script src="path/to/chartjs/dist/Chart.js"></script>
<script>
    new Chart(document.getElementById("pie-chart"), {
    type: 'pie',
    data: {
        labels: ["Respota1", "Resposta2", "Resposta3", "Resposta4", "Resposta 5"],
        datasets: [{
        label: "Population (millions)",
        backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9", "#c45850"],
        data: [  <?php echo $resposta1 ?>, <?php echo $resposta1 ?>, <?php echo $resposta1 ?>,<?php echo $resposta4 ?>, <?php echo $resposta5 ?>]
        }]
    },

});
</script>
</div>

</body>
</html>




                    
       