<?php
    use App\Entity\Role;
    require_once "../vendor/autoload.php";
    require_once "../helpers/parses.php";

    if (isset($_POST)) {
        $newRole = [
            'description' => $_POST["description"],
            'codename' => $_POST["codename"],
        ];
        $roleId = $_POST['id'];
        if ($roleId) {
            $filters = "filters=role.id:$roleId";
            Role::updateRole($newRole, $filters);
        } else Role::newRole($newRole);
    }
    $urlIdParameter = $roleId ? "/$roleId": "";
    echo "<script>location.replace('/admin-dashboard/roles$urlIdParameter')</script>";
    exit();