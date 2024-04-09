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

        <button class="btn btn-primary" data-toggle="modal" data-target="#addUser">

          Adicionar usuário

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

            <tr>
              
              <td>1</td>
              <td>Administrador do usuário</td>
              <td>admin</td>
              <td><img src="views/img/users/default/anonymous.png" class="img-thumbnail" width="40px"></td>
              <td>Administrador</td>
              <td><button class="btn btn-success btn-xs">Ativo</button></td>
              <td>21-03-2024 12:05:32</td>
              <td>

                <div class="btn-group">
                    
                  <button class="btn btn-primary"><i class="fa fa-pencil"></i></button>

                  <button class="btn btn-danger"><i class="fa fa-trash"></i></button>

                </div>  

              </td>

            </tr>

            <tr>
              
              <td>2</td>
              <td>Administrador do usuário</td>
              <td>admin</td>
              <td><img src="views/img/users/default/anonymous.png" class="img-thumbnail" width="40px"></td>
              <td>Administrator</td>
              <td><button class="btn btn-success btn-xs">Ativo</button></td>
              <td>21-02-2024 12:05:32</td>
              <td>

                <div class="btn-group">
                    
                  <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>

                  <button class="btn btn-danger"><i class="fa fa-trash"></i></button>

                </div>  

              </td>

            </tr>

             <tr>
              
              <td>3</td>
              <td>Administrador do usuário</td>
              <td>admin</td>
              <td><img src="views/img/users/default/anonymous.png" class="img-thumbnail" width="40px"></td>
              <td>Administrador</td>
              <td><button class="btn btn-success btn-xs">Ativo</button></td>
              <td>21-04-2024 12:05:32</td>
              <td>

                <div class="btn-group">
                    
                  <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>

                  <button class="btn btn-danger"><i class="fa fa-trash"></i></button>

                </div>  

              </td>

            </tr>

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

      <form role="form" method="POST" enctype="multipart/formdata">

        <!--=====================================
        HEADER
        ======================================-->

        <div class="modal-header" style="background: #DD4B39; color: #fff">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Adicionar usuário</h4>

        </div>

        <!--=====================================
        BODY
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!--NOME -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input class="form-control input-lg" type="text" name="newName" placeholder="Adicionar nome" required>

              </div>

            </div>

            <!-- USUÁRIO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-key"></i></span>

                <input class="form-control input-lg" type="text" name="newUser" placeholder="Adicionar nome de usuário" required>

              </div>

            </div>

            <!-- SENHA -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                <input class="form-control input-lg" type="text" name="newPasswd" placeholder="Adicionar senha" required>

              </div>

            </div>

            <!-- PERFIL -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-key"></i></span>

                <select class="form-control input-lg" name="newProfile">

                  <option value="">Selecione o perfil</option>
                  <option value="administrador">Administrador</option>
                  <option value="especial">Especial</option>
                  <option value="vendedor">Vendedor(a)</option>

                </select>

              </div>

            </div>

            <!-- IMAGEM -->

            <div class="form-group">

              <div class="panel">Enviar Imagem</div>

              <input id="newPhoto" type="file" name="newPhoto">

              <p class="help-block">Tamanho máximo 200Mb</p>

              <img src="views/img/users/default/anonymous.png" class="img-thumbnail" width="100px">

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

      </form>

    </div>

  </div>

</div>

<!--====  Fim do módulo adicionar usuário  ====-->
