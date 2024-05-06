<?php

class ControllerUsers{

	/*=============================================
	LOGIN DE USUÁRIO
	=============================================*/
	
	static public function ctrUserLogin(){

		if (isset($_POST["loginUser"])) {
			
			if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["loginUser"]) && 
				preg_match('/^[a-zA-Z0-9]+$/', $_POST["loginPass"])) {

				$encryptpass = crypt($_POST["loginPass"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
				
				$table = 'users';

				$item = 'user';
				$value = $_POST["loginUser"];

				$answer = UsersModel::MdlShowUsers($table, $item, $value);

				// var_dump($answer);

				if($answer["user"] == $_POST["loginUser"] && $answer["password"] == $encryptpass){

					if($answer["status"] == 1){

						$_SESSION["loggedIn"] = "ok";
						$_SESSION["id"] = $answer["id"];
						$_SESSION["name"] = $answer["name"];
						$_SESSION["user"] = $answer["user"];
						$_SESSION["photo"] = $answer["photo"];
						$_SESSION["profile"] = $answer["profile"];

						/*=============================================
						Data de registro para saber last_login
						=============================================*/

						date_default_timezone_set("America/Bogota");

						$date = date('d-m-y');
						$hour = date('H:i:s');

						$actualDate = $date.' '.$hour;

						$item1 = "lastLogin";
						$value1 = $actualDate;

						$item2 = "id";
						$value2 = $answer["id"];

						$lastLogin = UsersModel::mdlUpdateUser($table, $item1, $value1, $item2, $value2);

						if($lastLogin == "ok"){

							echo '<script>

								window.location = "home";

							</script>';

						}

					}else{
						
						echo '<br><div class="alert alert-danger">O usuário está desativado</div>';
					
					}

				}else{

					echo '<br><div class="alert alert-danger">Usuário ou senha incorretos</div>';
				
				}
			
			}
		
		}
	
	}


	/*=============================================
	Criar usuário
	=============================================*/
	
	static public function ctrCreateUser(){

		if (isset($_POST["newUser"])) {
			
			if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["newName"]) &&
				preg_match('/^[a-zA-Z0-9]+$/', $_POST["newUser"]) &&
				preg_match('/^[a-zA-Z0-9]+$/', $_POST["newPasswd"])){

				/*=============================================
				VALIDAR IMAGEM
				=============================================*/

				$photo = "";
			
				if (isset($_FILES["newPhoto"]["tmp_name"])){

					list($width, $height) = getimagesize($_FILES["newPhoto"]["tmp_name"]);
					
					$newWidth = 500;
					$newHeight = 500;

					/*=============================================
					Vamos criar a pasta para cada usuário
					=============================================*/

					$folder = "views/img/users/".$_POST["newUser"];

					mkdir($folder, 0755);

					/*=============================================
					Funções PHP dependendo da imagem
					=============================================*/

					if($_FILES["newPhoto"]["type"] == "image/jpeg"){

						$randomNumber = mt_rand(100,999);
						
						$photo = "views/img/users/".$_POST["newUser"]."/".$randomNumber.".jpg";
						
						$srcImage = imagecreatefromjpeg($_FILES["newPhoto"]["tmp_name"]);
						
						$destination = imagecreatetruecolor($newWidth, $newHeight);

						imagecopyresized($destination, $srcImage, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

						imagejpeg($destination, $photo);

					}

					if ($_FILES["newPhoto"]["type"] == "image/png") {

						$randomNumber = mt_rand(100,999);
						
						$photo = "views/img/users/".$_POST["newUser"]."/".$randomNumber.".png";
						
						$srcImage = imagecreatefrompng($_FILES["newPhoto"]["tmp_name"]);
						
						$destination = imagecreatetruecolor($newWidth, $newHeight);

						imagecopyresized($destination, $srcImage, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

						imagepng($destination, $photo);
					}

				}

				$table = 'users';

				$encryptpass = crypt($_POST["newPasswd"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				$data = array('name' => $_POST["newName"],
							  'user' => $_POST["newUser"],
								'password' => $encryptpass,
								'profile' => $_POST["newProfile"],
								'photo' => $photo);

				$answer = UsersModel::mdlAddUser($table, $data);

				if ($answer == 'ok') {

						echo '<script>
						
						swal({
							type: "success",
							title: "Usuário adicionado com sucesso!",
							showConfirmButton: true,
							confirmButtonText: "Fechar"

						}).then(function(result){

							if(result.value){

								window.location = "users";
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

							if(result.value){

								window.location = "users";
							}

						});
					
				</script>';
			}
			
		}
	}

	/*=============================================
	VER USUÁRIOS
	=============================================*/

	static public function ctrShowUsers($item, $value){

		$table = "users";

		$answer = UsersModel::MdlShowUsers($table, $item, $value);

		return $answer;
	}

	/*=============================================
	EDITAR USUÁRIOS
	=============================================*/

	static public function ctrEditUser(){

		if (isset($_POST["EditUser"])) {
			
			if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["EditName"])){

				/*=============================================
				VALIDAR IMAGEM
				=============================================*/

				$photo = $_POST["currentPicture"];

				if(isset($_FILES["editPhoto"]["tmp_name"]) && !empty($_FILES["editPhoto"]["tmp_name"])){

					list($width, $height) = getimagesize($_FILES["editPhoto"]["tmp_name"]);
					
					$newWidth = 500;
					$newHeight = 500;

					/*=============================================
					Vamos criar a pasta para cada usuário
					=============================================*/

					$folder = "views/img/users/".$_POST["EditUser"];

					/*=============================================
					primeiro se existe uma imagem no banco de dados
					=============================================*/

					if (!empty($_POST["currentPicture"])){
						
						unlink($_POST["currentPicture"]);

					}else{

						mkdir($folder, 0755);

					}

					/*=============================================
					Funções PHP dependendo da imagem
					=============================================*/

					if($_FILES["editPhoto"]["type"] == "image/jpeg"){

						/*SALVo A IMAGEM NA PASTA*/

						$randomNumber = mt_rand(100,999);
						
						$photo = "views/img/users/".$_POST["EditUser"]."/".$randomNumber.".jpg";
						
						$srcImage = imagecreatefromjpeg($_FILES["editPhoto"]["tmp_name"]);
						
						$destination = imagecreatetruecolor($newWidth, $newHeight);

						imagecopyresized($destination, $srcImage, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

						imagejpeg($destination, $photo);

					}
					
					if ($_FILES["editPhoto"]["type"] == "image/png") {

						/*SALVo A IMAGEM NA PASTA*/

						$randomNumber = mt_rand(100,999);
						
						$photo = "views/img/users/".$_POST["EditUser"]."/".$randomNumber.".png";
						
						$srcImage = imagecreatefrompng($_FILES["editPhoto"]["tmp_name"]);
						
						$destination = imagecreatetruecolor($newWidth, $newHeight);

						imagecopyresized($destination, $srcImage, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

						imagepng($destination, $photo);
					}

				}

				
				$table = 'users';

				if($_POST["EditPasswd"] != ""){

					if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["EditPasswd"])){

						$encryptpass = crypt($_POST["EditPasswd"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

					}

					else{

						echo '<script>
					
							swal({
								type: "error",
								title: "Nenhum caractere especial na senha ou campos em branco",
								showConfirmButton: true,
								confirmButtonText: "Fechar"

								}).then(function(result){
										
									if (result.value) {
						
										window.location = "users";

									}
								});
							
						</script>';
					}
				
				}else{

					$encryptpass = $_POST["currentPasswd"];
					
				}

				$data = array('name' => $_POST["EditName"],
								'user' => $_POST["EditUser"],
								'password' => $encryptpass,
								'profile' => $_POST["EditProfile"],
								'photo' => $photo);

				$answer = UsersModel::mdlEditUser($table, $data);

				if ($answer == 'ok') {
					
					echo '<script>
					
						swal({
							type: "success",
							title: "Usuário editado com sucesso!",
							showConfirmButton: true,
							confirmButtonText: "Fechar"

						 }).then(function(result){
							
							if (result.value) {

								window.location = "users";
							}

						});
					
					</script>';
				}
				else{
					echo '<script>
						
						swal({
							type: "error",
							title: "Nenhum caractere especial no nome ou campo em branco",
							showConfirmButton: true,
							confirmButtonText: "Fechar"
							 }).then(function(result){
									
								if (result.value) {

									window.location = "users";
								
								}

							});
						
					</script>';
				}
			
			}	
		
		}
	
	}

	/*=============================================
	DELETAR USUÁRIO
	=============================================*/

	static public function ctrDeleteUser(){

		if(isset($_GET["userId"])){

			$table ="users";
			$data = $_GET["userId"];

			if($_GET["userPhoto"] != ""){

				unlink($_GET["userPhoto"]);				
				rmdir('views/img/users/'.$_GET["username"]);

			}

			$answer = UsersModel::mdlDeleteUser($table, $data);

			if($answer == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "O usuário foi excluído com sucesso",
					  showConfirmButton: true,
					  confirmButtonText: "Fechar"

					  }).then(function(result){
					  	
						if (result.value) {

						window.location = "users";

						}
					})

				</script>';

			}		

		}

	}
	
}

