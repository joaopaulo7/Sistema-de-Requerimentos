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
    </head>
    <body>
    	<div>
			<h1>Todos os Formulários:</h1>    	
    	</div>
        <div>
        <?php
        if(isset($listavis)){
        	echo "
        <div>
         <table>
  				<tr>
    				<th>Criador</th>
  					<th>PDF</th>
  					<th>Confirmar</th>
  				</tr>";
       	 		foreach($listavis as $form){
     	   			echo '<tr>
    								<td>'.$form->proponente_da_viagem.'</td>
									<td><a href="confirmacoes/confVis/'.$form->idFormulario.'"> phpf </a></td>
									<td><a href="#" > Confirmar</a> </td>
  								</tr>';
       	 		}
       	 }
       	 ?>
        </table>
        </div>
        <?php
        if(isset($listasubs)){
        	echo "
        <div>
         <table>
  				<tr>
    				<th>Criador</th>
  					<th>PDF</th>
  					<th>Confirmar</th>
  				</tr>";
       	 		foreach($listasubs as $form){
     	   			echo '<tr>
    								<td>'.$this->ConfirmacoesModel->getProf($form->materia).'</td>
									<td><a href="confirmacoes/confSubs/'.$form->idFormularioSubs.'" > phpf </a></td>
									<td><a href="#" > Confirmar </a></td>
  								</tr>';
       	 		}
       	 }
       	 ?>
        </table>
        </div>
   </body>
</html>