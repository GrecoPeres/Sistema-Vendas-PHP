<?php

class Connection{

	public function connect(){

		$link = new PDO("mysql:host=localhost;dbname=posystem", "greco", "greco2024");

		$link -> exec("set names utf8");

		return $link;
	}

}