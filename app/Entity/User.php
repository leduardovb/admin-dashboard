<?php

namespace App\Entity;

use App\DB\Database;
use PDO;

class User {

    const TABLE_NAME = "USER";

    public $id;

    public $name;

    public $email;

    public $login;

    public $status;

    public static function getUserById($id, $joins = null, $fields = "*") {
        $filters = "filters=user.id:$id";
        return (new Database(self::TABLE_NAME))
            ->select($filters, $joins, $fields, 1)
            ->fetchAll(PDO::FETCH_CLASS, self::class)[0];
    }

    public static function getUserList($where = null, $joins = null, $fields = "*") {
        return (new Database(self::TABLE_NAME))
            ->select($where, $joins, $fields)
            ->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    public static function newUser($user) {
        return (new Database(self::TABLE_NAME))
            ->insert($user);
    }

    public static function updateUser($user, $filters) {
        return (new Database(self::TABLE_NAME))
            ->update($user, $filters);
    }

    public static function deleteUser($id) {
        return (new Database(self::TABLE_NAME))
            ->delete("filters=user.id:$id");
    }
}