
<?php
    require_once 'conecta.php';
?>
<!doctype html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="loja.css">
    <title>Seu Carrinho</title>
  </head>
  <body>
      <p>Carrinho de Compras</p><br/><br/>
      <p>Meus produtos escolhidos são:</p><br/><br/>
    <?php
    if(isset($_POST['id_txt'])){
        
        $id = $_POST['id_txt'];
        $nome = $_POST['nome'];
        $preco = $_POST['preco'];
        $quantidade = $_POST['quantidade'];
            
        
    }
    ?>
      <table>
          <tr>
              <td colspan="4" class="car_tit">PRODUTOS</td>
          </tr>
          <tr>
              <td class="car_subtit">NOME</td>
              <td class="car_subtit">PREÇO</td>
              <td class="car_subtit">QUANTIDADE</td>
              <td class="car_subtit">SUBTOTAL</td>
          </tr>
          <tr>
              <td class="produtos"><?php echo $nome; ?></td>
              <td class="produtos"><?php echo "R$ ".number_format($preco,2,',','.'); ?></td>
              <td class="produtos"><?php echo $quantidade; ?></td>
              <td class="produtos"><?php echo "&nbsp;R$ "
              .number_format($preco * $quantidade,2,',','.'); ?></td>
          </tr>
          <tr>
              <td colspan="3" class="carrinho">TOTAL:&nbsp;</td>
              <td class="car_tit"><?php echo "&nbsp;R$ "
              .number_format($preco * $quantidade,2,',','.'); ?></td>
          </tr>
      </table>
  </body>
</html>