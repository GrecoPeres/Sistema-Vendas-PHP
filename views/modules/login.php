<div id="back"></div>
  
<div class="login-box">

  <div class="login-logo">

    <img class="img-responsive" src="views/img/template/logo-greco-branca.png" style="padding: 30px 100px 0 100px">

  </div>

  <div class="login-box-body">

    <p class="login-box-msg">Faça login para iniciar sua sessão</p>

    <form method="post">

      <div class="form-group has-feedback">

        <input type="text" class="form-control" placeholder="Usuário" name="loginUser" required>

        <span class="glyphicon glyphicon-user form-control-feedback"></span>

      </div>

      <div class="form-group has-feedback">

        <input type="password" class="form-control" placeholder="Senha" name="loginPass" required>

        <span class="glyphicon glyphicon-lock form-control-feedback"></span>

      </div>

      <div class="row">

        <div class="col-xs-4">

          <button type="submit" class="btn btn-success btn-block btn-flat">Entrar</button>

        </div>

        <div class="col-xs-8 text-right">
          <a href="forgot-password.php" class="btn btn-link">Esqueceu a senha?</a>
        </div>
       
      </div>

      <?php

        $login = new ControllerUsers();
        $login -> ctrUserLogin();

      ?>

    </form>

  </div>

</div>
  
