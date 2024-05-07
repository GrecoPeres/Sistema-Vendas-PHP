<?php

error_reporting(0);

if(isset($_GET["initialDate"])){

    $initialDate = $_GET["initialDate"];
    $finalDate = $_GET["finalDate"];

}else{

$initialDate = null;
$finalDate = null;

}

$answer = ControllerSales::ctrSalesDatesRange($initialDate, $finalDate);

$arrayDates = array();
$arraySales = array();
$addingMonthPayments = array();

foreach ($answer as $key => $value) {

    #We capture only year and month
	$singleDate = substr($value["saledate"],0,7);

    #Introduce dates in arrayDates
	array_push($arrayDates, $singleDate);

	#We capture the sales
	$arraySales = array($singleDate => $value["totalPrice"]);

    #we add payments made in the same month
	foreach ($arraySales as $key => $value) {
		
		$addingMonthPayments[$key] += $value;
	}

}


$noRepeatDates = array_unique($arrayDates);


?>

<!--=====================================
GRÁFICO DE VENDAS
======================================-->

  
<div class="box box-solid bg-red-gradient">
	
	<div class="box-header">
		
 		<i class="fa fa-th"></i>

  		<h3 class="box-title">Gráfico de Vendas</h3>

	</div>

	<div class="box-body border-radius-none newSalesGraph">

		<div class="chart" id="line-chart-Sales" style="height: 250px;"></div>

  </div>

</div>

<script>
	
 var line = new Morris.Line({
    element          : 'line-chart-Sales',
    resize           : true,
    data             : [

    <?php

    if($noRepeatDates != null){

	    foreach($noRepeatDates as $key){

	    	echo "{ y: '".$key."', Vendas: ".$addingMonthPayments[$key]." },";


	    }

	    echo "{y: '".$key."', Vendas: ".$addingMonthPayments[$key]." }";

    }else{

       echo "{ y: '0', Vendas: '0' }";

    }

    ?>

    ],
    xkey             : 'y',
    ykeys            : ['Vendas'],
    labels           : ['Vendas'],
    lineColors       : ['#efefef'],
    lineWidth        : 2,
    hideHover        : 'auto',
    gridTextColor    : '#fff',
    gridStrokeWidth  : 0.4,
    pointSize        : 4,
    pointStrokeColors: ['#efefef'],
    gridLineColor    : '#efefef',
    gridTextFamily   : 'Open Sans',
    preUnits         : 'R$',
    gridTextSize     : 10
  });

</script>