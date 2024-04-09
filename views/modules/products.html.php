
<div class="content-wrapper">

  <section class="content-header">

    <h1>

    Gestão de produtos

    </h1>

    <ol class="breadcrumb">

      <li><a href="home"><i class="fa fa-dashboard"></i> Início</a></li>

      <li class="active">Painel</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <button class="btn btn-success" data-toggle="modal" data-target="#addProduct">

        <i class="fa fa-plus"></i> Adicionar produto

        </button>

      </div>

      <div class="box-body">

        <table class="table table-bordered table-hover table-striped dt-responsive tables" width="100%">
       
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
             <th>Data Adicionada</th>
             <th>Ações</th>

           </tr> 

          </thead>

          <tbody>

              <tr>
                <td>1</td>
                <td><img src="views/img/products/default/anonymous.png" class="img-thumbnail" width="40px"></td>
                <td>0001</td>
                <td>Lorem Ipsum dolor sit</td>
                <td>Drills</td>
                <td>20</td>
                <td>$5.00</td>
                <td>$10.00</td>
                <td>2017-12-11 12:05:32</td>
                <td>

                  <div class="btn-group">
                      
                    <button class="btn btn-primary"><i class="fa fa-pencil"></i></button>

                    <button class="btn btn-danger"><i class="fa fa-trash"></i></button>

                  </div>  

                </td>

              </tr>

              <tr>
                <td>1</td>
                <td><img src="views/img/products/default/anonymous.png" class="img-thumbnail" width="40px"></td>
                <td>0001</td>
                <td>Lorem Ipsum dolor sit</td>
                <td>Drills</td>
                <td>20</td>
                <td>$5.00</td>
                <td>$10.00</td>
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
=            MÓDULO Adicionar produto            =
======================================-->

<!-- Modal -->
<div id="addProduct" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">

      <form role="form" method="POST" enctype="multipart/formdata">

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

            <!--Input Code -->
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-code"></i></span>

                <input class="form-control input-lg" type="text" name="newCode" placeholder="Adicionar código" required>

              </div>

            </div>

            <!-- DESCRIÇÃO -->
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>

                <input class="form-control input-lg" type="text" name="newDescription" placeholder="Adicionar descrição" required>

              </div>

            </div>

            <!-- CATEGORIA -->
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <select class="form-control input-lg" name="newCategory">

                  <option value="">Selecione a Categoria</option>
                  <option value="drills">Treinos</option>
                  <option value="scaffold">Andaime</option>
                  <option value="construction">Materiais de construção</option>

                </select>

              </div>

            </div>

             <!-- ESTOQUE -->
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-check"></i></span>

                <input class="form-control input-lg" type="number" name="newStock" placeholder="Adicionar Estoque" min="0" required>

              </div>

            </div>

             <!-- PREÇO DE COMPRA -->
             <div class="form-group row">

                <div class="col-xs-6">
                
                  <div class="input-group">
                  
                    <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span> 

                    <input type="number" class="form-control input-lg" id="newBuyingPrice" name="newBuyingPrice" step="any" min="0" placeholder="Preço de compra" required>

                  </div>

                </div>

                <!-- PREÇO DE VENDA -->
                <div class="col-xs-6">
                
                  <div class="input-group">
                  
                    <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span> 

                    <input type="number" class="form-control input-lg" id="newSellingPrice" name="newSellingPrice" step="any" min="0" placeholder="Preço de venda" required>

                  </div>
                
                  <br>

                  <!-- PORCENTAGEM DE CAIXA -->
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

            <!-- IMAGEM -->
            <div class="form-group">

              <div class="panel">Enviar Imagem</div>

              <input id="newProdPhoto" type="file" name="newProdPhoto">

              <p class="help-block">Tamanho máximo 2 MB</p>

              <img src="views/img/products/default/anonymous.png" alt="" width="100px">

            </div>

          </div>

        </div>

        <!--=====================================
        FOOTER
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Fechar</button>

          <button type="submit" class="btn btn-success">Salvar Produto</button>

        </div>

      </form>

    </div>

  </div>

</div>

<!--====  FIM DO MÓDULO DE ADICIONAR PRODUTO  ====-->
