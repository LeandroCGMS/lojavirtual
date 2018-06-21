<?php
/*
$conexao = mysql_connect('localhost', 'leandro', 'leandro') or
        die('Não foi possível conectar.');
$db = mysql_select_db('loja', $conexao) or die('Não foi possível conectar à base de dados.');*/

$conexao = mysqli_connect('localhost', 'leandro', 'leandro');
$db = mysqli_select_db($conexao, 'loja');


?>