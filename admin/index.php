<?php include("head.php");?>


		<!-- *************
			************ Vendor Css Files *************
		************ -->
		<!-- DateRange css -->
		<link rel="stylesheet" href="vendor/daterange/daterange.css" />

	</head>

	<body>

		<!-- Loading starts -->
		<div id="loading-wrapper">
			<div class="spinner-border" role="status">
				<span class="sr-only">Loading...</span>
			</div>
		</div>
		<!-- Loading ends -->


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
						<li class="breadcrumb-item">Home</li>
						<li class="breadcrumb-item active">Admin Dashboard</li>
					</ol>

					<ul class="app-actions">
						<li>
							<a href="#" id="reportrange">
								<span class="range-text"></span>
								<i class="icon-chevron-down"></i>	
							</a>
						</li>
						<li>
							<a href="#">
								<i class="icon-export"></i>
							</a>
						</li>
					</ul>
				</div>
				<!-- Page header end -->
				
				<!-- Main container start -->
				<div class="main-container">

					<!-- Row start --
					<div class="row gutters">
						<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
							<div class="info-stats4">
								<div class="info-icon">
									<i class="icon-eye1"></i>
								</div>
								<div class="sale-num">
									<h3>9500</h3>
									<p>Visitors</p>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
							<div class="info-stats4">
								<div class="info-icon">
									<i class="icon-shopping-cart1"></i>
								</div>
								<div class="sale-num">
									<h3>2500</h3>
									<p>Orders</p>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
							<div class="info-stats4">
								<div class="info-icon">
									<i class="icon-shopping-bag1"></i>
								</div>
								<div class="sale-num">
									<h3>7500</h3>
									<p>Sales</p>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
							<div class="info-stats4">
								<div class="info-icon">
									<i class="icon-activity"></i>
								</div>
								<div class="sale-num">
									<h3>3500</h3>
									<p>Expenses</p>
								</div>
							</div>
						</div>
					</div>
					<!-- Row end -->

					<!-- Row start -->
					<div class="row gutters">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Suscriptores</div>
								</div>
								<div class="card-body pt-0">
									<div id="visitors"></div>
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

		<!-- Polyfill JS -->
		<script src="vendor/polyfill/polyfill.min.js"></script>

		<!-- Apex Charts -->
		<script src="vendor/apex/apexcharts.min.js"></script>
		
		<!--<script src="vendor/apex/admin/visitors.js"></script>-->
		
		<?php include("esta-visitantes.php");?>
		
		<script src="vendor/apex/admin/deals.js"></script>
		<script src="vendor/apex/admin/income.js"></script>
		<script src="vendor/apex/admin/customers.js"></script>

		<!-- Main JS -->
		<script src="js/main.js"></script>

	</body>

<!-- Mirrored from bootstrap.gallery/le-rouge/design-green/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Apr 2020 22:33:58 GMT -->
</html>