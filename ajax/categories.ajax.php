<?php

require_once "../controllers/categories.controller.php";
require_once "../models/categories.model.php";

class AjaxCategories{

	/*=============================================
	EDITAR CATEGORIA
	=============================================*/	

	public $idCategory;

	public function ajaxEditCategory(){

		$item = "id";
		$valor = $this->idCategory;

		$answer = ControllerCategories::ctrShowCategories($item, $valor);

		echo json_encode($answer);

	}
}

/*=============================================
EDITAR CATEGORÍA
=============================================*/	
if(isset($_POST["idCategory"])){

	$category = new AjaxCategories();
	$category -> idCategory = $_POST["idCategory"];
	$category -> ajaxEditCategory();
}
