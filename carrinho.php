
<?php
    require_once 'conecta.php';
?>
<!doctype html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8">
    <title>Seu Carrinho</title>
  </head>
  <body>
      <p>Carrinho de Compras</p><br/><br/>
      <p>Meus produtos escolhidos são:</p><br/><br/>
    <?php
    if(isset($_POST['id_txt'])){
        echo '<p>O ID do Produto é: '.$_POST['id_txt'].' </p>';
        $numRegistro = $_POST['id_txt'];
        $consulta = "select * from produtos where id = $numRegistro ";
        $resultado = mysqli_query($conexao, $consulta);
        $linha = mysqli_fetch_array($resultado);
        
        echo "<h3>Produto: </h3>";
        echo 'ID: '.$linha['id'].'<br>';
        echo "Nome: ".$linha['nome'].'<br>';
            
        
    }
    ?>
  </body>
</html>