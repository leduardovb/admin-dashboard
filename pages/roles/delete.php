<?php
    use App\Entity\Role;

    if ($_GET['url']) {
        $paths = explode("/", $_GET['url']);
        $size = sizeof($paths);
        $roleId = $paths[$size - 1];
        if ($roleId && Role::deleteRole($roleId)) {
        }
    }
    echo "<script>location.href='/admin-dashboard/roles'</script>";
    exit();