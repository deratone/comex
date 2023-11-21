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

class PedidoTest  extends \PHPUnit\Framework\TestCase
{
    public function testRecuperaId() {
        $endereco = new Endereco("04275000", "SP", "Sao Paulo", "Ipiranga", "Rua Huet Bacelar", "468");
        $cliente = new Cliente (new CPF ("129.263.738-21"), "Richard_Kaplan", "kaplan.richard@gmail.com.br", "(11)96707-3960", $endereco);
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
        $pedido = new Pedido(1, $cliente, $produtos);
        $this->assertEquals(1, $pedido->recuperarId());
    }


}