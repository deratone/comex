<!DOCTYPE html>
<html>
<head>
    <t1>Formulario Para Inserir Novo Produto</t1>
</head>
<body>
<form method="POST">
    <p>
        <label for="nome">Nome : </label>
        <input type="text" id="nome" name="nome">
    </p>
    <p>
        <label for="preco">Preco: </label>
        <input type="number" step="0.01" id="preco" name="preco">
    </p>
    <p>
        <label for="qtd_estoque">Quantidade em Estoque:</label>
        <input type="number" id="qtd_estoque" name="qtd_estoque">
    </p>
    <input type="submit" name="Salvar" value="Salvar">
</form>
<?php
use DAO\ProdutoDAO;
require_once 'DAO\ProdutoDAO.php';
if(isset($_POST['Salvar'])){
    //include connection
    include __DIR__ . "\Config\pdo.php";



    //faz o insert atraves da ProdutoDAO

    $produtoDAO = new ProdutoDAO($pdo);

    $produtoDAO->criar($_POST['nome'], $_POST['preco'], $_POST['qtd_estoque']);
}
?>
</body>
</html>
