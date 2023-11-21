<?php

namespace Classes;
class Endereco
{
    private $cep;
    private $estado;
    private $cidade;
    private $bairro;
    private $rua;
    private $numero;

    public function __construct(string $cep, string $estado, string $cidade, string $bairro, string $rua, string $numero)
    {
        $this->cep = $cep;
        $this->estado = $estado;
        $this->cidade = $cidade;
        $this->bairro = $bairro;
        $this->rua = $rua;
        $this->numero = $numero;
    }

    // métodos setters - métodos que inicializam valores

    public function atualizarCep(string $cep)
    {
        $this->cep = $cep;
    }

    public function atualizarEstado(string $estado)
    {
        $this->estado = $estado;
    }

    public function atualizarCidade(string $cidade)
    {
        $this->cidade = $cidade;
    }

    public function atualizarBairro(string $bairro)
    {
        $this->bairro = $bairro;
    }

    public function atualizarRua(string $rua)
    {
        $this->rua = $rua;
    }

    public function atualizarNumero(string $numero)
    {
        $this->numero = $numero;
    }

    // getters - métodos que recuperam valores
    public function recuperarCep()
    {
        return preg_replace("/(\d{5})(\d{3})/", "$1-$2", $this->cep);
    }

    public function recuperarEstado()
    {
        return $this->estado;
    }

    public function recuperarCidade()
    {
        return $this->cidade;
    }

    public function recuperarBairro()
    {
        return $this->bairro;
    }

    public function recuperarRua()
    {
        return $this->rua;
    }

    public function recuperarNumero()
    {
        return $this->numero;
    }

    public function recuperarEndereco()
    {
        return $this->rua . ", " . $this->numero . " - " . $this->bairro . " - " . $this->cidade . " - " . $this->estado . " - CEP " . $this->recuperarCep();
    }
}