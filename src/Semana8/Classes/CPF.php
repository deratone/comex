<?php

namespace Classes;
class CPF
{
    private $numero;

    public function __construct(string $numero)
    {
        try {
            $numero = filter_var($numero, FILTER_VALIDATE_REGEXP, [
                'options' => [
                    'regexp' => '/^[0-9]{3}\.[0-9]{3}\.[0-9]{3}\-[0-9]{2}$/'
                ]
            ]);
            if ($numero === false) {
                throw new \InvalidArgumentException('CPF Inválido. Favor informar no padrão é 999.999.999-99.');
            }
        } catch (\Exception $erro) {
            echo $erro->getMessage() . PHP_EOL;
            return;
        }
        $this->numero = $numero;
    }

    public function recuperarNumero()
    {
        return $this->numero;
    }

}