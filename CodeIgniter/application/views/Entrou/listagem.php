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
         <table>
  				<tr>
    				<th>Criador</th>
  					<th>Área</th>
  					<th>Data</th>
					<th>Tipo</th>
					<th>pdf</th>
  				</tr>
      	   <?php 
       	 		foreach($listavis as $form){
     	   			echo '<tr>
    								<td>'.$form->proponente_da_viagem.'</td>
  						 			<td>'.$form->proponente_da_viagem.'</td>
  						 			<td>'.$form->data_preenchimento.'</td>
									<td>'.$form->tipo_visita.'</td>
									<td><a href="#" > phpf </td>
  								</tr>';
       	 		}
       	 ?>
        </table>
        </div>
                <div>
         <table>
  				<tr>
    				<th>Professor Substituido</th>
  					<th>Professor Substituto</th>
  					<th>Materia</th>
					<th>Motivo</th>
					<th>pdf</th>
  				</tr>
      	   <?php 
       	 		foreach($listasubs as $form){
     	   			echo '<tr>
    								<td>'.$this->ListagemModel->getProf0($form->materia).'</td>
  						 			<td>'.$this->ListagemModel->getProf($form->professor_substituto).'</td>
  						 			<td>'.$this->ListagemModel->getMateria($form->materia).'</td>
									<td>'.$form->motivo.'</td>
									<td><a href="#" > phpf </td>
  								</tr>';
       	 		}
       	 ?>
        </table>
        </div>
   </body>
</html>