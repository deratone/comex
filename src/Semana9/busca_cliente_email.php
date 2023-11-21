<!DOCTYPE html>
<html>
<head>
    <t1>COMEX - Visualização Clientes</t1>
</head>
<body>
<h1>Dados do Cliente</h1>
<table  border="1" width="1000" align="left">
    <tr>
    <th>CPF</th>
    <th>Nome</th>
    <th>Email</th>
    <th>Celular</th>
    <th>Endereco</th>
    </tr>
        <?php
        use DAO\ClienteDAO;
        use Classes\Cliente;
        use Classes\Endereco;

        require_once 'DAO\ClienteDAO.php';
        require_once 'Classes\Cliente.php';
        require_once 'Classes\Endereco.php';

        //include connection
        include __DIR__ . "\Config\pdo.php";

        //faz o insert atraves da ClienteDAO

        $clienteDAO = new ClienteDAO($pdo);

        $clientes = $clienteDAO->buscarPorEmail($_GET['email']);

        foreach ($clientes as $chave => $cliente) { ?>
    <tr>
        <td><?php echo $cliente['cpf'] ?></td>
        <td><?php echo $cliente['nome'] ?></td>
        <td><?php echo $cliente['email'] ?></td>
        <td><?php echo $cliente['celular'] ?></td>
        <td><?php echo $cliente['endereco'] ?></td>
    </tr>
<?php } ?>

</table>
</body>
</html>