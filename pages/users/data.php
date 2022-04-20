<?php
    use App\Entity\User;

    $paths = explode("/", $_GET["url"]);
    $size = sizeof($paths);
    $userId = $paths[$size - 1];
    $user = [];
    if (is_numeric($userId)) {
        $joins = "includes=role";
        $fields = "USER.id, USER.name, USER.email, USER.login, USER.status, ROLE.id as roleId";
        $user = User::getUserById($userId, $joins, $fields);
    }
    echo userForm($user);