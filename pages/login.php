<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin Dashboard</title>
    <link href="/admin-dashboard/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="/admin-dashboard/css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body class="body-container" style="height: 100vh">
    <div id="wrapper" style="height: 100%; align-items: center; justify-content: center">
        <div id="content-wrapper" class="d-flex flex-column w-auto p-5" style="background-color: white; border-radius: 4px; box-shadow: 2px 2px 5px gray"">
            <form class="d-flex flex-column justify-content-center align-items-center needs-validation w-auto" method="post" action="/admin-dashboard/services/authenticate.php" novalidate>
                <h1 class="mb-3">Login</h1>
                <div class='form-group col-md-12'>
                    <label for='name'>Email</label>
                    <input type='text' class='form-control' id='login' name='login' placeholder='Email' value='' required>
                    <div class='invalid-feedback'>
                        Email é obrigatório
                    </div>
                </div>
                <div class='form-group col-md-12'>
                    <label for='price'>Senha</label>
                    <input type='password' class='form-control' id='password' name='password' placeholder='Senha' value='' required>
                    <div class='invalid-feedback'>
                        Senha é obrigatória
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <button type='submit' class='btn btn-primary w-100 mt-3' style='width: 10rem'>Salvar</button>
                </div>
            </form>
        </div>
    </div>
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
    <script src="/admin-dashboard/vendor/jquery/jquery.min.js"></script>
    <script src="/admin-dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/admin-dashboard/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="/admin-dashboard/js/sb-admin-2.min.js"></script>
    <script src="/admin-dashboard/vendor/chart.js/Chart.min.js"></script>
    <script src="/admin-dashboard/js/demo/chart-area-demo.js"></script>
    <script src="/admin-dashboard/js/demo/chart-pie-demo.js"></script>
</body>
</html>