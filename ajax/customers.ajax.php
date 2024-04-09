<?php

require_once "../controllers/customers.controller.php";
require_once "../models/customers.model.php";

class AjaxCustomers{

	/*=============================================
	EDITAR CLIENTE
	=============================================*/	

	public $idCustomer;

	public function ajaxEditCustomer(){

		$item = "id";
		$value = $this->idCustomer;

		$answer = ControllerCustomers::ctrShowCustomers($item, $value);

		echo json_encode($answer);


	}

}

/*=============================================
EDITAR CLIENTE
=============================================*/	

if(isset($_POST["idCustomer"])){

	$Customer = new AjaxCustomers();
	$Customer -> idCustomer = $_POST["idCustomer"];
	$Customer -> ajaxEditCustomer();

}