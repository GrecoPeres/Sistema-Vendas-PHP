<header class="main-header">
	<!--==========================
	=            logo            =
	===========================-->
	<a href="home" class="logo">
		
		<!-- mini logo -->

		<span class="logo-mini">

			<img class="img-responsive" src="views/img/template/logo-greco-branca.png" style="margin-top: 10px; padding: 0 5px;" >

		</span>

		<!-- logo -->

		<span class="logo-lg">

			<!-- <img class="img-responsive" src="views/img/template/logo-greco-branca.png"  > -->
			<p>Greco Sisteminha <img class="img-responsive" src="views/img/template/logo-greco-branca.png"></p>

		</span>

	</a>
	  
	<!--=====================================
	=            nav         =
	======================================-->
	
	<nav class="navbar navbar-static-top" role="navigation">
		
		<!-- Nav BOTÃO -->

		<a class="sidebar-toggle" data-toggle="push-menu" role="button" href="#">

			<span class="sr-only">Alternar de navegação</span>

		</a>

		<!-- USUÁRIO -->

		<div class="navbar-custom-menu">

			<ul class="nav navbar-nav">

				<li class="dropdown user user-menu">

					<a class="dropdown-toggle" data-toggle="dropdown" href="#">

						<?php 

							if ($_SESSION["photo"] != "") {
								
								echo '<img src="'.$_SESSION["photo"].'"class="user-image">';
							
							}else{

								echo '<img class="user-image" src="views/img/users/default/anonymous.png">';
							}

						?>
						
						<span class="hidden-xs"><?php echo $_SESSION["name"]; ?></span>

					</a>

					<!-- dropdown toggle -->

					<ul class="dropdown-menu">

						<li class="user-body">

							<div class="pull-right">
								<p class="hidden-xs"><?php echo $_SESSION["name"]; ?></p>

								<a class="btn btn-default btn-flat" href="logout">Sair</a>

							</div>  

						</li>

					</ul>

				</li>

			</ul>
			
		</div>
		
	</nav>
	
</header>