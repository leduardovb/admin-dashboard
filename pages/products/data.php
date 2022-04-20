<?php
    use App\Entity\Product;

    $paths = explode("/", $_GET["url"]);
    $size = sizeof($paths);
    $productId = $paths[$size - 1];
    $product = [];
    if (is_numeric($productId)) {
        $joins = "includes=category";
        $fields = "PRODUCT.id, PRODUCT.name, PRODUCT.price, PRODUCT.description, CATEGORY.id as categoryId";
        $product = Product::getProductById($productId, $joins, $fields);
    }
    echo productForm($product);