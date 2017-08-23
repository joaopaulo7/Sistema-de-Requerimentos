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
        <?php 
        		echo link_tag('Assets/css/bootstrap.min.css');
        		echo link_tag('Assets/css/estilo.css');
        ?>
    </head>
    <body>
	 <nav class="navbar navbar-default" role="navigation">
	 	<h1>Sistema de coordenação de visitas técnicas e substituições de professores</h1>
   </nav>
	
			<div class="row">
					<div id="box" class="col-md-6 col-md-offset-3">
								
							<?php echo $erro; ?>	
								
							<?php echo '<form method="POST" action="'.base_url('Entrou/alterarFuncoes/alterar').'">'?>
							
								 <label style = "color: white;" for="Diretor" class="col-sm-2-control-label">
								Diretor:
								 </label>
								<select name = "diretor">
									 <?php
									 	echo '<option style = "color: black;" value = "'.$diretor->cadastro_identificador.'">'.$diretor->nome.'</option>';
									 	foreach( $pessoas as  $pessoa){
											echo '<option style = "color: black;" value = "'.$pessoa->cadastro_identificador.'">'.$pessoa->nome.'</option>';
									 	}
									 ?>
								</select><br>
							
								<label style = "color: white;" for="CoordInfo" class="col-sm-2-control-label">
								Coordenador Informática:
								</label>
								<select name = "coordInfo">
									 <?php
									 	echo '<option style = "color: black;" value = "'.$coordInf->cadastro_identificador.'">'.$coordInf->nome.'</option>';
									 	foreach( $pessoasInfo as  $pessoa){
											echo '<option style = "color: black;" value = "'.$pessoa->cadastro_identificador.'">'.$pessoa->nome.'</option>';
									 	}
									 ?>
								</select><br>
								
								<label style = "color: white;" for="CoordEdif" class="col-sm-2-control-label">
								Coordenador Edificações:
								</label>
								<select name = "coordEdif">
									 <?php
									 	echo '<option style = "color: black;" value = "'.$coordEdifi->cadastro_identificador.'">'.$coordEdifi->nome.'</option>';
									 	foreach( $pessoasEdif as  $pessoa){
											echo '<option style = "color: black;" value = "'.$pessoa->cadastro_identificador.'">'.$pessoa->nome.'</option>';
									 	}
									 ?>
								</select><br>
								
								<label style = "color: white;" for="CoordMeca" class="col-sm-2-control-label">
								Coordenador Mecatrônica:
								</label>
								<select name = "coordMeca">
									 <?php
									 	echo '<option style = "color: black;" value = "'.$coordMecat->cadastro_identificador.'">'.$coordMecat->nome.'</option>';
									 	foreach( $pessoasMeca as  $pessoa){
											echo '<option style = "color: black;" value = "'.$pessoa->cadastro_identificador.'">'.$pessoa->nome.'</option>';
									 	}
									 ?>
								</select><br>
								
								<button style = "margin-left:50px;" type="submit">
									Cadastrar
								</button>
								
							</form>
						</div>
        
        			<div class="voltar">
        			<a style = "color: #2E8B57;">
                    >> Voltar à tela de Login <<
                </a>
        			</div>    
        <div class="copyright">
			<div class="col-md-12">
				<p>Grupo Dedicação, Cefet-MG - CAMPUS VIII / Unidade Varginha &copy; Todos os direitos reservados.</p>
		  	</div>
		  </div>
      </body>
</html>
    </body>
</html> 
