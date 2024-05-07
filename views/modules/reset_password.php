<?php
require_once "../../models/users.model.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se o nome de usuário foi enviado
    if (isset($_POST["username"])) {
        $username = $_POST["username"];

        // Verifica se o nome de usuário existe no banco de dados
        $user = UsersModel::MdlShowUsers("users_table", "username", $username);

        if ($user) {
            // Se o usuário existir, redireciona para a página onde ele pode definir uma nova senha
            header("Location: set_new_password.php?username=$username");
            exit();
        } else {
            // Se o usuário não existir, exiba uma mensagem de erro ou redirecione para a página de esqueceu a senha
            echo "Usuário não encontrado. Por favor, verifique o nome de usuário e tente novamente.";
        }
    }
}

// Se não houver dados de formulário POST, redirecione de volta para a página de esqueceu a senha
header("Location: forgot_password.php");
exit();
?>
