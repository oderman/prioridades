<?php include("head.php");?>


		<!-- *************
			************ Vendor Css Files *************
		************ -->
		<!-- DateRange css -->
		<link rel="stylesheet" href="vendor/daterange/daterange.css" />

		<!-- Input Tags css -->
		<link rel="stylesheet" href="vendor/input-tags/tagsinput.css" />

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
						<li class="breadcrumb-item"><a href="revistas.php">Revistas</a></li>
						<li class="breadcrumb-item active">Agregar</li>
					</ol>
				</div>
				<!-- Page header end -->
				
				<!-- Main container start -->
				<div class="main-container">
					
					<form id="form_subir" action="revistas-guardar.php" method="post" enctype="multipart/form-data">

					<!-- Row start -->
					<div class="row gutters">

						

						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="card">
								<div class="card-body">
									
									<div class="form-group row">
										<label for="titulo" class="col-sm-2 col-form-label col-form-label-sm">Titulo</label>
										<div class="col-sm-8">
											<input type="text" class="form-control form-control-sm" id="titulo" name="titulo" required>
										</div>
									</div>
									
									<div class="form-group row">
										<label for="fecha" class="col-sm-2 col-form-label col-form-label-sm">Fecha de publicación</label>
										<div class="col-sm-4">
											<input type="date" class="form-control form-control-sm" id="fecha" name="fecha" placeholder="col-form-label-sm" required>
										</div>
									</div>
									
									<div class="form-group row">
										<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Portada (772 x 1015)</label>
										<div class="col-sm-4">
											
											<div class="form-group row">
												<div class="input-group">
													<div class="custom-file">
														<input type="file" class="custom-file-input" id="portada" name="portada" required>
														<label class="custom-file-label" for="portada" aria-describedby="inputGroupFileAddon02">Escoja la imagen</label>
													</div>
													<div class="input-group-append">
														<span class="input-group-text" id="inputGroupFileAddon02">Upload</span>
													</div>
												</div>
												
												<p style="margin-top: 5px;"><a href="img/portadas/portadaEjemplo.jpeg" target="_blank" style="text-decoration: underline; color: blue;">Ver portada de ejemplo</a></p>
												
											</div>
											
										</div>
									</div>
									
									<div class="form-group row">
										<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Archivo en PDF</label>
										<div class="col-sm-4">
											
											<div class="form-group row">
												<div class="input-group">
													<div class="custom-file">
														<input type="file" class="custom-file-input" id="archivo" name="archivo" required>
														<label class="custom-file-label" for="archivo" aria-describedby="inputGroupFileAddon02">Escoja el PDF</label>
													</div>
													<div class="input-group-append">
														<span class="input-group-text" id="inputGroupFileAddon02">Upload</span>
													</div>
												</div>
											</div>
											
										</div>
									</div>
									
									<div class="progress">
													  <div class="progress-bar progress-bar-striped bg-success" id="barra_estado" role="progressbar" style="width: 0%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">0%</div>
													</div>
									

								</div>
							</div>
						</div>

						
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="card">
								<div class="card-body">

									<div class="form-group">
										<label for="descripcion">Breve descripción de la revista</label>
										<textarea class="form-control" id="descripcion" name="descripcion" rows="3"></textarea>
										
									</div>
									
								</div>
							</div>
						</div>
						
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Palabras clave</div>
								</div>
								<div class="card-body">
									<div class="form-group m-0">
										<input type="text" class="form-control" data-role="tagsinput" id="keywords" name="keywords">
										<small id="passwordHelpBlock" class="form-text text-muted">
											Coloque la palabra clave y pulse enter para colocar la siguiente, y así sucesivamente.
										</small>
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
					
					<script>
											document.addEventListener("DOMContentLoaded", () =>{
												let form = document.getElementById("form_subir");

												form.addEventListener("submit", function(event) {
													event.preventDefault();

													subir_archivos(this);
												});
											});

											function subir_archivos(form){
												let barra_estado = form.children[0];

												let peticion = new XMLHttpRequest();

												peticion.upload.addEventListener("progress", (event) => {
													let porcentaje = Math.round((event.loaded / event.total) * 100);

													document.getElementById("barra_estado").innerHTML = porcentaje+"%";
													document.getElementById("barra_estado").style.width = porcentaje+"%";

												});

												peticion.addEventListener("load", () => {
													document.getElementById("barra_estado").innerHTML = "Subido totalmente(100%)";
													
													setTimeout(redirect(), 2000);
													
													function redirect(){
														location.href='revistas.php?msg=1';
													}

												});

												peticion.open("POST", "revistas-guardar.php");
												peticion.send(new FormData(form));

											}

										</script>

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


		<!-- Main JS -->
		<script src="js/main.js"></script>

	</body>

<!-- Mirrored from bootstrap.gallery/le-rouge/design-green/form-inputs.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Apr 2020 22:37:23 GMT -->
</html>