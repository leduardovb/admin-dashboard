<?php
    use App\Entity\Product;
    require_once "../vendor/autoload.php";
    require_once "../helpers/parses.php";

    if (isset($_POST)) {
        $newProduct = [
            'name' => $_POST["name"],
            'price' => $_POST["price"],
            'category_id' => $_POST["category_id"],
            'description' => $_POST["description"]
        ];
        $productId = $_POST['id'];
        if ($productId) {
            $filters = "filters=product.id:$productId";
            Product::updateProduct($newProduct, $filters);
        } else Product::newProduct($newProduct);
    }
    $urlIdParameter = $productId ? "/$productId": "";
    echo "<script>location.replace('/admin-dashboard/products$urlIdParameter')</script>";
    exit();