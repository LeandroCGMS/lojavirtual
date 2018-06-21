
<!doctype html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8">
    <title>Seu Carrinho</title>
  </head>
  <body>
      <p>Carrinho de Compras</p>
      <p>Meus produtos escolhidos são:</p>
    <?php
    if(isset($_GET['id'])){
        echo '<p>Produtos: '.$_GET['id'].' </p>';
    }
    ?>
  </body>
</html>