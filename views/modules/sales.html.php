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

        <a href="create-sales">
          <button class="btn btn-success" >
        
          <i class="fa fa-plus"></i> Adicionar venda
  
          </button>
        </a>
		  
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

          $item = null;
          $valor = null;

          $respuesta = ControladorVentas::ctrMostrarVentas($item, $valor);

          foreach ($respuesta as $key => $value) {
           

           echo '<td>'.($key+1).'</td>

                  <td>'.$value["codigo"].'</td>';

                  $itemCliente = "id";
                  $valorCliente = $value["id_cliente"];

                  $respuestaCliente = ControladorClientes::ctrMostrarClientes($itemCliente, $valorCliente);

                  echo '<td>'.$respuestaCliente["nombre"].'</td>';

                  $itemUsuario = "id";
                  $valorUsuario = $value["id_vendedor"];

                  $respuestaUsuario = ControladorUsuarios::ctrMostrarUsuarios($itemUsuario, $valorUsuario);

                  echo '<td>'.$respuestaUsuario["nombre"].'</td>

                  <td>'.$value["metodo_pago"].'</td>

                  <td>R$ '.number_format($value["neto"],2).'</td>

                  <td>R$ '.number_format($value["total"],2).'</td>

                  <td>'.$value["fecha"].'</td>

                  <td>

                    <div class="btn-group">
                        
                      <button class="btn btn-warning"><i class="fa fa-print"></i></button>

                      <button class="btn btn-primary btnEditarVenta" idVenta="'.$value["id"].'"><i class="fa fa-pencil"></i></button>

                      <button class="btn btn-danger btnEliminarVenta" idVenta="'.$value["id"].'"><i class="fa fa-trash"></i></button>

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