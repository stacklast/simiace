
$('#loginform').on('click', '#btnLogin', function(){
        var usuario = $("#usuario").val();
        var clave = $("#clave").val();

        if (usuario == " ") {
            $("#usuario").focus();
            alert('Debe ingresar un usuario');
            return;
        }
        else if (clave == " ") {
            $("#clave").focus();
            alert('Debe ingresar una clave');
            return;
        }
        else{
            var datos = new FormData();
            datos.append("usuario",usuario);
            datos.append("clave",clave);
            datos.append("accion","login");

            $.ajax({
                
                url:"app/ajax/admin-ajax.php",
                    method: "POST",
                    data: datos,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType:"json",

                success: function(respuesta){
                  console.log(respuesta);
                    $("#message").html(respuesta.msj);

                    if(respuesta.status == 1){
                        window.location = '/SEK/'+respuesta.url;
                    }
                },

                error: function(respuesta){
                    console.log(respuesta);
                },

            });
        }
        
});

