<!DOCTYPE html>
<html>
<head>
    <t1>COMEX - Lista Produtos Compra</t1>
</head>
<body>
<h1>Produtos</h1>
<table  border="1" width="300" align="left">
    <tr>
    <th>Id</th>
    <th>Nome</th>
    <th>Preço</th>
    <th>Quant. Disponivel</th>
    </tr>
        <?php
        use DAO\ProdutoDAO;
        use Classes\Produto;

        require_once 'DAO\ProdutoDAO.php';
        require_once 'Classes\Produto.php';

        //include connection
        include __DIR__ . "\Config\pdo.php";

        //lista produtos

        $produtoDAO = new ProdutoDAO($pdo);

        $produtos = $produtoDAO->listarPorNome();

        foreach ($produtos as $chave => $produto) { ?>
    <tr>
        <td><a href="compraProduto.php?id=<?php echo $produto['id'] ?>"> <?php echo $produto['id'] ?> </a></td>
        <td><?php echo $produto['nome'] ?></td>
        <td><?php echo $produto['preco'] ?></td>
        <td><?php echo $produto['qtd_estoque'] ?></td>
    </tr>
<?php } ?>

</table>
</body>
</html>