<?php
    use App\Entity\Product;

    if ($_GET['url']) {
        $paths = explode("/", $_GET['url']);
        $size = sizeof($paths);
        $productId = $paths[$size - 1];
        if ($productId && Product::deleteProduct($productId)) {
        }
    }
    echo "<script>location.href='/admin-dashboard/products'</script>";
    exit();