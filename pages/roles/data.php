<?php
    use App\Entity\Role;

    $paths = explode("/", $_GET["url"]);
    $size = sizeof($paths);
    $roleId = $paths[$size - 1];
    $role = [];
    if (is_numeric($roleId)) {
        $role = Role::getRoleById($roleId);
    }
    echo roleForm($role);
