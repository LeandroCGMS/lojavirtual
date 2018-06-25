<?php
    include 'conecta.php';
?>
<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="loja.css">
<html>
<head>
<meta charset="UTF-8">
<title>Loja Virtual</title>
<link rel="stylesheet" type="text/css" href="loja.css">
<title>Seu Carrinho</title>
<link rel="stylesheet" href="bootstrap-4.1.1-dist/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
<script src="bootstrap-4.1.1-dist/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
<!-- jQuery library -->
<script src="js/jquery-3.3.1.min.js"></script>
    </head>
    <body class="bg-dark">
        <div class="form-group">
        <form method="post" action="index.php">
            <table width="800px" border="4px" bordercolor="#000000">
            <tr id="buscar">
                <td id="vazia" class="bg-dark" colspan="5"></td>
                <!--<td></td>
                <td></td>
                <td></td>
                <td></td>-->
                <td><h1>Buscar: </h1></td>
                <td><input class="form-control" id="caixa" type="text" name="buscar"/></td>
                <td><input class="btn btn-primary" type="submit" name="btbuscar" 
                           value="Buscar"/></form>
        </div>
        </td>
            </tr>
            <tr><td colspan="8"><img id="gif" src="imagens/Loja-Virtual.gif"/>
                </td></tr>
            <tr  id="titulo" text-align="center">
                <td valign="middle" align="center" colspan="8">LISTA DE PRODUTOS
                </td>
                
            </tr>
            <tr id="campos">
                <td>ID</td>
                <td>IMAGEM</td>
                <td>NOME</td>
                <td>DESCRIÇÃO</td>
                <td>PREÇO</td>
                <td>QUANTIDADE</td>
                <td>DATA</td>
                <td>ADICIONAR</td>
            </tr>
            <?php
                
            $consulta = mysqli_query($conexao, "SELECT * FROM produtos") 
                    or die("Erro.");
            
            if (isset($_POST['buscar'])){
                $consulta = mysqli_query($conexao, "SELECT * FROM produtos WHERE"
                        . " nome LIKE '%".$_POST['buscar']."%';");
            }
            
            while($linha = mysqli_fetch_assoc($consulta)) {
                $id = $linha['id'];
                $imagem = $linha['imagem'];
                $nome = $linha['nome'];
                $desc = $linha['descricao'];
                $preco = $linha['preco'];
                $quant = $linha['quantidade'];
                $data = $linha['data'];
                //$adicionar = '<a href="carrinho.php?id='.$linha['id'].'"title="'
                        //.$linha['id'].'">Adicionar ao Carrinho</a>';
            
            ?>
            
            <tr id="dados">
                <td><?php echo $id; ?></td>
                <td><img id="foto" src="<?php echo $imagem; ?>"/></td>
                <td><?php echo $nome; ?></td>
                <td class="quantidade"><?php echo $desc; ?></td>
                <td><?php echo "R$ ".number_format($preco,2,',','.'); ?></td>
                <td class="quantidade"><?php echo $quant; ?></td>
                <td><?php echo date("d/m/Y", strtotime($data)); ?></td>
                <td>
                    <form method="post" action="carrinho.php">
                        
                        <input type="hidden" name="id_txt" value="<?php echo $id ?>" >
                        <input type="hidden" name="nome" value="<?php echo $nome ?>" >
                        <input type="hidden" name="preco" value="<?php echo $preco ?>" >
                        <input type="hidden" name="quantidade" value="1" >
                        <input class="btn btn-success" type="submit" name="comprar" 
                        value="Comprar"/>
                        
                    </form>
                </td>
            </tr>
            <?php } ?>  
        </table>
            <p><a class="btn btn-danger" href="carrinho.php">Carrinho de Compras</a>
          
        
        
        
    </body>
</html>
