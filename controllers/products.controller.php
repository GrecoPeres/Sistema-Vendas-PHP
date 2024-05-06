<?php

class controllerProducts{
	/* --GRECAO ESTEVE AKI GRECAO ESTEVE AKIS-- */
	/*=============================================
	exibo os produtos
	=============================================*/
	
	static public function ctrShowProducts($item, $value, $order){

		$table = "products";

		$answer = ProductsModel::mdlShowProducts($table, $item, $value, $order);

		return $answer;

	}

	/*=============================================
	CRIAR PRODUTO
	=============================================*/

	static public function ctrCreateProducts(){

		if(isset($_POST["newDescription"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["newDescription"]) &&
			   preg_match('/^[0-9]+$/', $_POST["newStock"]) &&	
			   preg_match('/^[0-9.]+$/', $_POST["newBuyingPrice"]) &&
			   preg_match('/^[0-9.]+$/', $_POST["newSellingPrice"])){

		   		/*=============================================
				VALIDAR IMAGEM
				=============================================*/

			   	$route = "views/img/products/default/anonymous.png";

			   	if(isset($_FILES["newProdPhoto"]["tmp_name"])){

					list($width, $height) = getimagesize($_FILES["newProdPhoto"]["tmp_name"]);

					$newWidth = 500;
					$newHeight = 500;

					/*=============================================
					crio a pasta para salvar a imagem
					=============================================*/

					$folder = "views/img/products/".$_POST["newCode"];

					mkdir($folder, 0755);
					/* --GRECAO ESTEVE AKI GRECAO ESTEVE AKIS-- */
					/*=============================================
					APLICo FUNÇÕES PHP PADRÃO DE ACORDO COM O FORMATO DE IMAGEM
					=============================================*/

					if($_FILES["newProdPhoto"]["type"] == "image/jpeg"){

						/*=============================================
						SALVo A IMAGEM NA PASTA
						=============================================*/

						$random = mt_rand(100,999);

						$route = "views/img/products/".$_POST["newCode"]."/".$random.".jpg";

						$origin = imagecreatefromjpeg($_FILES["newProdPhoto"]["tmp_name"]);						

						$destiny = imagecreatetruecolor($newWidth, $newHeight);

						imagecopyresized($destiny, $origin, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

						imagejpeg($destiny, $route);

					}

					if($_FILES["newProdPhoto"]["type"] == "image/png"){

						/*=============================================
						SALVo A IMAGEM NA PASTA
						=============================================*/

						$random = mt_rand(100,999);

						$route = "views/img/products/".$_POST["newCode"]."/".$random.".png";

						$origin = imagecreatefrompng($_FILES["newProdPhoto"]["tmp_name"]);						

						$destiny = imagecreatetruecolor($newWidth, $newHeight);

						imagecopyresized($destiny, $origin, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

						imagepng($destiny, $route);

					}

				}

				$table = "products";

				$data = array("idCategory" => $_POST["newCategory"],
							   "code" => $_POST["newCode"],
							   "description" => $_POST["newDescription"],
							   "stock" => $_POST["newStock"],
							   "buyingPrice" => $_POST["newBuyingPrice"],
							   "sellingPrice" => $_POST["newSellingPrice"],
							   "image" => $route);

				$answer = ProductsModel::mdlAddProduct($table, $data);

				if($answer == "ok"){

					echo'<script>

						swal({
							  type: "success",
							  title: "O produto foi adicionado com sucesso",
							  showConfirmButton: true,
							  confirmButtonText: "Fechar"
							  }).then(function(result){
										if (result.value) {

										window.location = "products";

										}
									})

						</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "O Produto não pode vir com campos vazios ou conter caracteres especiais!",
						  showConfirmButton: true,
						  confirmButtonText: "Fechar"
						  }).then(function(result){
							if (result.value) {

							window.location = "products";

							}
						})

			  	</script>';
			}

		}

	}
	/* --GRECAO ESTEVE AKI GRECAO ESTEVE AKIS-- */
	/*=============================================
	EDITO PRODUTO
	=============================================*/

	static public function ctrEditProduct(){

		if(isset($_POST["editDescription"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editDescription"]) &&
			   preg_match('/^[0-9]+$/', $_POST["editStock"]) &&	
			   preg_match('/^[0-9.]+$/', $_POST["editBuyingPrice"]) &&
			   preg_match('/^[0-9.]+$/', $_POST["editSellingPrice"])){

		   		/*=============================================
				VALIDAR IMAGEM
				=============================================*/

			   	$route = $_POST["currentImage"];

			   	if(isset($_FILES["editImage"]["tmp_name"]) && !empty($_FILES["editImage"]["tmp_name"])){

					list($width, $height) = getimagesize($_FILES["editImage"]["tmp_name"]);

					$newWidth = 500;
					$newHeight = 500;

					/*=============================================
					CRIO A PASTA ONDE IREMOS SALVAR A IMG DO PRODUTO
					=============================================*/

					$folder = "views/img/products/".$_POST["editCode"];

					/*=============================================
					VERIFICO SE TEMOS OUTRA FOTO NO BD
					=============================================*/

					if(!empty($_POST["currentImage"]) && $_POST["currentImage"] != "views/img/products/default/anonymous.png"){

						unlink($_POST["currentImage"]);

					}else{

						mkdir($folder, 0755);	
					
					}
					
					/*=============================================
					APLICo FUNÇÕES PHP PADRÃO DE ACORDO COM O FORMATO DE IMAGEM
					=============================================*/

					if($_FILES["editImage"]["type"] == "image/jpeg"){

						/*=============================================
						SALVo A IMAGEM NA PASTA
						=============================================*/

						$random = mt_rand(100,999);

						$route = "views/img/products/".$_POST["editCode"]."/".$random.".jpg";

						$origin = imagecreatefromjpeg($_FILES["editImage"]["tmp_name"]);						

						$destiny = imagecreatetruecolor($newWidth, $newHeight);

						imagecopyresized($destiny, $origin, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

						imagejpeg($destiny, $route);

					}

					if($_FILES["editImage"]["type"] == "image/png"){

						/*=============================================
						SALVo A IMAGEM NA PASTA
						=============================================*/

						$random = mt_rand(100,999);

						$route = "views/img/products/".$_POST["editCode"]."/".$random.".png";

						$origin = imagecreatefrompng($_FILES["editImage"]["tmp_name"]);

						$destiny = imagecreatetruecolor($newWidth, $newHeight);

						imagecopyresized($destiny, $origin, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

						imagepng($destiny, $route);

					}

				}

				$table = "products";

				$data = array("idCategory" => $_POST["editCategory"],
							   "code" => $_POST["editCode"],
							   "description" => $_POST["editDescription"],
							   "stock" => $_POST["editStock"],
							   "buyingPrice" => $_POST["editBuyingPrice"],
							   "sellingPrice" => $_POST["editSellingPrice"],
							   "image" => $route);

				$answer = ProductsModel::mdlEditProduct($table, $data);

				if($answer == "ok"){

					echo'<script>

						swal({
							  type: "success",
							  title: "O produto foi atualizado",
							  showConfirmButton: true,
							  confirmButtonText: "Fechar"
							  }).then(function(result){
										if (result.value) {

										window.location = "products";

										}
									})

						</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "O Produto não pode estar vazio ou ter caracteres especiais!",
						  showConfirmButton: true,
						  confirmButtonText: "Fechar"
						  }).then(function(result){
							if (result.value) {

							window.location = "products";

							}
						})

			  	</script>';
			}

		}

	}
	/* --GRECAO ESTEVE AKI GRECAO ESTEVE AKIS-- */
	/*=============================================
	DELETO O PRODUTO
	=============================================*/
	static public function ctrDeleteProduct(){

		if(isset($_GET["idProduct"])){

			$table ="products";
			$datum = $_GET["idProduct"];

			if($_GET["image"] != "" && $_GET["image"] != "views/img/products/default/anonymous.png"){

				unlink($_GET["image"]);
				rmdir('views/img/products/'.$_GET["code"]);

			}

			$answer = ProductsModel::mdlDeleteProduct($table, $datum);

			if($answer == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "O produto foi excluído com sucesso",
					  showConfirmButton: true,
					  confirmButtonText: "Fechar"
					  }).then(function(result){
								if (result.value) {

								window.location = "products";

								}
							})

				</script>';

			}		
		
		}

	}
	/* --GRECAO ESTEVE AKI GRECAO ESTEVE AKIS-- */
	/*=============================================
	MOSTRAR ADIÇÃO DAS VENDAS
	=============================================*/

	static public function ctrShowAddingOfTheSales(){

		$table = "products";

		$answer = ProductsModel::mdlShowAddingOfTheSales($table);

		return $answer;

	}

}