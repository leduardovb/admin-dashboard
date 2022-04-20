<?php
    use App\Entity\Category;

    if ($_GET['url']) {
        $paths = explode("/", $_GET['url']);
        $size = sizeof($paths);
        $categoryId = $paths[$size - 1];
        if ($categoryId && Category::deleteCategory($categoryId)) {
        }
    }
    echo "<script>location.href='/admin-dashboard/categories'</script>";
    exit();