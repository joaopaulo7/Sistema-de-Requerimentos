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
            <form method="POST" action="cadastrar/fazercadastro">
            
            
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
                <label for="Departamento">
                    Departamento:
                </label>
                <input type="text" id="departamento" name="departamento"><br>
                
                
                <!-- O departamento deve ser feio por meio de 
                dropdowns tendo os nomes pré determinados-->
                <?php echo form_error('funcao'); ?>
                <label for="Funcao">
                    Função:
                </label>
                <input type="text" id="funcao" name="funcao"><br>
                
                
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
                
                
                <?php echo form_error('senha'); ?>
                <label for="Confirmar Senha">
                    Confirmar Senha:
                </label>
                <input type="password" id="confsenha" name="confsenha"><br>
                
                
                <button type="submit">
                    Enviar
                </button>
            </form>
        </div>
    </body>
</html>
