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
require_once 'Excecoes\EstoqueInsuficienteException.php';
//require_once 'CPF.php';
$endereco = new Endereco("04275000", "SP", "Sao Paulo", "Ipiranga", "Rua Huet Bacelar", "466");
//var_dump($endereco);
echo "recuperarCep " . $endereco->recuperarCep(). PHP_EOL;
echo "recuperarEndereco " . $endereco->recuperarEndereco(). PHP_EOL;
$cliente = new Cliente (new CPF ("129.263.738-21"), "Richard_Kaplan", "kaplan.richard@gmail.com.br", "(11)96707-3960", $endereco);
echo "cpf do cliente " .$cliente->recuperarNome() . " é ". $cliente->recuperarCpf() . PHP_EOL;
echo "endereco do cliente " .$cliente->recuperarNome() . " é ". $cliente->recuperarEndereco()->recuperarEndereco() . PHP_EOL;
$endereco2 = new Endereco("04275000", "SP", "Sao Paulo", "Ipiranga", "Rua Huet Bacelar", "468");
$cliente->atualizarEndereco($endereco2);
echo "novo endereco do cliente "  .$cliente->recuperarNome() . " é ". $cliente->recuperarEndereco()->recuperarEndereco() . PHP_EOL;
echo "novo cep do cliente "  .$cliente->recuperarNome() . " é ". $cliente->recuperarEndereco()->recuperarCep() . PHP_EOL;
echo "novo estado do cliente "  .$cliente->recuperarNome() . " é ". $cliente->recuperarEndereco()->recuperarEstado() . PHP_EOL;
echo "nova cidade do cliente "  .$cliente->recuperarNome() . " é ". $cliente->recuperarEndereco()->recuperarCidade() . PHP_EOL;
echo "novo bairro do cliente "  .$cliente->recuperarNome() . " é ". $cliente->recuperarEndereco()->recuperarBairro() . PHP_EOL;
echo "nova rua do cliente "  .$cliente->recuperarNome() . " é ". $cliente->recuperarEndereco()->recuperarRua() . PHP_EOL;
echo "novo numero do cliente "  .$cliente->recuperarNome() . " é ". $cliente->recuperarEndereco()->recuperarNumero() . PHP_EOL;
echo "cpf do cliente "  .$cliente->recuperarNome() . " é ". $cliente->recuperarCpf() . PHP_EOL;
echo "email do cliente "  .$cliente->recuperarNome() . " é ". $cliente->recuperarEmail() . PHP_EOL;
echo "celular do cliente "  .$cliente->recuperarNome() . " é ". $cliente->recuperarCelular() . PHP_EOL;
//$cliente->atualizarNome('Ana');
$cliente->atualizarNome('Richard Kaplan');
echo "novo nome do cliente "  .$cliente->recuperarCpf() . " é ". $cliente->recuperarNome() . PHP_EOL;
$cliente->atualizarCelular('(11)96707-3964');
echo "celular do cliente "  .$cliente->recuperarNome() . " é ". $cliente->recuperarCelular() . PHP_EOL;
$cliente->atualizarEmail('kaplan.richard@gmail.com');
echo "email do cliente "  .$cliente->recuperarNome() . " é ". $cliente->recuperarEmail() . PHP_EOL;
echo "total de compras do cliente "  .$cliente->recuperarNome() . " é ". number_format($cliente->recuperarTotalCompras(), 2, ',', '.')  . PHP_EOL;
$cliente->atualizarTotalCompras(100.00);
echo "total de compras do cliente "  .$cliente->recuperarNome() . " é ". number_format($cliente->recuperarTotalCompras(), 2, ',', '.') . PHP_EOL;

$produto1 = new Produto('Caneta', 2.00, 1000);
$produto2 = new Produto('Lapis', 0.50, 1000);
$produto3 = new Produto('Caderno', 24.99, 300);
$produto4 = new Produto('Tesoura', 6.99, 250);
$produto5 = new Produto('File de Frango Desossado', 15.00, 18000.25);
echo "Produto = " .$produto1->recuperarNome(). ", preco = R$ ". number_format($produto1->recuperarPreco(), 2, ',', '.') . ", qtd disponivel = " . number_format($produto1->recuperarQtdEstoque(), 2, ',', '.')  . PHP_EOL;
$produto1->atualizarNome('Caneta BIC');
$produto1->atualizarPreco(2.5);
$produto1->atualizarQtdEstoque(500.0);
echo "Produto = " .$produto1->recuperarNome(). ", preco = R$ ". number_format($produto1->recuperarPreco(), 2, ',', '.') . ", qtd disponivel = " . number_format($produto1->recuperarQtdEstoque(), 2, ',', '.')  . PHP_EOL;
$produto1->listarDisponivel();
$produto1->listarValorEstoque();
$produtos = [
    $produto1,
    $produto2,
    $produto3,
    $produto4
];

foreach ($produtos as $chave => $produto) {
    echo "O produto de numero " . $chave . " é o seguinte: " . PHP_EOL;
    echo "Nome                             : " . $produto->recuperarNome() . PHP_EOL;
    echo "Preco                            : " . $produto->recuperarPreco() . PHP_EOL;
    echo "Estoque Disponivel               : " . $produto->recuperarQtdEstoque() . PHP_EOL;
    $produto->listarValorEstoque();
}

$pedido = new Pedido(1, $cliente, $produtos);

echo "Pedido Nº: " . $pedido->recuperarId() . PHP_EOL;
echo "Cliente  : " . $pedido->recuperarCliente()->recuperarNome() . PHP_EOL;

foreach ($pedido->recuperarProdutos() as $chave => $produto) {
    echo "O produto de numero " . $chave . " é o seguinte: " . PHP_EOL;
    echo "Nome                             : " . $produto->recuperarNome() . PHP_EOL;
    echo "Preco                            : " . $produto->recuperarPreco() . PHP_EOL;
}

$cliente->adicionarPedido($pedido);
$produto6 = new Produto('SSD 1TB Kingston', 500.00, 1000.00);
$pedido->adicionarProduto($produto6);
var_dump($cliente);

echo 'semana 7 inicio '.PHP_EOL;
echo 'teste: quantidade a reduzir negativa'.PHP_EOL;
$produto1->reduzirEstoque(-5.0);
$produto1->listarDisponivel();
echo 'teste quantidade a reduzir (1000) > disponivel(500)'.PHP_EOL;
$produto1->reduzirEstoque(1000.0);
echo 'teste quantidade a reduzir (100) < disponivel(500)'.PHP_EOL;
$produto1->reduzirEstoque(100.0);
$produto1->listarDisponivel();
echo 'teste: quantidade a incrementar negativa'.PHP_EOL;
$produto1->incrementarEtoque(-5.0);
echo 'teste: quantidade a incrementar positiva'.PHP_EOL;
$produto1->incrementarEtoque(150.0);
$produto1->listarDisponivel();
echo 'teste: atualizar a quantidade disponível em estoque.'.PHP_EOL;
$produto1->atualizarQtdEstoque(-5.0);
$produto1->listarDisponivel();
echo 'teste: atualizar preco.'.PHP_EOL;
$produto1->atualizarPreco(-5.0);
$produto1->listarDisponivel();
echo 'teste: atualizar nome do cliente.'.PHP_EOL;
$cliente->atualizarNome("Ana");
echo 'teste: criar CPF inválido.'.PHP_EOL;
new CPF ("129.263.738");