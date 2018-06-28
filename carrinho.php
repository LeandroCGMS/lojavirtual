
<?php
//Nova edição pra ver o que será commitado
//Mais um teste do que será commitado e enviado
    require_once 'conecta.php';
?>
<!doctype html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="loja.css">
    <title>Carrinho de Compras</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!-- jQuery library -->
<script src="js/jquery-3.3.1.min.js"></script>
  </head>
  <body class="bg-dark">
      <p>Carrinho de Compras</p><br/><br/>
      <p>Meus produtos escolhidos são:</p><br/><br/>
    <?php
    
    if(isset($_POST['id_txt'])){
        
        $id = $_POST['id_txt'];
        $nome = $_POST['nome'];
        $preco = $_POST['preco'];
        $quantidade = $_POST['quantidade'];
        $meucarrinho[] = array('id' => $id, 'nome' => $nome, 'preco' => $preco, 
            'quantidade' => $quantidade);
        
    }
    session_start();
    if(isset($_SESSION['carrinho'])){
        $meucarrinho = $_SESSION['carrinho'];
        if(isset($_POST['id_txt'])){
            $id = $_POST['id_txt'];
            $nome = $_POST['nome'];
            $preco = $_POST['preco'];
            $quantidade = $_POST['quantidade'];
            $pos = -1;
            for($i = 0; $i < count($meucarrinho); $i++) {
                if($id == $meucarrinho[$i] ['id']){
                    $pos = $i;
                }
            }
            $meucarrinho[] = array('id' => $id, 'nome' => $nome, 'preco' => $preco, 
            'quantidade' => $quantidade);
        
        }
        
    }
    
    if(isset($meucarrinho)) $_SESSION['carrinho'] = $meucarrinho;
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
          <?php if(isset($meucarrinho)) {
              $total = 0;
              for($i = 0; $i < count($meucarrinho); $i++) {
               
          ?>
          <tr>
              <td class="produtos"><?php echo $meucarrinho[$i]['nome']; ?></td>
              <td class="produtos"><?php echo "R$ ".number_format($meucarrinho
                      [$i]['preco'],2,',','.'); ?></td>
              <td class="produtos"><?php echo $meucarrinho[$i]['quantidade']; ?></td>
              <?php
              $subtotal = $meucarrinho[$i]['preco'] * $meucarrinho[$i]
                      ['quantidade'];
              $total += $subtotal;
              ?>
              <td class="produtos"><?php echo "&nbsp;R$ "
              .number_format($subtotal,2,',','.'); ?></td>
          </tr>
          <?php 
            }
          }
          ?>
          <tr>
              <td colspan="3" class="carrinho">TOTAL:&nbsp;</td>
              <td class="car_tit"><?php if(isset($total)) echo "&nbsp;R$ "
              .number_format($total,2,',','.'); ?></td>
          </tr>
      </table>
      <a class="btn btn-primary" href="index.php">Voltar</a>
  </body>
</html>