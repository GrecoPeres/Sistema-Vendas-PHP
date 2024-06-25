<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Painel
      
      <small>Painel de Controle</small>

    </h1>

    <ol class="breadcrumb">

      <li><a href="#"><i class="fa fa-dashboard"></i> Início</a></li>

      <li class="active">Painel</li>

    </ol>

  </section>

  <section class="content">

    <div class="row">
      
      <?php

        if($_SESSION["profile"] =="Administrador(a)"){

          include "home/top-boxes.php";

        }

      ?>
    
    </div>  
    
    <div class="row">

      <div class="col-lg-12">

      <?php
        // Gráficos de Vendas 
        // if($_SESSION["profile"] =="Administrador(a)"){

        //   include "reports/sales-graph.php";

        // }

      ?>
      
      </div>

      <div class="col-lg-6">
        
        <?php
          // Gráfico de produtos mais vendidos
          // if($_SESSION["profile"] =="Administrador(a)"){

          //   include "reports/bestseller-products.php";

          // }

        ?>

      </div>  

       <div class="col-lg-6">
        
        <?php
          //Gráfico de produtos adicionados recentementes
          // if($_SESSION["profile"] =="Administrador(a)"){

          //   include "home/recent-products.php";

          // }

        ?>

      </div>
      
      <div class="col-lg-6">
        
        <?php
          //Gráfico de produtos adicionados recentementes

            include "home/card-shortcuts.php";

        ?>

      </div>

      <div class="col-lg-12">
           
        <?php

        if($_SESSION["profile"] =="Gerente" || $_SESSION["profile"] =="Vendedor(a)"){

           echo '<div class="box box-default">

           <div class="box-header">

           <h1>Bem-Vindo ' .$_SESSION["name"].' ❤</h1>

           </div>

           </div>';

        }

        ?>

      </div>

    </div>

  </section>

</div>
  
