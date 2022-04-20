<?php
    use App\Entity\User;
    require_once "../vendor/autoload.php";
    require_once "../helpers/parses.php";
    require_once "../functions/generic.php";

    if (isset($_POST)) {
        $newUser = [
            'name' => $_POST["name"],
            'email' => $_POST["email"],
            'login' => $_POST["login"],
            'role_id' => $_POST["role_id"],
            'status' => $_POST["status"],
        ];
        $userId = $_POST['id'];
        if ($userId) {
            $filter = "filters=user.id:$userId";
            User::updateUser($newUser, $filter);
        } else {
            $passwordHash = generatePasswordHash($_POST["password"]);
            if ($passwordHash) {
                $newUser["password"] = $passwordHash;
                User::newUser($newUser);
            }
        }
    }
    $urlIdParameter = $userId ? "/$userId": "";
    echo "<script>location.replace('/admin-dashboard/users$urlIdParameter')</script>";
    exit();