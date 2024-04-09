<?php

if($_SESSION["profile"] == "Seller"){

  echo '<script>

    window.location = "home";

  </script>';

  return;

}

?>
<div class="content-wrapper">

  <section class="content-header">

    <h1>

    Gestão de Produtos

    </h1>

    <ol class="breadcrumb">
		  
      <li><a href="home"><i class="fa fa-dashboard"></i> Início</a></li>

      <li class="active">Painel</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <button class="btn btn-success" data-toggle="modal" data-target="#addProduct"> <i class="fa fa-plus"></i> Adicionar Produto</button>

      </div>

      <div class="box-body">

        <table class="table table-bordered table-hover table-striped dt-responsive productsTable" width="100%">
       
          <thead>
            <tr>
             
             <th style="width:10px">#</th>
             <th>Imagem</th>
             <th>Código</th>
             <th>Descrição</th>
             <th>Categoria</th>
             <th>Estoque</th>
             <th>Preço de Compra</th>
             <th>Preço de Venda</th>
             <th>Data da Compra</th>
             <th>Ações</th>

           </tr> 

          </thead>

        </table>

        <input type="hidden" value="<?php echo $_SESSION['profile']; ?>" id="hiddenProfile">

      </div>
    
    </div>

  </section>

</div>

<!--=====================================
=            MÓDULO DE ADICIONAR PRODUTO           =
======================================-->

<!-- Modal -->
<div id="addProduct" class="modal fade" role="dialog">
	  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="POST" enctype="multipart/form-data">

        <!--=====================================
        HEADER
        ======================================-->

        <div class="modal-header" style="background: #DD4B39; color: #fff">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Adicionar produto</h4>

        </div>

        <!--=====================================
        BODY
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- input category -->
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <select class="form-control input-lg" id="newCategory" name="newCategory">

                  <option value="">Selecione a Categoria</option>

                   <?php

                    $item = null;
                    $value1 = null;

                    $categories = controllerCategories::ctrShowCategories($item, $value1);

                    foreach ($categories as $key => $value) {
                      
                      echo '<option value="'.$value["id"].'">'.$value["Category"].'</option>';
                    }

                  ?>

                </select>

              </div>

            </div>

            <!--CÓDIGO -->
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-code"></i></span>

                <input class="form-control input-lg" type="text" id="newCode" name="newCode" placeholder="Adicionar código do produto" required>

              </div>

            </div>

            <!-- DESCRIÇÃO -->
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>

                <input class="form-control input-lg" type="text" id="newDescription" name="newDescription" placeholder="Adicionar descrição/nome do produto" required>

              </div>

            </div>

             <!-- ESTOQUE -->
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-check"></i></span>

                <input class="form-control input-lg" type="number" id="newStock" name="newStock" placeholder="Adicionar Estoque" min="0" required>

              </div>

            </div>

            <!-- PREÇO DE COMPRA -->
            <div class="form-group row">

              <div class="col-xs-12 col-sm-6">

                <div class="input-group"> 

                  <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span> 

                  <input type="number" class="form-control input-lg" id="newBuyingPrice" name="newBuyingPrice" step="any" min="0" placeholder="Preço de Compra" required>

                </div>

              </div>
			    

              <!-- PREÇO DE VENDA -->
              <div class="col-xs-12 col-sm-6">  

                <div class="input-group"> 

                  <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span> 

                  <input type="number" class="form-control input-lg" id="newSellingPrice" name="newSellingPrice" step="any" min="0" placeholder="Preço de Venda" required>

                </div> 

                <br>

                <!-- PORCENTAGEM DE VENDA -->
                <div class="col-xs-6"> 

                  <div class="form-group">   

                    <label>     

                      <input type="checkbox" class="minimal percentage" checked>

                      Porcentagem de Uso

                    </label>

                  </div>

                </div>

                <!-- PORCENTAGEM -->
                <div class="col-xs-6" style="padding:0">

                  <div class="input-group"> 

                    <input type="number" class="form-control input-lg newPercentage" min="0" value="40" required>

                    <span class="input-group-addon"><i class="fa fa-percent"></i></span>

                  </div>

                </div>

              </div>

            </div>

            <!-- IMAGEM -->
            <div class="form-group">

              <div class="panel">Enviar Imagem</div>

              <input id="newProdPhoto" type="file" class="newImage" name="newProdPhoto">

              <p class="help-block">Tamanho máximo 2 MB</p>

              <img src="views/img/products/default/anonymous.png" class="img-thumbnail preview" alt="" width="100px">

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
	    

      <?php

          $createProduct = new ControllerProducts();
          $createProduct -> ctrCreateProducts();

        ?> 
    </div>

  </div>

</div>

<!--====  Fim do módulo adicionar produto  ====-->

<!--=====================================
EDITAR PRODUTO
======================================-->

<div id="modalEditProduct" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        HEADER
        ======================================-->

        <div class="modal-header" style="background:#DD4B39; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar produto</h4>

        </div>

        <!--=====================================
         BODY
        ======================================-->
		  
        <div class="modal-body">

          <div class="box-body">

            <!-- SELECIONE A CATEGORIA -->
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <select class="form-control input-lg" name="editCategory" readonly required>
                  
                  <option id="editCategory"></option>

                </select>

              </div>

            </div>

            <!-- CÓDIGO -->          
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-code"></i></span> 

                <input type="text" class="form-control input-lg" id="editCode" name="editCode" readonly required>

              </div>

            </div>

            <!-- DESCRIÇÃO -->
             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span> 

                <input type="text" class="form-control input-lg" id="editDescription" name="editDescription" required>

              </div>

            </div>

             <!-- ESTOQUE -->
             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-check"></i></span> 

                <input type="number" class="form-control input-lg" id="editStock" name="editStock" min="0" required>

              </div>

            </div>

             <!-- PREÇO DE COMPRA -->
             <div class="form-group row">

                <div class="col-xs-12 col-sm-6">
                
                  <div class="input-group">
                  
                    <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span> 

                    <input type="number" class="form-control input-lg" id="editBuyingPrice" name="editBuyingPrice" step="any" min="0" required>

                  </div>

                </div>  

                <!-- PREÇO DE VENDA -->
                <div class="col-xs-12 col-sm-6">
                
                  <div class="input-group">
                  
                    <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span> 

                    <input type="number" class="form-control input-lg" id="editSellingPrice" name="editSellingPrice" step="any" min="0" readonly required>

                  </div>
                
                  <br>

                  <!-- PORCENTAGEM DE VENDA -->
                  <div class="col-xs-6">
                    
                    <div class="form-group">
                      
                      <label>
                        
                        <input type="checkbox" class="minimal percentage" checked>
                        
                        Usar porcentagem

                      </label>

                    </div>

                  </div>

                  <!-- PORCENTAGEM -->
                  <div class="col-xs-6" style="padding:0">
                    
                    <div class="input-group">
                      
                      <input type="number" class="form-control input-lg newPercentage" min="0" value="40" required>

                      <span class="input-group-addon"><i class="fa fa-percent"></i></span>

                    </div>

                  </div>

                </div>

            </div>

            <!-- imagem -->
             <div class="form-group">
              
              <div class="panel">Enviar Imagem</div>

              <input type="file" class="newImage" name="editImage">

              <p class="help-block">Máximo de 2 MB</p>

              <img src="views/img/products/default/anonymous.png" class="img-thumbnail preview" width="100px">

              <input type="hidden" name="currentImage" id="currentImage">

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

        <?php

          $editProduct = new controllerProducts();
          $editProduct -> ctrEditProduct();

        ?>      

    </div>

  </div>

</div>  

<?php

  $deleteProduct = new controllerProducts();
  $deleteProduct -> ctrDeleteProduct();

?>
