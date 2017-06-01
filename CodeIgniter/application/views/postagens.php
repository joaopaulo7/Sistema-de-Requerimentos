<!DOCTYPE html>
<html lang="pt-br"> 
  <head>
      <meta charset="utf-8">
      <title>Meu blog</title>  
  </head>
   <body>
           <h2>Olá.</h2>
  <?php
     foreach($postagens as $post){
      echo "<h3>" . $post->titulo . "</h3>";
      echo "<p>" . $post->texto . "</p>";
      echo "<p>" . $post->dataCadastro . "</p>";
      echo "<a href='../login/logout'> asdasd";
      echo "<hr>";
     }
     ?>
   </body>
</html>