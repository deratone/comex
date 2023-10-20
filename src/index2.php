<?php

/*Tarefa: Criar funções/variáveis para gerenciar o estoque
Para praticar o uso de arrays, variáveis, 
funções e treinar lógica.

Reescreva a lista de produtos, mas agora ela
deve conter o estoque de produtos do e-commerce.
O array deve ter os produtos com nome,
preço e quantidade em estoque. 
Implemente funções para adicionar produtos ao estoque,
remover produtos do estoque e verificar a disponibilidade
de um produto específico. */


$produtos = [
    [
    'Produto' => 'Guaraná - 2Lt',
    'Valor' => 10,
    'Estoque' => 100
    ],
    [
    'Produto' => 'Suco de Laranja',
     'Valor' => 10,99,
     'Estoque' => 200
    ],
    [
    'Produto' => 'Cachorro-Quente',
    'Valor' => 20,
    'Estoque' => 300
    ],
    [
    'Produto' => 'Pizza',
    'Valor' => 30,
    'Estoque' => 400
    ],
    [
    'Produto' => 'Pão frânces',
    'Valor' => 30,
    'Estoque' => 500
    ]
];


if (250>$produtos[0]['Estoque']) {
    echo "Você não pode sacar do estoque" . PHP_EOL;
    } else {
        $produtos[0]['Estoque'] -=250;
    };


if (5>$produtos[1]['Estoque']) {
    echo "Você não pode sacar do estoque" . PHP_EOL;
    } else {
        $produtos[1]['Estoque'] += 5;
    };


if (50>$produtos[2]['Estoque']){
    echo "Você não pode sacar do estoque" . PHP_EOL;
    } else {
        $produtos[2]['Estoque'] -= 50;
    };


if (50>$produtos[3]['Estoque']){
    echo "Você não pode sacar do estoque" . PHP_EOL;
    } else {
        $produtos[3]['Estoque'] += 50;
    };


if (50>$produtos[4]['Estoque']){
    echo "Você não pode sacar do estoque" . PHP_EOL;
    } else {
        $produtos[4]['Estoque'] += 50;
    };

foreach ($produtos as $produto){
    echo "Produto " . $produto['Produto'] . 
    ", Valor: R$" . $produto['Valor'] . 
    " Quantidade de estoque:" . $produto['Estoque'] . PHP_EOL;
}









