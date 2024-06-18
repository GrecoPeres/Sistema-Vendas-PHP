
<div class="content-wrapper">
	  
  <section class="content-header">

    <h1>

      Gerenciamento de usuários

    </h1>

    <ol class="breadcrumb">

      <li><a href="home"><i class="fa fa-dashboard"></i> Início</a></li>

      <li class="active">Painel</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <button class="btn btn-success" data-toggle="modal" data-target="#addUser">

         <i class="fa fa-plus"></i> Adicionar usuário

        </button>

      </div>

      <div class="box-body">

        <table class="table table-bordered table-hover table-striped dt-responsive tables" width="100%">
       
          <thead>
           
           <tr>
             
             <th style="width:10px">#</th>
             <th>Nome</th>
             <th>Nome de usuário</th>
             <th>Foto</th>
             <th>Perfil</th>
             <th>Status</th>
             <th>Último login</th>
             <th>Ações</th>

           </tr> 

          </thead>
           <tbody>

            <?php

              $item = null; 
              $value = null;

              $users = ControllerUsers::ctrShowUsers($item, $value);

              // var_dump($users);

              foreach ($users as $key => $value) {

                echo '

                  <tr>
                    <td>'.($key+1).'</td>
                    <td>'.$value["name"].'</td>
                    <td>'.$value["user"].'</td>';

                    if ($value["photo"] != ""){

                      echo '<td><img src="'.$value["photo"].'" class="img-thumbnail" width="40px"></td>';

                    }else{

                      echo '<td><img src="views/img/users/default/anonymous.png" class="img-thumbnail" width="40px"></td>';
                    
                    }

                    echo '<td>'.$value["profile"].'</td>';

                    if($value["status"] != 0){

                      echo '<td><button class="btn btn-success btnActivate btn-xs" userId="'.$value["id"].'" userStatus="0">Ativado(a)</button></td>';

                    }else{

                      echo '<td><button class="btn btn-danger btnActivate btn-xs" userId="'.$value["id"].'" userStatus="1">Desativado(a)</button></td>';
                    }
                    
                    echo '<td>'.$value["lastLogin"].'</td>

                    <td>

                      <div class="btn-group">
                          
                        <button class="btn btn-primary btnEditUser" idUser="'.$value["id"].'" data-toggle="modal" data-target="#editUser"><i class="fa fa-pencil"></i></button>

                        <button class="btn btn-danger btnDeleteUser" userId="'.$value["id"].'" username="'.$value["user"].'" userPhoto="'.$value["photo"].'"><i class="fa fa-trash"></i></button>

                      </div>  

                    </td>

                  </tr>';
              }

            ?>

          </tbody>

        </table>

      </div>
    
    </div>

  </section>

</div>

<!--=====================================
=            módulo adicionar usuário            =
======================================-->

<!-- Modal -->
<div id="addUser" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">

      <form role="form" method="POST" enctype="multipart/form-data">

        <!--=====================================
        HEADER
        ======================================-->

        <div class="modal-header" style="background: #203680; color: #fff">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Adicionar usuário</h4>

        </div>

        <!--=====================================
        BODY
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!--Input name -->
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input class="form-control input-lg" type="text" name="newName" placeholder="Digite o nome completo" required>

              </div>

            </div>

            <!-- NOME DO USUÁRIO -->
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-key"></i></span>

                <input class="form-control input-lg" type="text" id="newUser" name="newUser" placeholder="Insira nome de usuário" required>

              </div>

            </div>

            <!-- SENHA -->
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                <input class="form-control input-lg" type="password" name="newPasswd" placeholder="Digite a senha" required>

              </div>

            </div>

            <!-- PERFIL -->
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-key"></i></span>

                <select class="form-control input-lg" name="newProfile">

                  <option value="">Selecione o nível</option>
                  <option value="Administrador">Administrador</option>
                  <option value="Gerente">Gerente</option>
                  <option value="Vendedor(a)">Vendedor(a)</option>

                </select>

              </div>

            </div>

            <!-- IMAGEM -->
            <div class="form-group">

              <div class="panel">Enviar imagem</div>

              <input class="newPics" type="file" name="newPhoto">

              <p class="help-block">Tamanho máximo 2Mb</p>

              <img class="thumbnail preview" src="views/img/users/default/prfplaceholder.png" width="100px">

            </div>

          </div>

        </div>

        <!--=====================================
        FOOTER
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Fechar</button>

          <button type="submit" class="btn btn-success">Salvar</button>
          
        </div>

          <?php
            $createUser = new ControllerUsers();
            $createUser -> ctrCreateUser();
          ?>

      </form>

    </div>

  </div>

</div>
<!--====  Fim do módulo adicionar usuário  ====-->

<!--=====================================
=            usuário de edição de módulo            =
======================================-->

<!-- Modal -->
<div id="editUser" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">

      <form role="form" method="POST" enctype="multipart/form-data">

        <!--=====================================
        HEADER
        ======================================-->

        <div class="modal-header" style="background: #203680; color: #fff">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar</h4>

        </div>

        <!--=====================================
        BODY
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!--Input name -->
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input class="form-control input-lg" type="text" id="EditName" name="EditName" placeholder="Editar nome" required>

              </div>

            </div>

            <!-- nome de usuário -->
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-key"></i></span>

                <input class="form-control input-lg" type="text" id="EditUser" name="EditUser" placeholder="Editar nome de usuário" readonly>

              </div>

            </div>

            <!-- senha -->
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                <input class="form-control input-lg" type="password" name="EditPasswd" placeholder="Insira a nova senha">

                <input type="hidden" name="currentPasswd" id="currentPasswd">

              </div>

            </div>

            <!-- PERFIL -->
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-key"></i></span>

                <select class="form-control input-lg" name="EditProfile">

                  <option value="" id="EditProfile"></option>
                  <option value="Administrador">Administrador</option>
                  <option value="Gerente">Gerente</option>
                  <option value="Vendendor(a)">Vendendor(a)</option>

                </select>

              </div>

            </div>

            <!-- IMAGEM -->
            <div class="form-group">

              <div class="panel">Enviar Imagem</div>

              <input class="newPics" type="file" name="editPhoto">

              <p class="help-block">Tamanho máximo 2Mb</p>

              <img class="thumbnail preview" src="views/img/users/default/anonymous.png" alt="" width="100px">

              <input type="hidden" name="currentPicture" id="currentPicture">

            </div>

          </div>

        </div>

        <!--=====================================
        FOOTER
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Fechar</button>

          <button type="submit" class="btn btn-success">Editar</button>
          
        </div>

          <?php
            $editUser = new ControllerUsers();
            $editUser -> ctrEditUser();
          ?>

      </form>

    </div>

  </div>
	  
</div>

<?php

  $deleteUser = new ControllerUsers();
  $deleteUser -> ctrDeleteUser();

?> 