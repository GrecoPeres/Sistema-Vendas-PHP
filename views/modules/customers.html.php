<div class="content-wrapper">

  <section class="content-header">

    <h1>

    Gestão de Clientes

    </h1>

    <ol class="breadcrumb">

      <li><a href="home"><i class="fa fa-dashboard"></i> Início</a></li>

      <li class="active">Painel</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <button class="btn btn-primary" data-toggle="modal" data-target="#addCustomer">

        Addicionar Cliente

        </button>

      </div>
      <div class="box-body">
        <table class="table table-bordered table-hover table-striped dt-responsive tables" width="100%">
       
          <thead>
           
           <tr>
             
           <th style="width:10px">#</th>
             <th>Nome</th>
             <th>I.D Doc.</th>
             <th>E-mail</th>
             <th>Contato</th>
             <th>Endereço</th>
             <th>Aniversário</th>
             <th>Total de Compras</th>
             <th>Última compra</th>
             <th>Último Login</th>
             <th>Ações</th>

           </tr> 

          </thead>

          <tbody>
          
            <tr>

              <td>1</td>

              <td>Juan Villegas</td>

              <td>8161123</td>

              <td>juan@mail.com</td>

              <td>555 57 67</td>

              <td>calle 27 # 40 - 36</td>

              <td>1982-15-11</td>

              <td>2017-12-11 12:05:32</td>

              <td>35</td>

              <td>2017-12-11 12:05:32</td>

              <td>

                <div class="btn-group">
                    
                  <button class="btn btn-primary"><i class="fa fa-pencil"></i></button>

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
MODAL ADICIONAR CLIENTE
======================================-->

<div id="addCustomer" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="POST">

        <!--=====================================
        MODAL HEADER
        ======================================-->

        <div class="modal-header" style="background: #DD4B39; color: #fff">
          
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
          <h4 class="modal-title">Adicionar Cliente</h4>

        </div>

        <!--=====================================
        MODAL BODY
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

             <!-- NAME INPUT -->

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input class="form-control input-lg" type="text" name="newCustomer" placeholder="Nome" required>
              </div>
            </div>

            <!-- I.D DOCUMENT INPUT -->


            <!-- EMAIL INPUT -->


            <!-- PHONE INPUT -->

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                <input class="form-control input-lg" type="text" name="newPhone" placeholder="phone" data-inputmask="'mask':'(99) 99999-9999'" data-mask>
              </div>
            </div>

            <!-- ADDRESS INPUT -->



             <!-- BIRTH DATE INPUT -->

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                <input class="form-control input-lg" type="text" name="newBirthdate" placeholder="Birth Date" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask>
              </div>
            </div>

          </div>

        </div>

        <!--=====================================
        MODAL FOOTER
        ======================================-->

        <div class="modal-footer">
          <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Fechar</button>
          <button type="submit" class="btn btn-success">Salvar Alterações</button>
        </div>
      </form>

     
    </div>

  </div>

</div>


