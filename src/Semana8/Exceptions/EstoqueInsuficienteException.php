<?php

namespace Exceptions;
class EstoqueInsuficienteException extends \DomainException
{
    public function __construct(float $quantidade, float $disponivel)
    {
        $mensagem = "Você tentou reduzir $quantidade, mas tem apenas $disponivel unidades em estoque.";
        parent::__construct($mensagem);
    }
}