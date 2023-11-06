<?php

namespace Nelson\Comex\Tests;

use Nelson\Comex\Classes\Carrinho;
use Nelson\Comex\Classes\Produto;
use PHPUnit\Framework\TestCase;

class CarrinhoTest extends TestCase
  {
    public function testAdicionaProdutoAumentaListaDeProdutos()
    {
      $carrinho = new Carrinho ([]);

      $carrinho->adicionaProduto (new Produto ('Um', 1 1));

      $this->assertEquals(1, cout ($carrinho->getProdutos()));
    }
    public function testRemoverProdutoDiminuiListaDeProdutos ()
    {
      $carrinho = new Carrinho{[new Produto ('Um',1 1)]);

      $carrinho->removerProduto('Um');

      $this->assertEquals(0, count($carrinho->getProdutos()));
    }
    
    $carrinho = new Carrinho([new Produto('Um', 1, 1), new Produto ('Dois',2 2)]);
    $this->assertEquals(1 * 2, $carrinho->getValorTotal());
  }
