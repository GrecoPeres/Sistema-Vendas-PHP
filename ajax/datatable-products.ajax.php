<?php

require_once "../controllers/products.controller.php";
require_once "../models/products.model.php";

require_once "../controllers/categories.controller.php";
require_once "../models/categories.model.php";

class productsTable{

	/*=============================================
 	 EXIBIR PRODUTOS DA TABELA
  	=============================================*/ 
	public function showProductsTable(){

		$item = null;
		$value = null;
		$order = "id";

		$products = controllerProducts::ctrShowProducts($item, $value, $order);

		if(count($products) == 0){

			$jsonData = '{"data":[]}';

			echo $jsonData;

			return;
		}

		$jsonData = '{
			"data":[';

				for($i=0; $i < count($products); $i++){


					/*=============================================
					IMG DO PRODUTO
					=============================================*/
					
					$image = "<img src='".$products[$i]["image"]."' width='40px'>";

					/*=============================================
					CATEGORIA DO PRODUTO
					=============================================*/
					
					$item = "id";
				  	$value = $products[$i]["idCategory"];

				  	$categories = ControllerCategories::ctrShowCategories($item, $value);

					/*=============================================
					ESTOQUE
					=============================================*/
				  	
				  	if($products[$i]["stock"] <= 10){

		  				$stock = "<button class='btn btn-danger'>".$products[$i]["stock"]."</button>";

		  			}else if($products[$i]["stock"] > 11 && $products[$i]["stock"] <= 15){

		  				$stock = "<button class='btn btn-warning'>".$products[$i]["stock"]."</button>";

		  			}else{

		  				$stock = "<button class='btn btn-success'>".$products[$i]["stock"]."</button>";

		  			}

		  			/*=============================================
		 	 		BOTÕES DE AÇÕES
		  			=============================================*/ 
		  			if (isset($_GET["hiddenProfile"]) && $_GET["hiddenProfile"] == "Gerente") {
		  				$buttons =  "<div class='btn-group'><button class='btn btn-primary btnEditProduct' idProduct='".$products[$i]["id"]."' data-toggle='modal' data-target='#modalEditProduct'><i class='fa fa-pencil'></i></button></div>";
		  			}
		  			else{
		  				$buttons =  "<div class='btn-group'><button class='btn btn-primary btnEditProduct' idProduct='".$products[$i]["id"]."' data-toggle='modal' data-target='#modalEditProduct'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnDeleteProduct' idProduct='".$products[$i]["id"]."' code='".$products[$i]["code"]."' image='".$products[$i]["image"]."'><i class='fa fa-trash'></i></button></div>";
		  			}

					$jsonData .='[
						"'.($i+1).'",
						"'.$image.'",
						"'.$products[$i]["code"].'",
						"'.$products[$i]["description"].'",
						"'.$categories["Category"].'",
						"'.$stock.'",
						"R$ '.$products[$i]["buyingPrice"].'",
						"R$ '.$products[$i]["sellingPrice"].'",
						"'.(new DateTime($products[$i]["date"]))->format('d/m/Y H:i:s').'",
						"'.$buttons.'"
					],';
				}

				$jsonData = substr($jsonData, 0, -1);
				$jsonData .= '] 

			}';

		echo $jsonData;
	}
}


/*=============================================
=============================================*/ 
$activateProducts = new productsTable();
$activateProducts -> showProductsTable();
