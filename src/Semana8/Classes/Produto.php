<?php

namespace Classes;
use Excecoes\EstoqueInsuficienteException;

class Produto
{
    private string $nome;
    private float $preco;

    private float $qtdEstoque;

    public function __construct(string $nome, float $preco, float $qtdEstoque)
    {
        $this->nome = $nome;
        $this->preco = $preco;
        $this->qtdEstoque = $qtdEstoque;

    }

    // métodos setters - métodos que inicializam valores

    public function atualizarNome(string $nome)
    {
        $this->nome = $nome;

    }

    public function atualizarPreco(float $preco)
    {
        try {
            if ($preco <= 0) {
                throw new \InvalidArgumentException('Preco precisa ser positivo.');
            }
            $this->preco = $preco;
        } catch (\Exception $erro) {
            echo $erro->getMessage() . PHP_EOL;
            return;
        }
    }

    public function atualizarQtdEstoque(float $qtdEstoque)
    {
        try {
            if ($qtdEstoque <= 0) {
                throw new \InvalidArgumentException('Quantidade disponivel precisa ser positiva.');
            }
        } catch (\Exception $erro) {
            echo $erro->getMessage() . PHP_EOL;
            return;
        }
        $this->qtdEstoque = $qtdEstoque;
    }

    // getters - métodos que recuperam valores

    public function recuperarNome(): string
    {
        return $this->nome;
    }

    public function recuperarPreco(): float
    {
        return $this->preco;
    }

    public function recuperarQtdEstoque(): float
    {
        return $this->qtdEstoque;
    }

    public function reduzirEstoque(float $qtdAReduzir): void
    {
        try {
            if ($qtdAReduzir < 0) {
                throw new \InvalidArgumentException('A quantidade a reduzir não pode ser negativa.');
            }

            if ($qtdAReduzir > $this->qtdEstoque) {
                throw new EstoqueInsuficienteException($qtdAReduzir, $this->qtdEstoque);
            }
        } catch (\Exception $erro) {
            echo $erro->getMessage() . PHP_EOL;
            return;
        }
        $this->qtdEstoque -= $qtdAReduzir;
    }

    public function incrementarEtoque(float $valorAIncrementar): void
    {
        try {
            if ($valorAIncrementar < 0) {
                throw new \InvalidArgumentException('A quantidade a incrementar não pode ser negativa.');
            }
        } catch (\Exception $erro) {
            echo $erro->getMessage() . PHP_EOL;
            return;
        }
        $this->qtdEstoque += $valorAIncrementar;
    }

    public function listarDisponivel(): void
    {
        echo "Quantidade disponível = " . number_format($this->qtdEstoque, 2, ',', '.') . PHP_EOL;
    }

    public function listarValorEstoque(): void
    {
        echo "Valor do inventário de estoque é : " . number_format($this->qtdEstoque * $this->preco, 2, ',', '.') . PHP_EOL;
    }
}
