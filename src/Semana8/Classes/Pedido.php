<?php

namespace Classes;

class Pedido
{
    private $id;
    private $cliente;
    private array $produtos = [];

    public function __construct(int $id, Cliente $cliente, array $produtos)
    {
        $this->id = $id;
        $this->cliente = $cliente;
        $this->produtos = $produtos;
    }

    // métodos setters - métodos que inicializam valores

    public function adicionarProduto(Produto $produto)
    {
        array_push($this->produtos, $produto);
    }

    // getters - métodos que recuperam valores

    public function recuperarId(): int
    {
        return $this->id;
    }

    public function recuperarCliente(): Cliente
    {
        return $this->cliente;
    }

    public function recuperarProdutos(): array
    {
        return $this->produtos;
    }

}

