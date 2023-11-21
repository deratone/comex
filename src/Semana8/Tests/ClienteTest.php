<?php

use Classes\Cliente;
use Classes\CPF;
use Classes\Endereco;

require_once 'Classes\CPF.php';
require_once 'Classes\Cliente.php';
require_once 'Classes\Endereco.php';

class ClienteTest   extends \PHPUnit\Framework\TestCase
{
    public function testRecuperaNome() {
        $endereco = new Endereco("04275000", "SP", "Sao Paulo", "Ipiranga", "Rua Huet Bacelar", "468");
        $cliente = new Cliente (new CPF ("129.263.738-21"), "Richard Kaplan", "kaplan.richard@gmail.com.br", "(11)96707-3960", $endereco);
        $this->assertEquals('Richard Kaplan', $cliente->recuperarNome());
    }

}