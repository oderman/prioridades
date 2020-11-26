<?php include("head.php");?>


		<!-- *************
			************ Vendor Css Files *************
		************ -->
		<!-- DateRange css -->
		<link rel="stylesheet" href="vendor/daterange/daterange.css" />

		<!-- Data Tables -->
		<link rel="stylesheet" href="vendor/datatables/dataTables.bs4.css" />
		<link rel="stylesheet" href="vendor/datatables/dataTables.bs4-custom.css" />
		<link href="vendor/datatables/buttons.bs.css" rel="stylesheet" />

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
						<li class="breadcrumb-item active">Revistas</li>
					</ol>
				</div>
				<!-- Page header end -->
				
				<!-- Main container start -->
				<div class="main-container">

					<!-- Row start -->
					<div class="row gutters">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							
							<?php if(isset($_GET["msg"]) && $_GET["msg"]==1){?>
								<p class="mt-2">
									<div class="alert alert-primary alert-dismissible fade show" role="alert">
										El registro fue añadido correctamente.
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">×</span>
										</button>
									</div>
								</p>
								<?php }?>
						
							<?php if(isset($_GET["msg"]) && $_GET["msg"]==2){?>
								<p class="mt-2">
									<div class="alert alert-primary alert-dismissible fade show" role="alert">
										El registro fue eliminado correctamente.
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">×</span>
										</button>
									</div>
								</p>
								<?php }?>
					
					<?php if(isset($_GET["msg"]) && $_GET["msg"]==3){?>
								<p class="mt-2">
									<div class="alert alert-primary alert-dismissible fade show" role="alert">
										El registro fue actualizado correctamente.
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">×</span>
										</button>
									</div>
								</p>
								<?php }?>
							
							
							<div class="table-container">

								
								<div class="t-header">Revistas</div>
								
								<a href="revistas-agregar.php" class="btn btn-primary btn-lg"><span class="icon-add_circle"></span> AGREGAR NUEVA REVISTA</a>
								
								<div class="table-responsive">
									<table id="basicExample" class="table custom-table">
										<thead>
											<tr>
												<th>ID</th>
												<th>Portada</th>
												<th>Titulo</th>
												<th>Fecha de publicación</th>
												<th>Acciones</th>
											</tr>
										</thead>
										
										<tbody>
											<?php
											$consulta = $pdo->prepare("SELECT * FROM revistas");
											$consulta->execute();
											$res = $consulta->fetchAll();
											foreach($res as $datos){
											?>
											<tr>
												<td><?=$datos['rev_id'];?></td>
												<td><img src="img/portadas/<?=$datos['rev_portada'];?>" width="50"></td>
												<td><a href="revistas-descargar.php?file=<?=$datos['rev_archivo'];?>" target="_blank" style="text-decoration: underline;" data-toggle="tooltip" data-placement="top" title data-original-title="Descargar revista <?=$datos['rev_titulo'];?>."><?=$datos['rev_titulo'];?></a></td>
												<td><?=$datos['rev_publicacion'];?></td>
												<td>
													<a href="revistas-editar.php?idR=<?=$datos['rev_id'];?>" class="btn btn-info btn-sm">Editar</a>
													<a href="revistas-eliminar.php?idR=<?=$datos['rev_id'];?>" class="btn btn-danger btn-sm" onClick="if(!confirm('Está a punto de eliminar este registro. Esta opción es irreversible. Desea continuar?')){return false;}">Eliminar</a>
												</td>
											</tr>
											<?php }?>
											
										</tbody>
									</table>
								</div>
							</div>
							
						</div>
					</div>
					<!-- Row end -->

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

		<!-- Data Tables -->
		<script src="vendor/datatables/dataTables.min.js"></script>
		<script src="vendor/datatables/dataTables.bootstrap.min.js"></script>
		
		<!-- Custom Data tables -->
		<script src="vendor/datatables/custom/custom-datatables.js"></script>
		<script src="vendor/datatables/custom/fixedHeader.js"></script>

		<!-- Download / CSV / Copy / Print -->
		<script src="vendor/datatables/buttons.min.js"></script>
		<script src="vendor/datatables/jszip.min.js"></script>
		<script src="vendor/datatables/pdfmake.min.js"></script>
		<script src="vendor/datatables/vfs_fonts.js"></script>
		<script src="vendor/datatables/html5.min.js"></script>
		<script src="vendor/datatables/buttons.print.min.js"></script>


		<!-- Main JS -->
		<script src="js/main.js"></script>

	</body>

<!-- Mirrored from bootstrap.gallery/le-rouge/design-green/data-tables.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Apr 2020 22:38:54 GMT -->
</html>