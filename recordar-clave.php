<!doctype html>
<html lang="en">

<!-- Mirrored from bootstrap.gallery/le-rouge/design-green/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Apr 2020 22:40:33 GMT -->

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Meta -->
    <meta name="description" content="Responsive Bootstrap4 Dashboard Template">
    <meta name="author" content="ParkerThemes">
    <link rel="shortcut icon" href="img/fav.png" />

    <!-- Title -->
    <title>Prioridades | Recordar clave</title>

    <!-- *************
			************ Common Css Files *************
		************ -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="admin/css/bootstrap.min.css" />

    <!-- Master CSS -->
    <link rel="stylesheet" href="admin/css/main.css" />

</head>

<body class="authentication">

    <!-- Container start -->
    <div class="container">

        <?php if (isset($_GET["error"]) && $_GET["error"] == 1) { ?>
            <p class="mt-2">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Este email no existe en nuestro sistema.
                </div>
            </p>
        <?php } ?>

        <?php if (isset($_GET["msg"]) && $_GET["msg"] == 1) { ?>
            <p class="mt-2">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    La nueva clave ha sido enviada a su correo. Le recomendamos cambiarla a penas ingrese.
                </div>
            </p>
        <?php } ?>

        <form action="clave-enviar.php" method="post">
            <div class="row justify-content-md-center">
                <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
                    <div class="login-screen">
                        <div class="login-box">
                            <a href="#" class="login-logo">
                                <img src="admin/img/logoprio.jpeg" alt="Revista prioridades" />
                            </a>
                            <h5>Restaurar clave</h5>
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" placeholder="Coloque su email" />
                            </div>

                            <div class="actions mb-4">
                                <button type="submit" class="btn btn-primary">Restarurar clave</button>
                            </div>

                            <div class="forgot-pwd">
                                <a class="link" href="index.php">Ingresar al sistema</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
    <!-- Container end -->

</body>

<!-- Mirrored from bootstrap.gallery/le-rouge/design-green/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Apr 2020 22:40:33 GMT -->

</html>