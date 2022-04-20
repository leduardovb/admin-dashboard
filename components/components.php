<?php
    function productForm($product = null) {
        $title = $product ? "Editar produto" : "Cadastrar produto";
        $id = $product->id ?: "";
        $name = $product->name ?: "";
        $price = $product->price ?: "";
        $categoryId = $product->categoryId ?: "";
        $description = $product->description ?: "";
        $categories = generateProductCategoriesOptions($categoryId);
        return (
        "
            <div class='d-sm-flex align-items-center mb-4'>
                <h1 class='h3 mb-0 text-gray-800'>$title</h1>
            </div>
            <div class='container-fluid p-0 mt-1'>
                <form class='needs-validation' method='post' action='../services/product.php' novalidate>
                    <div class='form-row'>
                        <div class='form-group col-md-1'>
                            <label for='id'>Código</label>
                            <input type='text' class='form-control' name='id' value='$id' readonly>
                        </div>
                        <div class='form-group col-md-7'>
                            <label for='name'>Nome</label>
                            <input type='text' class='form-control' id='name' name='name' placeholder='Nome do produto' value='$name' required>
                            <div class='invalid-feedback'>
                                Nome do produto é obrigatório
                            </div>
                        </div>
                        <div class='form-group col-md-2'>
                            <label for='price'>Preço</label>
                            <input type='number' class='form-control' id='price' name='price' placeholder='Preço do produto' value='$price' required>
                            <div class='invalid-feedback'>
                                Preço do produto é obrigatório
                            </div>
                        </div>
                        <div class='form-group col-md-2'>
                            <label for='category_id'>Categoria</label>
                            <select class='form-control' id='category_id' name='category_id'>
                                $categories
                            </select>
                        </div>
                    </div>
                    <div class='form-row'>
                        <div class='form-group col-md-12'>
                            <label for='description'>Descrição</label>
                            <textarea class='form-control' id='description' name='description' style='resize: none; height: 30vh' placeholder='Descrição do produto'>$description</textarea>
                        </div>
                    </div>
                    <div class='form-row justify-content-end'>
                        <button type='submit' class='btn btn-primary' style='width: 10rem'>Salvar</button>
                    </div>
                </form>
            </div>
            ".validateForm()
        );
    }

    function categoryForm($category = null) {
        $title = $category ? "Editar categoria" : "Cadastrar categoria";
        $id = $category->id ?: "";
        $name = $category->name ?: "";
        return (
            "
                <div class='d-sm-flex align-items-center mb-4'>
                    <h1 class='h3 mb-0 text-gray-800'>$title</h1>
                </div>
                <div class='container-fluid p-0 mt-1'>
                    <form class='needs-validation' method='post' action='../services/category.php' novalidate>
                        <div class='form-row'>
                            <div class='form-group col-md-2'>
                                <label for='id'>Código</label>
                                <input type='text' class='form-control' name='id' value='$id' readonly>
                            </div>
                            <div class='form-group col-md-10'>
                                <label for='name'>Nome</label>
                                <input type='text' class='form-control' name='name' placeholder='Nome da categoria' value='$name' required>
                                <div class='invalid-feedback'>
                                    Nome da categoria é obrigatório
                                </div>
                            </div>
                        </div>
                        <div class='form-row justify-content-end'>
                            <button type='submit' class='btn btn-primary' style='width: 10rem'>Salvar</button>
                        </div>
                    </form>
                </div>
            ".validateForm()
        );
    }

    function userForm($user = null) {
        $title = $user ? "Editar usuário" : "Cadastrar usuário";
        $id = $user->id ?: "";
        $name = $user->name ?: "";
        $email = $user->email ?: "";
        $login = $user->login ?: "";
        $statusOptions = generateUserStatus($user->status);
        $readOnlyPassword = $id ? "readonly" : "";
        $roles = generateUserRoles($user->roleId);
        return (
            "
                <div class='d-sm-flex align-items-center mb-4'>
                    <h1 class='h3 mb-0 text-gray-800'>$title</h1>
                </div>
                <div class='container-fluid p-0 mt-1'>
                    <form class='needs-validation' method='post' action='../services/user.php' novalidate>
                        <div class='form-row'>
                            <div class='form-group col-md-2'>
                                <label for='id'>Código</label>
                                <input type='text' class='form-control' name='id' value='$id' readonly>
                            </div>
                            <div class='form-group col-md-5'>
                                <label for='name'>Nome</label>
                                <input type='text' class='form-control' name='name' placeholder='Nome do usuário' value='$name' required>
                                <div class='invalid-feedback'>
                                    Nome do usuário é obrigatório
                                </div>
                            </div>
                            <div class='form-group col-md-5'>
                                <label for='email'>Nome</label>
                                <input type='email' class='form-control' name='email' placeholder='E-mail' value='$email' required>
                                <div class='invalid-feedback'>
                                    E-mail é obrigatório
                                </div>
                            </div>
                        </div>
                        <div class='form-row'>
                            <div class='form-group col-md-4'>
                                <label for='login'>Login</label>
                                <input type='text' class='form-control' name='login' placeholder='Login' value='$login' required>
                                <div class='invalid-feedback'>
                                    Login é obrigatório
                                </div>
                            </div>
                            <div class='form-group col-md-4'>
                                <label for='password'>Login</label>
                                <input type='text' class='form-control' name='password' placeholder='Senha' $readOnlyPassword required>
                                <div class='invalid-feedback'>
                                    Senha é obrigatório
                                </div>
                            </div>
                            <div class='form-group col-md-2'>
                                <label for='role_id'>Cargo</label>
                                <select class='form-control' id='role_id' name='role_id'>
                                    $roles
                                </select>
                            </div>
                            <div class='form-group col-md-2'>
                                <label for='status'>Status</label>
                                <select class='form-control' id='status' name='status'>
                                    $statusOptions
                                </select>
                            </div>
                        </div>
                        <div class='form-row justify-content-end'>
                            <button type='submit' class='btn btn-primary' style='width: 10rem'>Salvar</button>
                        </div>
                    </form>
                </div>
            ".validateForm()
        );
    }

function roleForm($role = null) {
    $title = $role ? "Editar tipo de usuário" : "Cadastrar tipo de usuário";
    $id = $role->id ?: "";
    $description = $role->description ?: "";
    $codename = $role->codename ?: "";
    return (
        "
                <div class='d-sm-flex align-items-center mb-4'>
                    <h1 class='h3 mb-0 text-gray-800'>$title</h1>
                </div>
                <div class='container-fluid p-0 mt-1'>
                    <form class='needs-validation' method='post' action='../services/role.php' novalidate>
                        <div class='form-row'>
                            <div class='form-group col-md-2'>
                                <label for='id'>Código</label>
                                <input type='text' class='form-control' name='id' value='$id' readonly>
                            </div>
                            <div class='form-group col-md-5'>
                                <label for='description'>Descrição</label>
                                <input type='text' class='form-control' name='description' placeholder='Descrição' value='$description' required>
                                <div class='invalid-feedback'>
                                    Descrição é obrigatório
                                </div>
                            </div>
                            <div class='form-group col-md-5'>
                                <label for='name'>Codinome</label>
                                <input type='text' class='form-control' name='codename' placeholder='Codinome' value='$codename' required>
                                <div class='invalid-feedback'>
                                    Codinome é obrigatório
                                </div>
                            </div>
                        </div>
                        <div class='form-row justify-content-end'>
                            <button type='submit' class='btn btn-primary' style='width: 10rem'>Salvar</button>
                        </div>
                    </form>
                </div>
            ".validateForm()
    );
}

    function validateForm() {
        return (
            "
                <script>
                    (function () {
                        'use strict'
                        var forms = document.querySelectorAll('.needs-validation')
                        Array.prototype.slice.call(forms)
                            .forEach(function (form) {
                                form.addEventListener('submit', function (event) {
                                    if (!form.checkValidity()) {
                                        event.preventDefault()
                                        event.stopPropagation()
                                    }
                                    form.classList.add('was-validated')
                                }, false)
                            })
                    })()
                </script>
            "
        );
    }
