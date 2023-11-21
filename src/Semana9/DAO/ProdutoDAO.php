<?php

namespace DAO;

class ProdutoDAO
{
    public function __construct(
        private \PDO $pdo
    ) {

    }

    public function criar(string $nome, float $preco, int $qtd_estoque) {

        $sql = "insert into produto (nome, preco, qtd_estoque) values (?, ?,?);";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            $nome,
            $preco,
            $qtd_estoque
        ]);
    }

    public function atualizarQtdVendida(int $id, int $qtd_estoque, int $qtd_desejada) {

        if ($qtd_estoque >= $qtd_desejada) {

            $sql = "update produto set qtd_estoque = qtd_estoque - ? where id = ?;";

            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                $qtd_desejada,
                $id
            ]);
            return "Compra realizada com sucesso!";
        }
        else {
            return "Quantidade desejada maior que Disponível em Estoque!";
        }
    }

    public function buscarPorId(int $id) {

        $sql = "select * from produto where id = ?;";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch();

    }

    public function buscarPorNome(string $nome) {

        $sql = "select * from produto where nome = ?;";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$nome]);
        var_dump($stmt->fetchAll());
        return;

    }

    public function listarPorNome() {

        $sql = "select * from produto order by nome;";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();

    }

}