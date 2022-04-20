<?php
    use App\Entity\User;

    if ($_GET['url']) {
        $paths = explode("/", $_GET['url']);
        $size = sizeof($paths);
        $userId = $paths[$size - 1];
        if ($userId && User::deleteUser($userId)) {
        }
    }
    echo "<script>location.href='/admin-dashboard/users'</script>";
    exit();