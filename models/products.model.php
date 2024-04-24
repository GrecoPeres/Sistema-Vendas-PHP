<?php

require_once 'connection.php';

class ProductsModel{
	/* --GRECAO ESTEVE AKI GRECAO ESTEVE AKIS-- */
	/*=============================================
	PRODUTOS
	=============================================*/

	static public function mdlShowProducts($table, $item, $value, $order){

		if($item != null){

			$stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE $item = :$item ORDER BY id DESC");

			$stmt -> bindParam(":".$item, $value, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Connection::connect()->prepare("SELECT * FROM $table ORDER BY $order DESC");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}
	/* --GRECAO ESTEVE AKI GRECAO ESTEVE AKIS-- */
	/*=============================================
	ADICIONAR PRODUTOS
	=============================================*/
	static public function mdlAddProduct($table, $data){

		$stmt = Connection::connect()->prepare("INSERT INTO $table(idCategory, code, description, image, stock, buyingPrice, sellingPrice) VALUES (:idCategory, :code, :description, :image, :stock, :buyingPrice, :sellingPrice)");

		$stmt->bindParam(":idCategory", $data["idCategory"], PDO::PARAM_INT);
		$stmt->bindParam(":code", $data["code"], PDO::PARAM_STR);
		$stmt->bindParam(":description", $data["description"], PDO::PARAM_STR);
		$stmt->bindParam(":image", $data["image"], PDO::PARAM_STR);
		$stmt->bindParam(":stock", $data["stock"], PDO::PARAM_STR);
		$stmt->bindParam(":buyingPrice", $data["buyingPrice"], PDO::PARAM_STR);
		$stmt->bindParam(":sellingPrice", $data["sellingPrice"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}
	/* --GRECAO ESTEVE AKI GRECAO ESTEVE AKIS-- */
	/*=============================================
	EDITAR PRODUTOS
	=============================================*/
	static public function mdlEditProduct($table, $data){

		$stmt = Connection::connect()->prepare("UPDATE $table SET idCategory = :idCategory, description = :description, image = :image, stock = :stock, buyingPrice = :buyingPrice, sellingPrice = :sellingPrice WHERE code = :code");

		$stmt->bindParam(":idCategory", $data["idCategory"], PDO::PARAM_INT);
		$stmt->bindParam(":code", $data["code"], PDO::PARAM_STR);
		$stmt->bindParam(":description", $data["description"], PDO::PARAM_STR);
		$stmt->bindParam(":image", $data["image"], PDO::PARAM_STR);
		$stmt->bindParam(":stock", $data["stock"], PDO::PARAM_STR);
		$stmt->bindParam(":buyingPrice", $data["buyingPrice"], PDO::PARAM_STR);
		$stmt->bindParam(":sellingPrice", $data["sellingPrice"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}
	/* --GRECAO ESTEVE AKI GRECAO ESTEVE AKIS-- */
	/*=============================================
	DELETAR PRODUTO
	=============================================*/

	static public function mdlDeleteProduct($table, $data){

		$stmt = Connection::connect()->prepare("DELETE FROM $table WHERE id = :id");

		$stmt -> bindParam(":id", $data, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}
	/* --GRECAO ESTEVE AKI GRECAO ESTEVE AKIS-- */
	/*=============================================
	ATT PRODUTO
	=============================================*/

	static public function mdlUpdateProduct($table, $item1, $value1, $value){

		$stmt = Connection::connect()->prepare("UPDATE $table SET $item1 = :$item1 WHERE id = :id");

		$stmt -> bindParam(":".$item1, $value1, PDO::PARAM_STR);
		$stmt -> bindParam(":id", $value, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}
	/* --GRECAO ESTEVE AKI GRECAO ESTEVE AKIS-- */
	/*=============================================
	TOTAL DE VENDAS
	=============================================*/	

	static public function mdlShowAddingOfTheSales($table){

		$stmt = Connection::connect()->prepare("SELECT SUM(sales) as total FROM $table");

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;
	}


	
}