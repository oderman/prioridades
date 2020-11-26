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
    <title>Prioridades | Clave Nueva</title>

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


        <form action="clave-nueva-cambiar.php" method="post">
            <input type="hidden" name="usuario" value="<?=$_GET["usrid"];?>">
            
            <div class="row justify-content-md-center">
                <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
                    <div class="login-screen">
                        <div class="login-box">
                            <a href="#" class="login-logo">
                                <img src="admin/img/logoprio.jpeg" alt="Revista prioridades" />
                            </a>
                            <h5>Clave nueva</h5>
                            <div class="form-group">
                                <input type="password" class="form-control" name="clavenueva" placeholder="Coloque su nueva clave" />
                            </div>

                            <div class="actions mb-4">
                                <button type="submit" class="btn btn-primary">Cambiar Clave</button>
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