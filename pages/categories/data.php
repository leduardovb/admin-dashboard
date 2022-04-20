<?php
    use App\Entity\Category;

    $paths = explode("/", $_GET["url"]);
    $size = sizeof($paths);
    $categoryId = $paths[$size - 1];
    $category = [];
    if (is_numeric($categoryId)) {
        $category = Category::getCategoryById($categoryId);
    }
    echo categoryForm($category);
