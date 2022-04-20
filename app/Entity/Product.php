<?php

namespace App\Entity;

use App\DB\Database;
use PDO;

class Product {

    const TABLE_NAME = "PRODUCT";

    public $id;

    public $name;

    public $description;

    public $price;

    public static function getProductById($id, $joins = null, $fields = "*") {
        $filters = "filters=product.id:$id";
        return (new Database(self::TABLE_NAME))
            ->select($filters, $joins, $fields, 1)
            ->fetchAll(PDO::FETCH_OBJ)[0];
    }

    public static function getProductList($where = null, $joins = null, $fields = "*") {
        return (new Database(self::TABLE_NAME))
            ->select($where, $joins, $fields)
            ->fetchAll(PDO::FETCH_OBJ);
    }

    public static function newProduct($product) {
        return (new Database(self::TABLE_NAME))
            ->insert($product);
    }

    public static function updateProduct($product, $where = null) {
        return (new Database(self::TABLE_NAME))
            ->update($product, $where);
    }

    public static function deleteProduct($id) {
        return (new Database(self::TABLE_NAME))
            ->delete('filters=product.id:'.$id);
    }
}