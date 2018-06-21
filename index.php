<?php
    include 'conecta.php';
?>
<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="loja.css">
<html>
    <head>
        <meta charset="UTF-8">
        <title>Loja Virtual</title>
    </head>
    <body>
           
        <form method="post" action="index.php">
            <table width="800px" border="4px" bordercolor="#000000">
            <tr id="buscar">
                <td id="vazia" colspan="5"></td>
                <!--<td></td>
                <td></td>
                <td></td>
                <td></td>-->
                <td><h1>Buscar: </h1></td>
                <td><input id="caixa" type="text" name="buscar"/></td>
                <td><input id="botao" type="submit" name="btbuscar" value="Buscar"/></td>
            </tr>
            <tr><td colspan="8"><img id="gif" src="imagens/Loja-Virtual.gif"/></td></tr>
            <tr  id="titulo" text-align="center">
                <td valign="middle" align="center" colspan="8">LISTA DE PRODUTOS</td>
                
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
                <td><?php echo "R$ ".$preco; ?>,00</td>
                <td class="quantidade"><?php echo $quant; ?></td>
                <td><?php echo $data; ?></td>
                <td>
                    <form method="get" action="carrinho.php">
                        <input type="hidden" name="id_txt" value="<?php echo $id ?>" />
                        <input type="submit" name="comprar" 
                        value="Comprar"/>
                    </form>
                </td>
            </tr>
            <?php } ?>  
        </table>
          
        </form>
        
        
    </body>
</html>
