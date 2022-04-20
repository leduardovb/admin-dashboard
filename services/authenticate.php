<?php
    session_start();
    require_once "../vendor/autoload.php";
    require_once "../helpers/parses.php";
    use App\Entity\User;

    $userData = $_POST;
    if (sizeof($userData) !== 0) {
        $login = $userData["login"];
        $password = $userData['password'];
        if (strlen($login) !== 0 && strlen($password) !== 0) {
            $filters = "filters=user.login:$login";
            $user = User::getUserList($filters);
            if (sizeof($user) === 1) {
                if (password_verify($password, $user[0]->password)) {
                    $_SESSION['user'] = [
                        "login" => $user[0]->login,
                        "name" => $user[0]->name,
                    ];
                }
            }
        }
    }
    echo "<script>window.location.href = '/admin-dashboard/'</script>";
    exit();
?>