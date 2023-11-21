<?php

namespace Config;

$caminho = "C:\Kaplan\Alura_Level_Up\GitHub\comex\src\Semana9\DataBase\db_file.sqlite3";

$pdo = new \PDO('sqlite:'.$caminho);

// cria tabela de clientes

$sql = "CREATE TABLE IF NOT EXISTS cliente (
    cpf varchar(14) primary key,
    nome varchar(50),
    email varchar(30),
    celular varchar(20),
    endereco varchar(200)
);";
$pdo->exec($sql);

/*
$sql = "DROP TABLE cliente;";
$pdo->exec($sql);
*/


// cria tabela de produtos

$sql = "CREATE TABLE IF NOT EXISTS produto (
    id INTEGER PRIMARY KEY,
    nome varchar(255) not null,
    preco double not null,
    qtd_estoque integer not null
);";

$pdo->exec($sql);

/*
$sql = "DROP TABLE produto;";
$pdo->exec($sql);
*/

// cria tabela de pedidos

$sql = "CREATE TABLE IF NOT EXISTS pedido (
    id INTEGER PRIMARY KEY,
    cpf_cliente varchar(14) not null,
    produtos varchar[255] default '[]' not null,

    foreign key (cpf_cliente) references cliente(cpf)
    
);";

$pdo->exec($sql);

/*
$sql = "DROP TABLE pedido;";
$pdo->exec($sql);
*/


return $pdo;