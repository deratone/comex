<?php

use Classes\Cliente;
use Classes\CPF;
use Classes\Endereco;
use Classes\Pedido;
use Classes\Produto;

require_once 'Classes\CPF.php';
require_once 'Classes\Cliente.php';
require_once 'Classes\Endereco.php';
require_once 'Classes\Produto.php';
require_once 'Classes\Pedido.php';
require_once 'Config\pdo.php';

// Inicia o PDO
/**
* @var \PDO $pdo
*/

$pdo = include __DIR__ . "\Config\pdo.php";

//$pdo = include "Config/pdo.php";

$endereco = new Endereco("04275000", "SP", "Sao Paulo", "Ipiranga", "Rua Huet Bacelar", "466");
$cliente = new Cliente (new CPF ("128.263.738-21"), "Richard Kaplan", "kaplan.richard@gmail.com.br", "(11)96707-3960", $endereco);

/*
$sql = "insert into cliente (cpf,nome, email, celular, endereco) values ( ?, ?, ?, ?,?);";

$stmt = $pdo->prepare($sql);
$stmt->execute([
    $cliente->recuperarCpf(),
    $cliente->recuperarNome(),
    $cliente->recuperarEmail(),
    $cliente->recuperarCelular(),
    $endereco->recuperarEndereco()
]);
*/
$endereco = new Endereco("04274000", "SP", "Sao Paulo", "Ipiranga", "Rua Huet Bacelar", "467");
$cliente = new Cliente (new CPF ("128.263.738-22"), "Sei La", "sei.la@gmail.com.br", "(11)96708-3969", $endereco);
/*
// insert clientes

$sql = "insert into cliente (cpf,nome, email, celular, endereco) values (?, ?, ?, ?,?);";

$stmt = $pdo->prepare($sql);
$stmt->execute([
    $cliente->recuperarCpf(),
    $cliente->recuperarNome(),
    $cliente->recuperarEmail(),
    $cliente->recuperarCelular(),
    $endereco->recuperarEndereco()
]);
*/
// insert produtos

$produto1 = new Produto('Caneta', 2.00, 1000);
$produto2 = new Produto('Lapis', 0.50, 1000);
$produto3 = new Produto('Caderno', 24.99, 300);
$produto4 = new Produto('Tesoura', 6.99, 250);

$produtos = [
    $produto1,
    $produto2,
    $produto3,
    $produto4
];

/*
$sql = "insert into produto (nome, preco, qtd_estoque) values (?, ?,?);";

$stmt = $pdo->prepare($sql);

foreach ($produtos as $chave => $produto) {
    $stmt->execute([
        $produto->recuperarNome(),
        $produto->recuperarPreco(),
        $produto->recuperarQtdEstoque(),
        ]);
}
*/
// insert pedidos

$pedido = new Pedido(1, $cliente, $produtos);

/*
$stmt = $this->db->prepare('SELECT COUNT(*) 
                                    FROM tasks
                                   WHERE project_id = :project_id;');

$stmt->bindParam(':project_id', $projectId);
$stmt->execute();
return $stmt->fetchColumn();

*/

$sql = "select id from produto where nome = :nome_produto;";

$stmt = $pdo->prepare($sql);

$string = "";

foreach ($produtos as $chave => $produto) {
    $nome_produto = $produto->recuperarNome();
    $stmt->bindParam(':nome_produto', $nome_produto);
    $stmt->execute();
    $id = $stmt->fetchColumn();
    $string .= "$id ";
}

echo "string = " . $string.PHP_EOL;

$sql = "insert into pedido (id, cpf_cliente, produtos) values (?, ?,?);";

$stmt = $pdo->prepare($sql);
 $stmt->execute([
        $pedido->recuperarId(),
        $pedido->recuperarCliente()->recuperarCpf(),
        $string
    ]);


