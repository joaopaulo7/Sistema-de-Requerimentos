<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Cadastro Sis.Req</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
		<div class="container">
		  <h2>Confirmações pendentes</h2>
		<div class="panel-group" id="accordion">
			<h4>Visitas técnicas</h4>
			<?php if(isset($listavis)){
				$i = 0;
				foreach($listavis as $form)
				{
					echo '
					<div class="panel panel-default">
					  <div class="panel-heading">
						<h4 class="panel-title">
						  <a data-toggle="collapse" data-parent="#accordion" href="#collapses'.$i.'">Formulário de '.$form->proponente_da_viagem.'</a>
						</h4>
					  </div>
						<div id="collapses'.$i.'" class="panel-collapse collapse">
							<div class="panel-body">'.
									"<p>Proponente da viagem: ".$form->proponente_da_viagem."
									<br> Local: ".$form->local."
									<br> Tipo: ".$form->tipo_visita."
									<br> data: ".$form->data."
									<br> Transporte: ".$form->transporte."
									<br> Horário de Saída: ".$form->horario_saida."
									<br> Horario de Chegada: ".$form->horario_chegada."
									<br> Local de chagada: ".$form->local_chegada."
									<br> Local de Saída: ".$form->local_saida."
									<br> Justificativa: ".$form->justificativa."
									<br> Objetivo Geral: ".$form->objetivo_geral."
									<br> Objetivo Específico: ".$form->objetivo_especifico."
									<br> Descrição: ".$form->descricao."
									<br> Avaliação: ".$form->avaliacao."
									<br> Data Preenchimento: ".$form->data_preenchimento."
									<br> Confirmação do Coordenador: ".$form->coordenador."
									<br> Confirmação do Diretor: ".$form->diretor;
						echo "</div>";
					echo "</div>";
				echo "</div>";
				$i++;
       	 		}
       	 }
       	 ?>
        <h4>Substituições</h4>
			<?php if(isset($listasubs)){
				$i = 0;
				foreach($listasubs as $form)
				{
					echo '
					<div class="panel panel-default">
					  <div class="panel-heading">
						<h4 class="panel-title">
						  <a data-toggle="collapse" data-parent="#accordion" href="#collapsev'.$i.'">Formulário de '.$form->professor.'</a>
						</h4>
					  </div>
					  <div id="collapsev'.$i.'" class="panel-collapse collapse">
						<div class="panel-body">'.
									"<p>Professor: ".$form->professor."<p>
									<br> Motivo: ".$form->motivo."
									<br> Tipo: ".$form->data_da_substituicao."
									<br> Horario: ".$form->horario_substituicao."
									<br> Materia: ".$form->materia."
									<br> Confrimação do Professor Substituto: ".$form->professor_substituto."
									<br> Confrimação do Coordenador: ".$form->coordenador;
						echo "</div>";
					echo "</div>";
					$i++;
       	 		}
       	 }
       	 ?>
        </div>
      </div>
   </body>
</html>
