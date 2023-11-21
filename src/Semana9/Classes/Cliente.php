<?php

namespace Classes;

class Cliente
{

    private $id;
    private CPF $cpf;
    private $nome;
    private $email;
    private $celular;
    private Endereco $endereco;

    private float $totalCompras;

    private array $pedidos = [];

    public function __construct(
        CPF    $cpf, string $nome, string $email,
        string $celular, Endereco $endereco)
    {
        $this->cpf = $cpf;
        try {
            $this->validarNome($nome);
        } catch (\Exception $erro) {
            echo $erro->getMessage() . PHP_EOL;
            return;
        }
        $this->nome = $nome;
        $this->email = $email;
        $this->celular = $celular;
        $this->endereco = $endereco;
        $this->totalCompras = 0.0;
    }

    private function validarNome(string $nome)
    {
        if (strlen($nome) < 5) {
            throw new \InvalidArgumentException('Nome precisa ter pelo menos 5 caracteres.');
        }
    }

    // métodos setters - métodos que inicializam valores

    public function atualizarNome(string $nome)
    {
        try {
            $this->validarNome($nome);
        } catch (\Exception $erro) {
            echo $erro->getMessage() . PHP_EOL;
            return;
        }

        $this->nome = $nome;

    }

    public function atualizarEmail(string $email)
    {
        $this->email = $email;
    }

    public function atualizarCelular(string $celular)
    {
        $this->celular = $celular;
    }

    public function atualizarEndereco(Endereco $endereco)
    {
        $this->endereco = $endereco;
    }

    public function atualizarTotalCompras($novasCompras)
    {
        $this->totalCompras += $novasCompras;
    }

    public function adicionarPedido(Pedido $pedido)
    {
        array_push($this->pedidos, $pedido);
    }


    // getters - métodos que recuperam valores

    public function recuperarCpf(): string
    {
        return $this->cpf->recuperarNumero();
    }

    public function recuperarNome(): string
    {
        return $this->nome;
    }

    public function recuperarEmail(): string
    {
        return $this->email;
    }

    public function recuperarCelular(): string
    {
        return $this->celular;
    }

    public function recuperarEndereco(): Endereco
    {
        return $this->endereco;
    }

    public function recuperarTotalCompras(): float
    {
        return $this->totalCompras;
    }

    public function recuperarCliente(): string
    {
        return "cpf = " . $this->cpf->recuperarNumero() . " nome = " . $this->nome;
    }

}
