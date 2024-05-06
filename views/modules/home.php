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

        if($_SESSION["profile"] =="Administrator"){

          include "home/top-boxes.php";

        }

      ?>
    
    </div>  
    
    <div class="row">
      <div class="row">

      <div class="col-lg-2" style="margin-left: 5rem">
        <?php
          include "home/shortcuts.php";
        ?>
      </div>


      
    </div>
    <div class="col-lg-12">
         
      <?php

      if($_SESSION["profile"] =="Special" || $_SESSION["profile"] =="Seller"){

         echo '<div class="box box-default">

         <div class="box-header">

         <h1>Bem-Vindo ' .$_SESSION["name"].' </h1>

         </div>

         </div>';

      }

      ?>

    </div>

  </section>

</div>
  
