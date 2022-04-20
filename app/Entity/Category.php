<?php

namespace App\Entity;

use App\DB\Database;
use PDO;

class Category {

    const TABLE_NAME = "CATEGORY";

    public $id;

    public $name;

    public static function getCategoryById($id, $joins = null, $field = "*") {
        $filters = "filters=category.id:$id";
        return (new Database(self::TABLE_NAME))
            ->select($filters, $joins, $field, 1)
            ->fetchAll(PDO::FETCH_CLASS, self::class)[0];
    }

    public static function getCategoryList($where = null, $joins = null, $fields = "*") {
        return (new Database(self::TABLE_NAME))
            ->select($where, $joins, $fields)
            ->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    public static function newCategory($category) {
        return (new Database(self::TABLE_NAME))
            ->insert($category);
    }

    public static function updateCategory($category, $where = null) {
        return (new Database(self::TABLE_NAME))
            ->update($category, $where);
    }

    public static function deleteCategory($id) {
        $filters = "filters=category.id:$id";
        return (new Database(self::TABLE_NAME))
            ->delete($filters);
    }
}