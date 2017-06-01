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
                <label for="Nome">
                    Nome:
                </label>
                <input type="text" id="nome" name="nome"><br>
                <label for="login">
                    Login:
                </label>
                <input type="text" id="login" name="login"><br>
                <label for="senha">
                    Senha:
                </label>
                <input type="password" name="senha" id="senha"><br>
                <button type="submit">
                    Enviar
                </button>
            </form>
        
        </div>
    </body>
</html>
