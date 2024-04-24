/*=============================================
EDITAR CLIENTE
=============================================*/

$(".tables").on("click", "tbody .btnEditCustomer", function(){

	var idCustomer = $(this).attr("idCustomer");

	var datum = new FormData();
    datum.append("idCustomer", idCustomer);

    $.ajax({

      url:"ajax/customers.ajax.php",
      method: "POST",
      data: datum,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(answer){
      
      	 $("#idCustomer").val(answer["id"]);
	       $("#editCustomer").val(answer["name"]);
	       $("#editIdDocument").val(answer["idDocument"]);
	       $("#editEmail").val(answer["email"]);
	       $("#editPhone").val(answer["phone"]);
	       $("#editAddress").val(answer["address"]);
         $("#editBirthdate").val(answer["birthdate"]);
	  }

  	})

})

/*=============================================
DELETE CUSTOMER
=============================================*/

$(".tables").on("click", "tbody .btnDeleteCustomer", function(){

	var idCustomer = $(this).attr("idCustomer");
	
	swal({
        title: 'Tem certeza que deseja deletar este cliente?',
        text: "Se não estiver, pode cancelar a ação!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Sim, deletar cliente!'
      }).then(function(result){
        if (result.value) {
          
            window.location = "index.php?route=customers&idCustomer="+idCustomer;
        }

  })

})