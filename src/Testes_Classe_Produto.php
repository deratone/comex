<?php
namespace Fabiana120780\Comex\Tests;
use PHPUnit\Framework\TestCase;

public function testRetornaNomeCorretamente()
    }
    $produto = new Produto ('Nome', 10, 10;);
$this->assertEquals ('Nome', $produto->getNome());
}

public function testRetornaPrecoCorretamente()
    
    $produto = new Produto('Preco', 10, 10);
$this->assertEquals(10, $produto->getPrecoCorretamente());
}

public function testRetornaQtdEstoque()
    
    $produto = new Produto('QtdEstoque', 10, 10);
$this->assertEquals(10, $produto->getQtdEstoque());
}
public function testComprarQuantidadeNegativaJogaErroCerto() 
    $produto = new Produto (1Nome', 10, 10);
    $this->expectException(InvalidArgumentException: : class);
    $produto->compra(100);
    }
    









    
use Fabiana120780\Produto\Roupas\meia\estoque;
use Fabiana120780\Produto\Roupas\meia\categoria;
use Fabiana120780\Produto\Roupas\codigo;
use Fabiana120780\Produto\Roupas\tipo;

require_once 'principal.php';

$roupas = new meia(
    new categoria(
        new codigo('3548795'),
        'Meia cano alto', 
        new Cores('Azul', 'Branca', 'Amarela', 'Vermelha')
    )
);
$meia->estoque(50);
$meia->venda(10);
echo $meia->atualizaestoque();
class categoria
{
    private $estoque;
    private $quantidade;
    private static $venda = 10;
    /**
     * @var int $tipos = Meia; 40 = estoque seguranca
     */
    private $tipo;

    public function __construct(categoria $estoque, int $tipo)
    {
        $this->estoque = $estoque;
        $this->quantidade = 50;
        $this->tipo = $tipo;
        self::$quantidade++;
    }
//...
  public function venda (float $venda): void
{
    if ($this->tipo === 1) {
        $quantidadeestoque = $quantidadevendida * 10;
    } else {
        $meia = $quantidadeestoque * 50;
    }

    $quantidadestoque = $quantidadeestoque - $quantidadevendida;
    if ($quantidadevendida > $this->saldo) {
        echo "Meias disponíveis";
        return;
    }

    $this->estoque -= $quantidadevendida;
}
