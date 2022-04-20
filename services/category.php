<?php
    use App\Entity\Category;
    require_once "../vendor/autoload.php";
    require_once "../helpers/parses.php";

    if (isset($_POST)) {
        $newCategory = [
            'name' => $_POST["name"],
        ];
        $categoryId = $_POST['id'];
        if ($categoryId) {
            $filters = "filters=category.id:$categoryId";
            Category::updateCategory($newCategory, $filters);
        } else Category::newCategory($newCategory);
    }
    $urlIdParameter = $categoryId ? "/$categoryId": "";
    echo "<script>location.replace('/admin-dashboard/categories$urlIdParameter')</script>";
    exit();