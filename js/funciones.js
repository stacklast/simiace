
$('#maac').click(function () {
	$('#myModal').modal('show');
	$('#id').val('1');
});

$('#mscra').click(function () {
	$('#myModal').modal('show');
	$('#id').val('2');
});

$('#mce').click(function () {
	$('#myModal').modal('show');
	$('#id').val('3');
});

$('#mac').click(function () {
	$('#myModal').modal('show');
	$('#id').val('4');
});

$('#btnMetodo').click(function () {

	var id = $('#id').val();
	var titulo = $('#titulo').val();
	var descripcion = $('#descripcion').val();

	if (titulo == "") {
        $("#titulo").focus();
        swal({
			  html:true,
		      title: "Advertencia!",
		      text: 'Debe ingresar un titulo',
		      type: "warning",
		      confirmButtonText: "¡Cerrar!"
		    });
        return;
    }
    else if (descripcion == "") {
        $("#descripcion").focus();
        swal({
			  html:true,
		      title: "Advertencia!",
		      text: 'Debe ingresar una descripcion de la investigación',
		      type: "warning",
		      confirmButtonText: "¡Cerrar!"
		    });
        return;
    }
    else{
    	var datos = new FormData();
        datos.append("metodo",id);
        datos.append("titulo",titulo);
        datos.append("descripcion",descripcion);
        datos.append("accion",'InsertarInvestigacion');

		$.ajax({
			url: 'http://localhost/SEK/app/ajax/admin-metodos-ajax.php',
			method: "POST",
		    data: datos,
		    cache: false,
		    contentType: false,
		    processData: false,
		    dataType:"json",

		  	success: function(respuesta){
		      console.log(respuesta);
		      if(respuesta.status == 1){
		      	swal({
				  html:true,
			      title: "Exito!",
			      text: respuesta.msj,
			      type: "success",
			      confirmButtonText: "¡Cerrar!"
			    });
			    window.location = '/SEK/'+respuesta.url;
		      }
		      else{
		      	swal({
				  html:true,
			      title: "Error!",
			      text: respuesta.msj,
			      type: "error",
			      confirmButtonText: "¡Cerrar!"
			    });
		      }
		    },
		    error: function(respuesta){
		      	console.log(respuesta);
		    },
		});
    }
});


$('#perdidaPersona').click(function () {
	$('#perdidatipo').val('persona');
	$('#myModalperdida').modal('show');
});
$('#perdidaPropiedad').click(function () {
	$('#perdidatipo').val('propiedad');
	$('#myModalperdida').modal('show');
});
$('#perdidaProceso').click(function () {
	$('#perdidatipo').val('proceso');
	$('#myModalperdida').modal('show');
});
$('#perdidaAmbiente').click(function () {
	$('#perdidatipo').val('ambiente');
	$('#myModalperdida').modal('show');
});

$('#btnGuardarPerdida').click(function () {
	var perdidatipo = $('#perdidatipo').val();
	var descripcionperdida = $('#descripcionperdida').val();
	var contactos = $('#contactos').val();
	var acto = $('#acto').val();
	var condicion = $('#condicion').val();
	var id_investigacion = $('#id_investigacion').val();


	if(descripcionperdida == ""){
		$("#descripcionperdida").focus();
        swal({
			  html:true,
		      title: "Advertencia!",
		      text: 'Debe ingresar una Descripción de pérdida:',
		      type: "warning",
		      confirmButtonText: "¡Cerrar!"
		    });
        return;
	}
	else if (contactos == ""){
		$("#contactos").focus();
        swal({
			  html:true,
		      title: "Advertencia!",
		      text: 'Debe ingresar Contactos (Incidente Accidente)',
		      type: "warning",
		      confirmButtonText: "¡Cerrar!"
		    });
        return;
	}
	else if (acto == ""){
		$("#acto").focus();
        swal({
			  html:true,
		      title: "Advertencia!",
		      text: 'Debe ingresar Actos subestandares',
		      type: "warning",
		      confirmButtonText: "¡Cerrar!"
		    });
        return;
	}
	else if (condicion == ""){
		$("#condicion").focus();
        swal({
			  html:true,
		      title: "Advertencia!",
		      text: 'Debe ingresar Condiciones subestandares ',
		      type: "warning",
		      confirmButtonText: "¡Cerrar!"
		    });
        return;
	}
	else{
		var datos = new FormData();
        datos.append("perdidatipo",perdidatipo);
        datos.append("descripcionperdida",descripcionperdida);
        datos.append("contactos",contactos);
        datos.append("acto",acto);
        datos.append("condicion",condicion);
        datos.append("id_investigacion",id_investigacion);
        datos.append("accion",'InsertarPerdidaMAAC');

		$.ajax({
			url: 'http://localhost/SEK/app/ajax/admin-metodos-ajax.php',
			method: "POST",
		    data: datos,
		    cache: false,
		    contentType: false,
		    processData: false,
		    dataType:"json",

		  	success: function(respuesta){
		      console.log(respuesta);
		      if(respuesta.status == 1){
		      	swal({
				  html:true,
			      title: "Exito!",
			      text: respuesta.msj,
			      type: "success",
			      confirmButtonText: "¡Cerrar!"
			    });
			    location.reload();
		      }
		      else{
		      	swal({
				  html:true,
			      title: "Error!",
			      text: respuesta.msj,
			      type: "error",
			      confirmButtonText: "¡Cerrar!"
			    });
		      }
		    },
		    error: function(respuesta){
		      	console.log(respuesta);
		    },
		});
	}

});

$('#btnGuardarMAAC').click(function () {
	var id_investigacion = $('#id_investigacion').val();
	var factor_personal  = $('#factor_personal').val();
	var factor_trabajo   = $('#factor_trabajo').val();
	var falta_control    = $('#falta_control').val();

	if(factor_personal == ""){
		$("#factor_personal").focus();
        swal({
			  html:true,
		      title: "Advertencia!",
		      text: 'Debe ingresar Factores Personales:',
		      type: "warning",
		      confirmButtonText: "¡Cerrar!"
		    });
        return;
	}
	else if (factor_trabajo == ""){
		$("#factor_trabajo").focus();
        swal({
			  html:true,
		      title: "Advertencia!",
		      text: 'Debe ingresar Factores del Trabajo',
		      type: "warning",
		      confirmButtonText: "¡Cerrar!"
		    });
        return;
	}
	else if (falta_control == ""){
		$("#falta_control").focus();
        swal({
			  html:true,
		      title: "Advertencia!",
		      text: 'Debe ingresar Falta de Control',
		      type: "warning",
		      confirmButtonText: "¡Cerrar!"
		    });
        return;
	}
	else{
		var datos = new FormData();
        datos.append("falta_control",falta_control);
        datos.append("factor_trabajo",factor_trabajo);
        datos.append("factor_personal",factor_personal);
        datos.append("id_investigacion",id_investigacion);
        datos.append("accion",'InsertarMAAC');

		$.ajax({
			url: 'http://localhost/SEK/app/ajax/admin-metodos-ajax.php',
			method: "POST",
		    data: datos,
		    cache: false,
		    contentType: false,
		    processData: false,
		    dataType:"json",

		  	success: function(respuesta){
		      console.log(respuesta);
		      if(respuesta.status == 1){
		      	swal({
				  html:true,
			      title: "Exito!",
			      text: respuesta.msj,
			      type: "success",
			      confirmButtonText: "¡Cerrar!"
			    });
			    location.reload();
		      }
		      else{
		      	swal({
				  html:true,
			      title: "Error!",
			      text: respuesta.msj,
			      type: "error",
			      confirmButtonText: "¡Cerrar!"
			    });
		      }
		    },
		    error: function(respuesta){
		      	console.log(respuesta);
		    },
		});
	}
});

$('#btnGuardarMSCRA').click(function (event) {
	var id_investigacion = $('#id_investigacion').val();
	var que  	  = $('#que').val();
	var quien     = $('#quien').val();
	var donde     = $('#donde').val();
	var cuando    = $('#cuando').val();
	var como      = $('#como').val();
	var porque    = $('#porque').val();
	var accidente = $('#accidente').val();
	var causa     = $('#causa').val();
	var causa1     = $('#causa1').val();
	var causa2     = $('#causa2').val();
	var causa3     = $('#causa3').val();
	var causareal     = $('#causareal').val();

	var remedio = [];
    $('textarea[id^="remedio"]').each(function(){ remedio.push(this.value); }); 

    for (var i = 0; i < remedio.length; i++) {
    	if(remedio[i] == ""){
    		console.log("vacio");
    		swal({
			  html:true,
		      title: "Advertencia!",
		      text: 'Debe ingresar Todas los datos para Remedio',
		      type: "warning",
		      confirmButtonText: "¡Cerrar!"
		    });
    		event.stopPropagation();
    		return false;
    	}
    }
    
	if(que == "" || quien == "" || donde == "" || cuando == "" || como == "" || porque == ""){
        swal({
			  html:true,
		      title: "Advertencia!",
		      text: 'Debe ingresar Todos los datos de síntoma:',
		      type: "warning",
		      confirmButtonText: "¡Cerrar!"
		    });
        return;
	}
	else if (accidente == "" || causa == "" || causa1 == "" || causa2 == "" || causa3 == "" || causareal == ""){
        swal({
			  html:true,
		      title: "Advertencia!",
		      text: 'Debe ingresar Todas las Causas',
		      type: "warning",
		      confirmButtonText: "¡Cerrar!"
		    });
        return;
	}
	else{
		var datos = new FormData();
        datos.append("que",que);
        datos.append("quien",quien);
        datos.append("donde",donde);
        datos.append("cuando",cuando);
        datos.append("como",como);
        datos.append("porque",porque);
        datos.append("accidente",accidente);
        datos.append("causa",causa);
        datos.append("causa1",causa1);
        datos.append("causa2",causa2);
        datos.append("causa3",causa3);
        datos.append("causareal",causareal);
        datos.append("remedio[]",remedio);
        datos.append("id_investigacion",id_investigacion);
        datos.append("accion",'InsertarMSCRA');

		$.ajax({
			url: 'http://localhost/SEK/app/ajax/admin-metodos-ajax.php',
			method: "POST",
		    data: datos,
		    cache: false,
		    contentType: false,
		    processData: false,
		    dataType:"json",

		  	success: function(respuesta){
		      console.log(respuesta);
		      if(respuesta.status == 1){
		      	swal({
				  html:true,
			      title: "Exito!",
			      text: respuesta.msj,
			      type: "success",
			      confirmButtonText: "¡Cerrar!"
			    });
			    location.reload();
		      }
		      else{
		      	swal({
				  html:true,
			      title: "Error!",
			      text: respuesta.msj,
			      type: "error",
			      confirmButtonText: "¡Cerrar!"
			    });
		      }
		    },
		    error: function(respuesta){
		      	console.log(respuesta);
		    },
		});
	}
});

	$("a.nav-link").on('click',function(){
	    $(".tab-pane").hide();
	    $($(this).attr("href")).show();
	});

	$("#plus").on('click',function(){
	    $("#plus").before("<textarea id=\"remedio\" name=\"remedio[]\" rows=\"2\"></textarea>");
	});
	$('#minus').on('click',function(){
		if($('#rem textarea').length > 1){
			if($("#plus").prev().attr('name') == "remedio[]"){
				$("#plus").prev().remove();
			}
		}
	});


$( document ).ready(function() {
	var metodohead = $("#metodohead").val();
    $("#texto-navbar").html(metodohead);
});
  

//METODO 3

  $(document).ready(function(){
    $("#submit").click(function(){

       var dataString = { 
              label : $("#label").val(),
              link : $("#link").val(),
              id : $("#id").val()
            };

        $.ajax({
            type: "POST",
            url: "http://localhost/SEK/app/list/save_menu.php",
            data: dataString,
            dataType: "json",
            cache : false,
            success: function(data){
              if(data.type == 'add'){
                 $("#menu-id").append(data.menu);
              } else if(data.type == 'edit'){
                 $('#label_show'+data.id).html(data.label);
                 $('#link_show'+data.id).html(data.link);
              }
              $('#label').val('');
              $('#link').val('');
              $('#id').val('');
              $("#load").hide();
            } ,error: function(xhr, status, error) {
              alert(error);
            },
        });
    });

    $('.dd').on('change', function() {
     
          var dataString = { 
              data : $("#nestable-output").val(),
            };

        $.ajax({
            type: "POST",
            url: "list/save.php",
            data: dataString,
            cache : false,
            success: function(data){
              $("#load").hide();
            } ,error: function(xhr, status, error) {
              alert(error);
            },
        });
    });

    $("#save").click(function(){
     
          var dataString = { 
              data : $("#nestable-output").val(),
            };

        $.ajax({
            type: "POST",
            url: "list/save.php",
            data: dataString,
            cache : false,
            success: function(data){
              $("#load").hide();
              alert('Data has been saved');
          
            } ,error: function(xhr, status, error) {
              alert(error);
            },
        });
    });

 
    $(document).on("click",".del-button",function() {
        var x = confirm('Delete this menu?');
        var id = $(this).attr('id');
        if(x){
            $("#load").show();
             $.ajax({
                type: "POST",
                url: "http://localhost/SEK/app/list/delete.php",
                data: { id : id },
                cache : false,
                success: function(data){
                  $("#load").hide();
                  $("li[data-id='" + id +"']").remove();
                } ,error: function(xhr, status, error) {
                  alert(error);
                },
            });
        }
    });

    $(document).on("click",".edit-button",function() {
        var id = $(this).attr('id');
        var label = $(this).attr('label');
        var link = $(this).attr('link');
        $("#id").val(id);
        $("#label").val(label);
        $("#link").val(link);
    });

    $(document).on("click","#reset",function() {
        $('#label').val('');
        $('#link').val('');
        $('#id').val('');
    });

  });

