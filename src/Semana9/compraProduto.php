<!DOCTYPE html>

<html>
<?php
session_start();
use DAO\ProdutoDAO;
use Classes\Produto;

require_once 'DAO\ProdutoDAO.php';
require_once 'Classes\Produto.php';

//include connection
include __DIR__ . "\Config\pdo.php";

$produtoDAO = new ProdutoDAO($pdo);

$produto = $produtoDAO->buscarPorId(intval($_GET['id']));

if(!isset($_SESSION['qtd'])){
    $_SESSION['qtd'] = $produto['qtd_estoque'];
}

?>

<head>
    <t1>Comprar Produto </t1>
    <meta http-equiv="refresh" content="http://localhost:8000/compraProduto.php?id=<?php $_GET['id'] ?>">
</head>
<body>
<form method="POST">

    <p>
        <label for="nome">Nome : </label>
        <output><?php echo $produto['nome'] ?></output>
    </p>
    <p>
        <label for="preco">Preco: </label>
        <output> <?php echo $produto['preco'] ?></output>
    </p>
    <p>
        <label for="qtd_estoque">Quantidade Disponível:</label>
        <input type="number" id="qtd_desejada" name="qtd_desejada"  value="<?php echo $produto['qtd_estoque'] ?>">
    </p>
    <input type="submit" name="Salvar" value="Salvar">
</form>
<?php

if(isset($_POST['Salvar'])){

        $mensagem = $produtoDAO->atualizarQtdVendida($produto['id'], $produto['qtd_estoque'], $_POST['qtd_desejada']);
        if ($mensagem === "Compra realizada com sucesso!") {
            $produto['qtd_estoque'] -= $_POST['qtd_desejada'];
//            echo "qtd_estoque = ".$produto['qtd_estoque'].PHP_EOL;
//            $_SESSION['qtd'] = $produto['qtd_estoque'];
//            echo "qtd = ".$_SESSION['qtd'].PHP_EOL;
        }
}
?>
<p>
    <label for="mensagem">Mensagem: </label>
    <output> <?php echo $mensagem ?></output>
</p>
</body>
</html>
