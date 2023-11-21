<?php

use Classes\Produto;

require_once 'Classes\Produto.php';

class ProdutoTest extends \PHPUnit\Framework\TestCase
{
    public function testNomeProduto() {
        $produto = new \Classes\Produto('Teste',10,10);
        $this->assertEquals('Teste', $produto->recuperarNome());
    }

}