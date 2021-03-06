<?php include("head.php");?>

<?php
$consulta = $pdo->prepare("SELECT * FROM usuarios WHERE usr_id='".$_GET["idR"]."'");
$consulta->execute();
$datos = $consulta->fetch();
?>


		<!-- *************
			************ Vendor Css Files *************
		************ -->
		<!-- DateRange css -->
		<link rel="stylesheet" href="vendor/daterange/daterange.css" />

		<!-- Input Tags css -->
		<link rel="stylesheet" href="vendor/input-tags/tagsinput.css" />

		<!-- Bootstrap Select CSS -->
		<link rel="stylesheet" href="vendor/bs-select/bs-select.css" />

	</head>

	<body>

		<!-- Page wrapper start -->
		<div class="page-wrapper">
			
			<!-- Sidebar wrapper start -->
			<?php include("menu.php");?>
			<!-- Sidebar wrapper end -->

			<!-- Page content start  -->
			<div class="page-content">

				<!-- Header start -->
				<?php include("header.php");?>
				<!-- Header end -->

				<!-- Page header start -->
				<div class="page-header">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="index.php">Escritorio</a></li>
						<li class="breadcrumb-item"><a href="usuarios.php">Usuarios</a></li>
						<li class="breadcrumb-item active">Editar</li>
					</ol>
				</div>
				<!-- Page header end -->
				
				<!-- Main container start -->
				<div class="main-container">
					
					<a href="usuarios-editar-clave.php?idR=<?=$datos['usr_id'];?>" class="btn btn-info btn-sm mb-2">CAMBIAR CONTRASEÑA</a>
					
					<form id="form_subir" action="usuarios-actualizar.php" method="post" enctype="multipart/form-data">
						<input type="hidden" name="idR" value="<?=$_GET["idR"];?>">

					<!-- Row start -->
					<div class="row gutters">

						

						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="card">
								<div class="card-body">
									
									<div class="form-group row">
										<label for="titulo" class="col-sm-2 col-form-label col-form-label-sm">Fecha de registro</label>
										<div class="col-sm-6">
											<input type="text" class="form-control form-control-sm" value="<?=$datos['usr_registro'];?>" readonly>
										</div>
									</div>
									
									<div class="form-group row">
										<label for="apellidos" class="col-sm-2 col-form-label col-form-label-sm">Apellidos</label>
										<div class="col-sm-6">
											<input type="text" class="form-control form-control-sm" id="apellidos" name="apellidos" required value="<?=$datos['usr_apellidos'];?>">
										</div>
									</div>
									
									<div class="form-group row">
										<label for="nombres" class="col-sm-2 col-form-label col-form-label-sm">Nombres</label>
										<div class="col-sm-6">
											<input type="text" class="form-control form-control-sm" id="nombres" name="nombres" required value="<?=$datos['usr_nombres'];?>">
										</div>
									</div>
									
									<div class="form-group row">
										<label for="email" class="col-sm-2 col-form-label col-form-label-sm">Email</label>
										<div class="col-sm-6">
											<input type="email" class="form-control form-control-sm" id="email" name="email" required value="<?=$datos['usr_email'];?>">
										</div>
									</div>
									
									<div class="form-group row">
										<label for="email" class="col-sm-2 col-form-label col-form-label-sm">Tipo de usuario</label>
										<div class="col-sm-6">
											<select class="form-control selectpicker" data-live-search="true" name="tipo">
													<option value="1" <?php if($datos['usr_tipo']==1) {echo "selected";}?>>Administrador</option>
													<option value="2" <?php if($datos['usr_tipo']==2) {echo "selected";}?>>Usuario</option>
											</select>
										</div>
									</div>
									
									<div class="form-group row">
										<label for="email" class="col-sm-2 col-form-label col-form-label-sm">Suscripción</label>
										<div class="col-sm-6">
											<select class="form-control selectpicker" data-live-search="true" name="suscripcion">
													<option value="1" <?php if($datos['usr_suscripcion']==1) {echo "selected";}?>>Activa</option>
													<option value="0" <?php if($datos['usr_suscripcion']=='0') {echo "selected";}?>>Inactiva</option>
											</select>
										</div>
									</div>
									
									
								</div>
							</div>
						</div>

						
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-right">
							<button type="submit" class="btn btn-outline-primary btn-lg"><span class="icon-save1"></span> GUARDAR CAMBIOS</button>
						</div>


					</div>
					<!-- Row end -->
						
					</form>
					
						
					

				</div>
				<!-- Main container end -->

			</div>
			<!-- Page content end -->

		</div>
		<!-- Page wrapper end -->

		<!--**************************
			**************************
				**************************
							Required JavaScript Files
				**************************
			**************************
		**************************-->
		<!-- Required jQuery first, then Bootstrap Bundle JS -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.bundle.min.js"></script>
		<script src="js/moment.js"></script>


		<!-- *************
			************ Vendor Js Files *************
		************* -->
		<!-- Slimscroll JS -->
		<script src="vendor/slimscroll/slimscroll.min.js"></script>
		<script src="vendor/slimscroll/custom-scrollbar.js"></script>

		<!-- Daterange -->
		<script src="vendor/daterange/daterange.js"></script>
		<script src="vendor/daterange/custom-daterange.js"></script>
		
		<!-- Input Tags JS -->
		<script src="vendor/input-tags/tagsinput.min.js"></script>
		<script src="vendor/input-tags/typeahead.js"></script>
		<script src="vendor/input-tags/tagsinput-custom.js"></script>
		
		<!-- Bootstrap Select JS -->
		<script src="vendor/bs-select/bs-select.min.js"></script>


		<!-- Main JS -->
		<script src="js/main.js"></script>

	</body>

<!-- Mirrored from bootstrap.gallery/le-rouge/design-green/form-inputs.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Apr 2020 22:37:23 GMT -->
</html>