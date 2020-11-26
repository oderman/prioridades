<header class="header">
					<div class="toggle-btns">
						<a id="toggle-sidebar" href="#">
							<i class="icon-list"></i>
						</a>
						<a id="pin-sidebar" href="#">
							<i class="icon-list"></i>
						</a>
					</div>
					<div class="header-items">

						<!-- Header actions start -->
						<ul class="header-actions">
							
							<li class="dropdown">
								<a href="#" id="userSettings" class="user-settings" data-toggle="dropdown" aria-haspopup="true">
									<span class="user-name"><?=$datosUsuarioActual['usr_nombres'];?></span>
									<span class="avatar">
										<img src="img/user6.png" alt="avatar">
										<span class="status busy"></span>
									</span>
								</a>
								<div class="dropdown-menu dropdown-menu-right" aria-labelledby="userSettings">
									<div class="header-profile-actions">
										<div class="header-user-profile">
											<div class="header-user">
												<img src="img/user6.png" alt="Admin Template">
											</div>
											<h5><?=$datosUsuarioActual['usr_nombres'];?></h5>
											<p>Admin</p>
										</div>
										<a href="perfil.php"><i class="icon-user1"></i> Mi perfil</a>
										<a href="clave.php"><i class="icon-lock2"></i> Cambiar clave</a>
										<a href="../salir.php"><i class="icon-log-out1"></i> Salir</a>
									</div>
								</div>
							</li>
						</ul>						
						<!-- Header actions end -->
					</div>
				</header>