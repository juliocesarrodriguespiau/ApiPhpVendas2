<?php

namespace App\Models;

use Exception;

class Vendedor
{
    private static $table = 'vendedores';

    public static function getVendedor(int $id) {
        $connPDO = new \PDO(DBDRIVE.': host='.DBHOST.'; dbname='.DBNAME, DBUSER, DBPASS);

        $sql = 'SELECT * FROM '.self::$table.' WHERE id = :id';
        $stmt = $connPDO->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        } else {
            throw new \Exception("Nenhum vendedor cadastrado!");
        }
    }

    public static function getVendedores() {
        $connPDO = new \PDO(DBDRIVE.': host='.DBHOST.'; dbname='.DBNAME, DBUSER, DBPASS);

        $sql = 'SELECT * FROM '.self::$table;
        $stmt = $connPDO->prepare($sql);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } else {
            throw new \Exception("Nenhum vendedor cadastrado!");
        }
    }

    public static function insert($data) {
        $connPDO = new \PDO(DBDRIVE.': host='.DBHOST.'; dbname='.DBNAME, DBUSER, DBPASS);

        $sql = 'INSERT INTO '.self::$table.'(nome, email, comissao) VALUES (:nome, :email, :comissao)';
        $stmt = $connPDO->prepare($sql);
        $stmt->bindValue(':nome', $data['nome']);
        $stmt->bindValue(':email', $data['email']);
        $stmt->bindValue(':comissao', $data['comissao']);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return 'Vandedor(a) cadastrado com sucesso!';
        } else {
            throw new \Exception("Falha ao cadastrar vendedor(a)");
        }
    }

    public static function deleteVendedor(int $id) {
        $connPDO = new \PDO(DBDRIVE.': host='.DBHOST.'; dbname='.DBNAME, DBUSER, DBPASS);

        $sql = 'DELETE FROM '.self::$table.' WHERE id = :id';
        $stmt = $connPDO->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return 'Vandedor(a) Excluído com sucesso!';
        } else {
            throw new \Exception("Erro ao excluir vendedor(a)!");
        }
    }

}