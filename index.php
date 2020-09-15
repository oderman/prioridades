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
		<title>Prioridades | Login</title>
		
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
			
			<?php if(isset($_GET["error"]) && $_GET["error"]==1){?>
								<p class="mt-2">
									<div class="alert alert-danger alert-dismissible fade show" role="alert">
										El usuario o clave no son correctos. Por favor verifique.
									</div>
								</p>
								<?php }?>

								<?php if(isset($_GET["error"]) && $_GET["error"]==2){?>
								<p class="mt-2">
									<div class="alert alert-danger alert-dismissible fade show" role="alert">
										Debes descargar la aplicación en tu celular y loguearte por ese medio.
									</div>
								</p>
								<?php }?>
			
			<form action="autentico.php" method="post">
				<div class="row justify-content-md-center">
					<div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
						<div class="login-screen">
							<div class="login-box">
								<a href="#" class="login-logo">
									<img src="admin/img/logoprio.jpeg" alt="Revista prioridades" />
								</a>
								<h5>Bienvenido,<br />Ingresa tus credenciales.</h5>
								<div class="form-group">
									<input type="text" class="form-control" name="user" placeholder="Usuario" />
								</div>
								<div class="form-group">
									<input type="password" class="form-control" name="pass" placeholder="Contraseña" />
								</div>
								
								<div class="actions mb-4">
									<button type="submit" class="btn btn-primary">Entrar</button>
								</div>
								
								<div class="forgot-pwd">
									<a class="link" href="recordar-clave.php">Olvidaste tu contraseña?</a>
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