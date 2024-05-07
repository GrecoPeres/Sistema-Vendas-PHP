<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Editar Venda

    </h1>

    <ol class="breadcrumb">

      <li><a href="home"><i class="fa fa-dashboard"></i> Início</a></li>

      <li class="active">Editar Venda</li>
		  
    </ol>

  </section>

  <section class="content">

    <div class="row">
      
      <!--=============================================
      FORMULÁRIO
      =============================================-->
      <div class="col-lg-5 col-xs-12">
        
        <div class="box box-default">

          <div class="box-header with-border"></div>

          <form role="form" method="post" class="saleForm">

            <div class="box-body">
                
                <div class="box">

                  <?php

                    $item = "id";
                    $value = $_GET["idSale"];

                    $sale = ControllerSales::ctrShowSales($item, $value);

                    $itemUser = "id";
                    $valueUser = $sale["idSeller"];

                    $seller = ControllerUsers::ctrShowUsers($itemUser, $valueUser);

                    $itemCustomers = "id";
                    $valueCustomers = $sale["idCustomer"];

                    $customers = ControllerCustomers::ctrShowCustomers($itemCustomers, $valueCustomers);

                    $taxPercentage = round($sale["tax"] * 100 / $sale["netPrice"]);
                ?>

                    <!--=====================================
                    =            ENTRADA DO VENDEDOR           =
                    ======================================-->
                  
                    
                    <div class="form-group">

                      <div class="input-group">
                        
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>

                        <input type="text" class="form-control" name="newSeller" id="newSeller" value="<?php echo $seller["name"]; ?>" readonly>

                        <input type="hidden" name="idSeller" value="<?php echo $seller["id"]; ?>">

                      </div>
		                     </div>


                    <!--=====================================
                    ENTRADA DE CÓDIGO
                    ======================================-->
                  
                    
                    <div class="form-group">

                      <div class="input-group">
                        
                        <span class="input-group-addon"><i class="fa fa-key"></i></span>

                        <input type="text" class="form-control" id="newSale" name="editSale" value="<?php echo $sale["code"]; ?>" readonly>

                      </div>


                    </div>


                    <!--=====================================
                    =            CONTRIBUIÇÃO DO CLIENTE          =
                    ======================================-->
                  
                      
                    <div class="form-group">

                      <div class="input-group">
                        
                        <span class="input-group-addon"><i class="fa fa-users"></i></span>

                        <select class="form-control" name="selectCustomer" id="selectCustomer" required>
                          
                            <option value="<?php echo $customers["id"]; ?>"><?php echo $customers["name"]; ?></option>

                            <?php 

                            $item = null;
                            $value = null;

                            $customers = ControllerCustomers::ctrShowCustomers($item, $value);

                            foreach ($customers as $key => $value) {
                              echo '<option value="'.$value["id"].'">'.$value["name"].'</option>';
                            }


                            ?>

                        </select>

                        <span class="input-group-addon"><button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modalAddCustomer" data-dismiss="modal">Add Customer</button></span>

                      </div>
		                     </div>

                    <!--=====================================
                    =            PRODUTO           =
                    ======================================-->
                  
                    
                    <div class="form-group row newProduct">
                      <?php

                        $productList = json_decode($sale["products"], true);

                        foreach ($productList as $key => $value) {

                          $item = "id";
                          $valueProduct = $value["id"];
                          $order = "id";

                          $answer = ControllerProducts::ctrShowproducts($item, $valueProduct, $order);

                          $lastStock = $answer["stock"] + $value["quantity"];
                          
                          echo '<div class="row" style="padding:5px 15px">
                    
                                <div class="col-xs-6" style="padding-right:0px">
                    
                                  <div class="input-group">
                        
                                    <span class="input-group-addon"><button type="button" class="btn btn-danger btn-xs removeProduct" idProduct="'.$value["id"].'"><i class="fa fa-trash"></i></button></span>

                                    <input type="text" class="form-control newProductDescription" idProduct="'.$value["id"].'" name="addProduct" value="'.$value["description"].'" readonly required>

                                  </div>

                                </div>

                                <div class="col-xs-3">
                      
                                  <input type="number" class="form-control newProductQuantity" name="newProductQuantity" min="1" value="'.$value["quantity"].'" stock="'.$lastStock.'" newStock="'.$value["stock"].'" required>

                                </div>

                                <div class="col-xs-3 enterPrice" style="padding-left:0px">

                                  <div class="input-group">

                                    <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>
                           
                                    <input type="text" class="form-control newProductPrice" realPrice="'.$answer["sellingPrice"].'" name="newProductPrice" value="'.$value["totalPrice"].'" readonly required>
           
                                  </div>
                       
                                </div>

                              </div>';
                        }


                        ?>

                    </div>

                    <input type="hidden" name="productsList" id="productsList">

                    <!--=====================================
                    =            BOTÃO DE ADD PRODUTO          =
                    ======================================-->
                    
                    <button type="button" class="btn btn-default hidden-lg btnAddProduct">Add Product</button>

                    <hr>
		                     <div class="row">

                      <!--=====================================
                        TAXAS/JUROS E O TOTAL
                      ======================================-->

                      <div class="col-xs-8 pull-right">

                        <table class="table">
                          
                          <thead>
                            
                            <th>Taxas/Juros</th>
                            <th>Total</th>

                          </thead>


                          <tbody>
                            
                            <tr>
                              
                              <td style="width: 50%">

                                <div class="input-group">
                                  
                                  <input type="number" class="form-control" name="newTaxSale" id="newTaxSale" value="<?php echo $taxPercentage; ?>" min="0" required>

                                  <input type="hidden" name="newTaxPrice" id="newTaxPrice" value="<?php echo $sale["tax"]; ?>" required>

                                  <input type="hidden" name="newNetPrice" id="newNetPrice" value="<?php echo $sale["netPrice"]; ?>" required>
                                  
                                  <span class="input-group-addon"><i class="fa fa-percent"></i></span>

                                </div>
                              </td>
					                               <td style="width: 50%">

                                <div class="input-group">
                                  
                                  <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>
                                  
                                  <input type="number" class="form-control" name="newSaleTotal" id="newSaleTotal" placeholder="00000" totalSale="<?php echo $sale["netPrice"]; ?>" value="<?php echo $sale["totalPrice"]; ?>" readonly required>

                                  <input type="hidden" name="saleTotal" id="saleTotal" value="<?php echo $sale["totalPrice"]; ?>" required>

                                </div>

                              </td>

                            </tr>

                          </tbody>

                        </table>
                        
                      </div>

                      <hr>
                      
                    </div>

                    <hr>

                    <!--=====================================
                      METODO DE PAGAMENTO
                      ======================================-->

                    <div class="form-group row">
                      
                      <div class="col-xs-6" style="padding-right: 0">

                        <div class="input-group">
                      
                          <select class="form-control" name="newPaymentMethod" id="newPaymentMethod" required>
                            
                              <option value="">-Selecione o método de pagamento-</option>
                              <option value="cash">Dinheiro</option>
                              <option value="CC">Cartão de Crédito</option>
                              <option value="DC">Cartão de Débito</option>

                          </select>

                        </div>

                      </div>

                      <div class="paymentMethodBoxes"></div>

                      <input type="hidden" name="listPaymentMethod" id="listPaymentMethod" required>

                    </div>

                    <br>
                    
                </div>

            </div>
             <div class="box-footer">
              <button type="submit" class="btn btn-success pull-right">Salvar</button>
            </div>
          </form>

          <?php

            $editSale = new ControllerSales();
            $editSale -> ctrEditSale();
            
          ?>

        </div>

      </div>


      <!--=============================================
      =            TABELA DE PRODUTOS                   =
      =============================================-->


      <div class="col-lg-7 hidden-md hidden-sm hidden-xs">
        
          <div class="box box-default">
            
            <div class="box-header with-border"></div>

            <div class="box-body">
              
              <table class="table table-bordered table-hover table-striped dt-responsive salesTable">
                  
                <thead>

                   <tr>
                     
                     <th style="width:10px">#</th>
                     <th>Imagem</th>
                     <th style="width:30px">Código</th>
                     <th>Descrição</th>
                     <th>Estoque</th>
                     <th>Ações</th>
		                    </tr> 

                </thead>

              </table>

            </div>

          </div>


      </div>

    </div>

  </section>

</div>


<!--=====================================
=            módulo adicionar cliente            =
======================================-->

<!-- Modal -->
<div id="modalAddCustomer" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <form role="form" method="POST">
        <div class="modal-header" style="background: #203680; color: #fff">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Adicionar Cliente</h4>
        </div>
        <div class="modal-body">
          <div class="box-body">

            <!--NOME -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input class="form-control input-lg" type="text" name="newCustomer" placeholder="Nome Completo" required>
              </div>
            </div>

            <!--ID -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                <input class="form-control input-lg" type="number" min="0" name="newIdDocument" placeholder="Identificação" required>
              </div>
            </div>

            <!-- E-mail -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                <input class="form-control input-lg" type="text" name="newEmail" placeholder="E-mail" required>
              </div>
            </div>

            <!--CELULAR -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                <input class="form-control input-lg" type="text" name="newPhone" placeholder="Celular" data-inputmask="'mask':'(99) 99999-9999'" data-mask required>
              </div>
            </div>

            <!--ENDEREÇO -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                <input class="form-control input-lg" type="text" name="newAddress" placeholder="Endereço" required>
              </div>
            </div>


            <!--Input phone -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                <input class="form-control input-lg" type="text" name="newBirthdate" placeholder="Birth Date" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask required>
              </div>
            </div>

          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Fechar</button>
          <button type="submit" class="btn btn-success">Salvar</button>
        </div>
      </form>  

      <?php

        $createCustomer = new ControllerCustomers();
        $createCustomer -> ctrCreateCustomer();

      ?>
    </div>

  </div>
</div>  

<!--====  Fim do modulo de adição Clientes ====-->