<?php
use DAO\ClienteDAO;
require_once 'DAO\ClienteDAO.php';

    //include connection
    include __DIR__ . "\Config\pdo.php";

    //faz o insert atraves da ClienteDAO

    $clienteDAO = new ClienteDAO($pdo);

    $clienteDAO->criar($_POST['cpf'], $_POST['nome'], $_POST['email'], $_POST['celular'],  $_POST['celular'],  $_POST['endereco']);

    echo "Cliente Cadastrado com Sucesso!";
