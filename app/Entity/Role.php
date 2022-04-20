<?php

namespace App\Entity;

use App\DB\Database;
use PDO;

class Role {

    const TABLE_NAME = "ROLE";

    public $id;

    public $description;

    public static function getRoleById($id, $joins = null, $fields = "*") {
        $filters = "filters=role.id:$id";
        return (new Database(self::TABLE_NAME))
            ->select($filters, $joins, $fields)
            ->fetchAll(PDO::FETCH_CLASS, self::class)[0];
    }

    public static function getRoleList($where = null, $joins = null, $fields = null) {
        return (new Database(self::TABLE_NAME))
            ->select($where, $joins, $fields)
            ->fetchAll(PDO::FETCH_OBJ);
    }

    public static function newRole($role) {
        return (new Database(self::TABLE_NAME))
            ->insert($role);
    }

    public static function updateRole($role, $filters) {
        return (new Database(self::TABLE_NAME))
            ->update($role, $filters)
            ->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    public static function deleteRole($id) {
        $filters = "filters=role.id:$id";
        return (new Database(self::TABLE_NAME))
            ->delete($filters);
    }
}