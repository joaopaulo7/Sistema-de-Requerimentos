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
	 	<ul class="nav navbar-nav">
    		<li><h1>Sistema de Requerimentos</h1>
    		<li ><?php echo anchor('login', 'Login', 'Login') ?>  	
   	 </ul>
    	</nav>
    </nav>
			<div class="row">
					<div id="conteudo" class="col-md-6 col-md-offset-3">
            <?php echo '<form method="POST" action="'.base_url('cadastrar/fazerCadastro').'">'?>
            
            
            	 <?php echo form_error('nome'); ?>
                <label for="Nome">
                    Nome:
                </label>
                <input type="text" id="nome" name="nome"><br>
                
                
                <?php echo form_error('cadastro_identificador'); ?>
                <label for="Cadastro Identificador`">
                    Número Cadastro:
                </label>
                <input type="text" id="cadastro_identificador" name="cadastro_identificador"><br>
                
                
                <!-- O departamento deve ser feio por meio de 
                dropdowns tendo os nomes pré determinados-->
                <?php echo form_error('departamento'); ?>
                Area:
				<select name = "area">
					 <option value="Geral">Geral</option>
					 <option value="Informática">Informática</option>
 					 <option value="Edificações">Edificações</option>
					 <option value="Mecatrônica">Mecatrônica</option>
				</select><br>
				
                <?php echo form_error('funcao'); ?>
                Função:
				<select name = "funcao">
					 <option value="diretor">Diretor</option>
					 <option value="coordenador">Coordenador</option>
 					 <option value="professor">Professor</option>
					 <option value="aluno">Aluno</option>
				</select><br>
                
                
                <?php echo form_error('email'); ?>
                <label for="Email">
                    E mail:
                </label>
                <input type="email" id="email" name="email"><br>
                
                
                <?php echo form_error('senha'); ?>
                <label for="Senha">
                    Senha:
                </label>
                <input type="password" name="senha" id="senha"><br>
                
                
                <?php echo form_error('confsenha'); ?>
                <label for="Confirmar Senha">
                    Confirmar Senha:
                </label>
                <input type="password" id="confsenha" name="confsenha"><br>
                
                
                <button type="submit">
                    Enviar
                </button>
            </form>
        </div>
        <div class="copyright">
			<div class="col-md-12">
				<p>Grupo Dedicação, Cefet-mg,Varginha &copy; Todos os direitos reservados.</p>
		  	</div>
		  </div>
      </body>
</html>
    </body>
</html>
