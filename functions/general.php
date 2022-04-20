<?php
    use App\Entity\Product;
    use App\Entity\Category;
    use App\Entity\User;
    use App\Entity\Role;

    function handlerSession() {
        return isset($_SESSION["user"]);
    }

    function handleCurrentPage() {
        if ($_GET && sizeof($_GET) > 0 && $_GET['url'] != "") {
            $url = explode('/', $_GET['url']);
            $page = sizeof($url) === 1 ? "pages/$url[0]" : "pages";
            for ($i = 0; $i < sizeof($url); $i ++) {
                if (!is_numeric($url[$i])) {
                    $page .= "/$url[$i]";
                } else {
                    if (sizeof($url) === 2) $page .= '/data';
                }
                if ($i === sizeof($url) - 1) $page .= '.php';
            }
            return $page;
        }
        return 'pages/home.php';
    }

    function getProductList($where = null, $joins = null, $fields = "*") { return Product::getProductList($where, $joins, $fields); }

    function getCategories($where = null, $joins = null, $fields = "*") { return Category::getCategoryList($where, $joins, $fields); }

    function getUserList($where = null, $joins = null, $fields = "*") { return User::getUserList($where, $joins, $fields); }

    function getRoles($where = null, $joins = null, $fields = "*") { return Role::getRoleList($where, $joins, $fields); }

    function generateProductTableData() {
        $joins = "includes=category";
        $columns = ["#", "Nome", "Descrição", "Preço", "Categoria"];
        $fields = "PRODUCT.id, PRODUCT.name, PRODUCT.description, PRODUCT.price, CATEGORY.name AS categoryName";
        $products = getProductList(null, $joins, $fields);
        return actionTable("products", $columns, $products);
    }

    function generateCategoryTableData() {
        $columns = ["#", "Nome"];
        $fields = "id, name";
        $categories = getCategories(null, null, $fields);
        return actionTable("categories", $columns, $categories);
    }

    function generateUsersTableData() {
        $columns = ["#", "Nome", "Email", "Login", "Status", "Cargo"];
        $joins = "includes=role";
        $fields = "USER.id, USER.name, USER.email, USER.login, USER.status, ROLE.codename";
        $users = getUserList(null, $joins, $fields);
        return actionTable("users", $columns, $users);
    }

    function generateRolesTableData() {
        $columns = ["#", "Descrição", "Nome"];
        $fields = "ROLE.id, ROLE.description, ROLE.codename";
        $roles = getRoles(null, null, $fields);
        return actionTable("roles", $columns, $roles);
    }

    function generateProductCategoriesOptions($selected = "") {
        $fields = "CATEGORY.id, CATEGORY.name";
        $categories = getCategories(null, null, $fields);
        $options = '';
        foreach ($categories as $category) {
            $isSelected = $category->id == $selected ? "selected" : "";
            $options .= "<option $isSelected value='$category->id'>$category->name</option>";
        }
        return $options;
    }

    function generateUserRoles($selected = "") {
        $fields = "ROLE.id, ROLE.codename";
        $roles = getRoles(null, null, $fields);
        $options = '';
        foreach ($roles as $role) {
            $isSelected = $role->id == $selected ? "selected" : "";
            $options .= "<option $isSelected value='$role->id'>$role->codename</option>";
        }
        return $options;
    }

    function generateUserStatus($selected = "") {
        $status = ["S", "N"];
        $options = '';
        foreach ($status as $option) {
            $isSelected = $option == $selected ? "selected" : "";
            $options .= "<option $isSelected value='$option'>$option</option>";
        }
        return $options;
    }

    function actionButton($icon, $href = "#", $style = "border-radius: 50%") {
        return (
            "
                <a href='$href'>
                    <button type='button' class='btn btn-light' style='$style'>
                        $icon
                    </button>
                </a>
            "
        );
    }

    function redirectTo($url) { return "<script>location.href = '$url'</script>"; }

    function logout() {
        session_destroy();
        return (
            "
                (function () {
                    location.href = '/admin-dashboard/'
                })()
            ");
    }
