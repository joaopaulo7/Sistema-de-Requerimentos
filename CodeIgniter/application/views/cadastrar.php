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
            <form method="POST" action="cadastrar/fazercadastro">
            
            
            	 <?php echo form_error('nome'); ?>
                <label style = "color: white;" for="Nome" class="col-sm-2-control-label">
                    Nome:
                </label>
                	<div class="col-sm-10-control-label">
                <input type="text" id="nome" name="nome">
                </div>
                
                <?php echo form_error('cadastro_identificador'); ?>
                <label style = "color: white;" for="Cadastro Identificador" class="col-sm-2-control-label">
                    Número Cadastro:
                </label>
                	 	<div class="col-sm-10-control-label">
                <input type="text" id="cadastro_identificador" name="cadastro_identificador">
                	</div>
                
                <!-- O departamento deve ser feio por meio de 
                dropdowns tendo os nomes pré determinados-->
               
               <?php echo form_error('departamento'); ?> 
                 <label style = "color: white;" for="Email" class="col-sm-2-control-label">
                Área:
                 </label>

				<select name = "area">
					 <option style = "color: black;" value="Geral">Geral</option>
					 <option style = "color: black;" value="Informática">Informática</option>
 					 <option style = "color: black;" value="Edificações">Edificações</option>
					 <option style = "color: black;" value="Mecatrônica">Mecatrônica</option>
				</select><br>
				
                <?php echo form_error('funcao'); ?>
                 <label style = "color: white;" for="Email" class="col-sm-2-control-label">
                Função:
                 </label>
				<select name = "funcao">
					 <option style = "color: black;" value="diretor">Diretor</option>
					 <option style = "color: black;" value="coordenador">Coordenador</option>
 					 <option style = "color: black;" value="professor">Professor</option>
					 <option style = "color: black;" value="aluno">Aluno</option>
				</select><br>
                
                
                <?php echo form_error('email'); ?>
                <label style = "color: white;" for="Email" class="col-sm-2-control-label">
                    E mail:
                </label>
                	<div class="col-sm-10-control-label">
                <input type="email" id="email" name="email">
                	</div>
                
                <?php echo form_error('senha'); ?>
                <label style = "color: white;" for="Senha" class="col-sm-2-control-label">
                    Senha:
                </label>
                <div class="col-sm-10-control-label">
                <input type="password" name="senha" id="senha">
                </div>
                
                <?php echo form_error('confsenha'); ?>
                <label style = "color: white;" for="Confirmar Senha" class="col-sm-2-control-label" >
                    Confirmar Senha:
                </label>
                <div class="col-sm-10-control-label">
                <input type="password" id="confsenha" name="confsenha">
                </div>
                
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
