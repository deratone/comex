<?php
/*Tarefa: Crie uma lista de produtos e exiba cada um deles
Para praticar a criação de arrays e uso de loops.

Crie uma lista que contenha vários produtos, 
os quais devem ter nome e preço.

Após, exiba-os.
*/

$produtos = [
    [
    'Produto' => 'Guaraná - 2Lt',
     'Valor' => 10
    ],
    [
    'Produto' => 'Suco de Laranja',
     'Valor' => 10,99
    ],
    [
    'Produto' => 'Cachorro-Quente',
    'Valor' => 20
    ],
    [
    'Produto' => 'Pizza',
    'Valor' => 30
    ],
    [
    'Produto' => 'Pão frânces',
    'Valor' => 30
    ]
];

foreach ($produtos as $produto){
    echo "Produto " . $produto['Produto'] . 
    ", Valor: R$" . $produto['Valor'] . PHP_EOL;
}
 