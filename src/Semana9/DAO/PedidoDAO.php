<?php

namespace DAO;

class PedidoDAO
{
    public function __construct(
        private \PDO $pdo
    ) {

    }

    public function criar(string $cpf, string $produtos) {

        $sql = "insert into pedido (cpf_cliente, produtos) values (?,?);";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            $cpf,
            $produtos
        ]);
    }

    public function buscarPorCPF(string $cpf) {

        $sql = "select * from pedido where cpf_cliente = ?;";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$cpf]);
        var_dump($stmt->fetchAll());
        return;
    }

}