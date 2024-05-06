<?php

 class ControllerCategories{

 	/*=============================================
	CRIA A CATEGORIA
	=============================================*/
	
	static public function ctrCreateCategory(){

		if(isset($_POST['newCategory'])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["newCategory"])){

				$table = 'categories';

				$data = $_POST['newCategory'];

				$answer = CategoriesModel::mdlAddCategory($table, $data);
				// var_dump($answer);

				if($answer == 'ok'){

					echo '<script>
						
						swal({
							type: "success",
							title: "A categoria foi salva com sucesso ",
							showConfirmButton: true,
							confirmButtonText: "Fechar"

							}).then(function(result){
								if (result.value) {

									window.location = "categories";

								}
							});
						
					</script>';
				}
				

			}else{

				echo '<script>
						
						swal({
							type: "error",
							title: "Sem caracteres especiais ou campos em branco",
							showConfirmButton: true,
							confirmButtonText: "Fechar"
				
							 }).then(function(result){

								if (result.value) {
									window.location = "categories";
								}
							});
						
				</script>';
				
			}
		}
	}

	/*=============================================
	EXIBE AS CATEGORIAS
	=============================================*/

	static public function ctrShowCategories($item, $value){

		$table = "categories";

		$answer = CategoriesModel::mdlShowCategories($table, $item, $value);

		return $answer;
	}
	/* --GRECAO ESTEVE AKI GRECAO ESTEVE AKIS-- */
	/*=============================================
	EDITAR CATEGORIA
	=============================================*/

	static public function ctrEditCategory(){

		if(isset($_POST["editCategory"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editCategory"])){

				$table = "categories";

				$data = array("Category"=>$_POST["editCategory"],
							   "id"=>$_POST["idCategory"]);

				$answer = CategoriesModel::mdlEditCategory($table, $data);
				// var_dump($answer);

				if($answer == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "A categoria foi salva com sucesso ",
						  showConfirmButton: true,
						  confirmButtonText: "Fechar"
						  }).then(function(result){
									if (result.value) {

									window.location = "categories";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "Sem caracteres especiais ou campos em branco",
						  showConfirmButton: true,
						  confirmButtonText: "Fechar"
						  }).then(function(result){
							if (result.value) {

							window.location = "categories";

							}
						})

			  	</script>';

			}

		}

	}
	/* --GRECAO ESTEVE AKI GRECAO ESTEVE AKIS-- */
	/*=============================================
	DELETA A CATEGORIA
	=============================================*/

	static public function ctrDeleteCategory(){

		if(isset($_GET["idCategory"])){

			$table ="categories";
			$data = $_GET["idCategory"];

			$answer = CategoriesModel::mdlDeleteCategory($table, $data);
			// var_dump($answer);

			if($answer == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "A categoria foi excluída com sucesso",
						  showConfirmButton: true,
						  confirmButtonText: "Fechar"
						  }).then(function(result){
									if (result.value) {

									window.location = "categories";

									}
								})

					</script>';
			}
		
		}
		
	}

}