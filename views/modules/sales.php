<?php

if($_SESSION["profile"] == "Gerente"){

  echo '<script>

    window.location = "home";

  </script>';

  return;

}


$xml = ControllerSales::ctrDownloadXML();

if($xml){

  rename($_GET["xml"].".xml", "xml/".$_GET["xml"].".xml");

  echo '<a class="btn btn-block btn-success openXML" file="xml/'.$_GET["xml"].'.xml" href="sales">The XML file has been created succesfully<span class="fa fa-times pull-right"></span></a>';

}

?>
<div class="content-wrapper">

  <section class="content-header">

    <h1>
	  
    Gerenciamento de vendas

    </h1>

    <ol class="breadcrumb">

      <li><a href="home"><i class="fa fa-dashboard"></i> Início</a></li>

      <li class="active">Painel</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <a href="create-sale">
          <button class="btn btn-success" >
        
          <i class="fa fa-plus"></i> Adicionar venda
  
          </button>
        </a>

        <button type="button" class="btn btn-primary pull-right" id="daterange-btn">
           
            <span>
              <i class="fa fa-calendar"></i> Intervalo de datas
            </span>

            <i class="fa fa-caret-down"></i>

        </button>

      </div>

      <div class="box-body">
		  
        <table class="table table-bordered table-hover table-striped dt-responsive tables" width="100%">
       
          <thead>
           
           <tr>
             
             <th style="width:10px">#</th>
             <th>Conta</th>
             <th>Cliente</th>
             <th>Vendedor(a)</th>
             <th>Forma de pagamento</th>
             <th>Custo líquido</th>
             <th>Custo total</th>
             <th>Data</th>
             <th>Ações</th>

           </tr> 

          </thead>

          <tbody>

            <?php

          if(isset($_GET["initialDate"])){

            $initialDate = $_GET["initialDate"];
            $finalDate = $_GET["finalDate"];

          }else{

            $initialDate = null;
            $finalDate = null;

          }

          $answer = ControllerSales::ctrSalesDatesRange($initialDate, $finalDate);

          foreach ($answer as $key => $value) {
           

           echo '<td>'.($key+1).'</td>

                  <td>'.$value["code"].'</td>';

                  $itemCustomer = "id";
                  $valueCustomer = $value["idCustomer"];

                  $customerAnswer = ControllerCustomers::ctrShowCustomers($itemCustomer, $valueCustomer);

                  echo '<td>'.$customerAnswer["name"].'</td>';

                  $itemUser = "id";
                  $valueUser = $value["idSeller"];

                  $userAnswer = ControllerUsers::ctrShowUsers($itemUser, $valueUser);

                  echo '<td>'.$userAnswer["name"].'</td>

                  <td>'.$value["paymentMethod"].'</td>

                  <td>R$ '.number_format($value["netPrice"], 2, ',', '.').'</td>

                  <td>R$ '.number_format($value["totalPrice"], 2, ',', '.').'</td>

                  <td>'.(new DateTime($value["saledate"]))->format('d/m/Y H:i:s').'</td>

                  <td>

                    <div class="btn-group">
                        
                      <div class="btn-group">';

                       if($_SESSION["profile"] == "Administrador"){
                        
                         echo '<button class="btn btn-primary btnEditSale" idSale="'.$value["id"].'"><i class="fa fa-pencil"></i></button>

                          <button class="btn btn-danger btnDeleteSale" idSale="'.$value["id"].'"><i class="fa fa-trash"></i></button>';
                       }

                   echo '</div>  

                  </td>

                </tr>';
            }

        ?>


          </tbody>

        </table>

         <?php

          $deleteSale = new ControllerSales();
          $deleteSale -> ctrDeleteSale();

          ?>

      </div>
    
    </div>
	  
  </section>

</div>