<?php

if($_SESSION["profile"] =="Vendedor(a)"){

  echo '<script>

    window.location = "home";

  </script>';

  return;

}

?>
  
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Gerenciamento de categoria
      </h1>
      <ol class="breadcrumb">
        <li><a href="home"><i class="fa fa-dashboard"></i> Início</a></li>
        <li class="active">Painel</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <button class="btn btn-success" data-toggle="modal" data-target="#addCategories"> <i class="fa fa-plus"></i> Adicionar categorias</button>

        </div>
        <div class="box-body">
          <table class="table table-bordered table-hover table-striped dt-responsive tables" width="100%">
         
            <thead>
             
             <tr>
               
               <th style="width:10px">#</th>
               <th>Categorias</th>
               <th>Ações</th>

             </tr> 

            </thead>

            <tbody>
              <?php

                $item = null; 
                $value = null;

                $categories = ControllerCategories::ctrShowCategories($item, $value);

                // var_dump($categories);

                foreach ($categories as $key => $value) {

                  echo '<tr>
                          <td>'.($key+1).'</td>
                          <td class="text-uppercase">'.$value['Category'].'</td>
                          <td>

                            <div class="btn-group">
                                
                              <button class="btn btn-primary btnEditCategory" idCategory="'.$value["id"].'" data-toggle="modal" data-target="#editCategories"><i class="fa fa-pencil"></i></button>

                              <button class="btn btn-danger btnDeleteCategory" idCategory="'.$value["id"].'"><i class="fa fa-trash"></i></button>

                            </div>  

                          </td>

                        </tr>';
                }

              ?>
              
            </tbody>

          </table>

		  

        </div>
      
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>


<!--=====================================
=            Modulo Adicionar categorias            =
======================================-->
  
<!-- Modal -->
<div id="addCategories" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <form role="form" method="POST">
        <div class="modal-header" style="background: #203680; color: #fff">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Adicionar categorias</h4>
        </div>
        <div class="modal-body">
          <div class="box-body">

            <!--Input name -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-th"></i></span>
                <input class="form-control input-lg" type="text" name="newCategory" placeholder="Adicionar categorias" required>
              </div>
            </div>

          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Fechar</button>
          <button type="submit" class="btn btn-success">Salvar categoria</button>
        </div>
      </form>
    </div>

  </div>
</div>

<?php
  
  $createCategory = new ControllerCategories();
  $createCategory -> ctrCreateCategory();
?>

  
<!--=====================================
=            Modulo Editar Categorias           =
======================================-->

<!-- Modal -->
<div id="editCategories" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <form role="form" method="POST">
        <div class="modal-header" style="background: #203680; color: #fff">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar Categorias</h4>
        </div>
        <div class="modal-body">
          <div class="box-body">

            <!--Input name -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-th"></i></span>
                <input class="form-control input-lg" type="text" id="editCategory" name="editCategory" required>
                <input type="hidden" name="idCategory" id="idCategory" required>
              </div>
            </div>
           </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Fechar</button>
          <button type="submit" class="btn btn-success">Salvar alterações</button>
        </div>

        <?php
  
          $editCategory = new ControllerCategories();
          $editCategory -> ctrEditCategory();
        ?>
      </form>
    </div>

  </div>
</div>
  
<?php
  
  $deleteCategory = new ControllerCategories();
  $deleteCategory -> ctrDeleteCategory();
?>