<?php

namespace DAO;

class ClienteDAO
{
    public function __construct(
        private \PDO $pdo
    ) {

    }

    public function criar(string $cpf, string $nome, string $email, string $celular, string $endereco) {

        $sql = "insert into cliente (cpf, nome, email, celular, endereco) values (?, ?, ?, ?,?);";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            $cpf,
            $nome,
            $email,
            $celular,
            $endereco
        ]);

    }

  public function buscarPorEmail(string $email) {

        $sql = "select * from cliente where email = ?;";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$email]);
        return $stmt->fetchAll();
  }
}