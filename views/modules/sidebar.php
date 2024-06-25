<aside class="main-sidebar">

	<section class="sidebar">
		
		<ul class="sidebar-menu">

			<?php

			if ($_SESSION["profile"] == "Administrador(a)") {
				
				echo '

					<li class="active">

						<a href="home">

							<i class="fa fa-home"></i>

							<span>Início</span>

						</a>

					</li>

					

				';
			}

			if($_SESSION["profile"] == "Administrador(a)" || $_SESSION["profile"] == "Gerente"){

				echo '

					<li>

						<a href="categories">

							<i class="fa fa-th"></i>

							<span>Categorias</span>

						</a>

					</li>

					<li>

						<a href="products">

							<i class="fa fa-product-hunt"></i>

							<span>Produtos</span>

						</a>

					</li>
				';

			}

			if($_SESSION["profile"] == "Administrador(a)" || $_SESSION["profile"] =="Vendedor(a)"){
				echo '
					
					<li>

						<a href="customers">

							<i class="fa fa-users"></i>

							<span>Clientes</span>

						</a>

					</li>

				';
			}

			if($_SESSION["profile"] == "Administrador(a)" || $_SESSION["profile"] =="Vendedor(a)"){

			echo'


				<li class="treeview">

				<a href="#">

					<i class="fa fa-usd"></i>

					<span>Vendas</span>

					<span class="pull-right-container">

						<i class="fa fa-angle-left pull-right"></i>

					</span>

				</a>

				<ul class="treeview-menu">

					<li>

						<a href="sales">

							<i class="fa fa-circle"></i>

							<span>Gerenciar Vendas</span>

						</a>

					</li>

					<li>

						<a href="create-sale">

							<i class="fa fa-circle"></i>

							<span>Criar venda</span>

						</a>

					</li> </ul>';

				}

				if($_SESSION["profile"] == "Administrador(a)"){

					echo '
					<li>

						<a href="users">

							<i class="fa fa-user"></i>

							<span>Gerenciamento de usuários</span>

						</a>

					</li>';

				}

				

		?>
			
		</ul>

	</section>
	  
</aside>