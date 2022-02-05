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
}