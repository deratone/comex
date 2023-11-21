<?php

use Classes\Cliente;
use Classes\CPF;
use Classes\Endereco;
use Classes\Pedido;
use Classes\Produto;
use DAO\ClienteDAO;
use DAO\ProdutoDAO;
use DAO\PedidoDAO;

require_once 'Classes\CPF.php';
require_once 'Classes\Cliente.php';
require_once 'Classes\Endereco.php';
require_once 'Classes\Produto.php';
require_once 'Classes\Pedido.php';
require_once 'Config\pdo.php';
require_once 'DAO\ClienteDAO.php';
require_once 'DAO\ProdutoDAO.php';
require_once 'DAO\PedidoDAO.php';

// Inicia o PDO
/**
 * @var \PDO $pdo
 */

$pdo = include __DIR__ . "\Config\pdo.php";

$endereco = new Endereco("04275000", "SP", "Sao Paulo", "Ipiranga", "Rua Huet Bacelar", "466");
$cliente = new Cliente (new CPF ("118.263.738-21"), "Richard Kaplan", "kaplan.richard@gmail.com.br", "(11)91707-3960", $endereco);

$clienteDAO = new ClienteDAO($pdo);

/*
$clienteDAO->criar("131.263.738-21", "Richard Kaplan", "kaplan.richard@gmail.com.br", "(11)91707-3960","Rua Huet Bacelar , 466 - Ipiranga -Sao Paulo - SP");

$clienteDAO->buscarPorNome("Richard Kaplan");
*/
/*
$produtoDAO = new ProdutoDAO($pdo);

$produtoDAO->criar("Pasta em L", 1.0, 1050);

$produtoDAO->buscarPorNome("Pasta em L");
*/

$pedidoDAO = new PedidoDAO($pdo);

$pedidoDAO->criar("129.263.738-21", "6");

$pedidoDAO->buscarPorCPF("129.263.738-21");