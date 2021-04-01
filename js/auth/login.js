function login(){
	
	$.ajax({
		url: 'Login/validatetest',
		type: 'POST',
		data: $("#frm_login").serialize(),
		success: function(err){
			try{
			var json = JSON.parse(err);
			document.location.replace(json.url);
			} catch(e){
			console.error('error in login process',e);
			}
			
		},
		statusCode: {
			400: function(XMLHttpRequest, textStatus, errorThrown){
				$("#email > input").removeClass('is-invalid');
				$("#password > input").removeClass('is-invalid');
				var json = JSON.parse(xhr.responseText);
				if(json.email.length != 0 ){
					$("#email >div").html(json.email);
					$("#email >input").addClass('is-invalid');
				}
				if(json.password.length != 0 ){
					$("#password >div").html(json.password);
					$("#password >input").addClass('is-invalid');
				}
		},
		401: function(XMLHttpRequest, textStatus, errorThrown){
			$("#password >input").addClass('is-invalid');
              console.log(textStatus);
             alert("rechazado error: 401");
			$("#alert").html('<div class="alert alert-danger" role="alert"></div>' );
			}		
		}
    	});
}




function test(){
    
    var respuesta='';
    $.ajax({
        url: 'Login/test',
        type: 'POST',
        data: $("#frm_cita").serialize(),
        success: function(respuesta, textStatus) {
                console.log(textStatus);
                alert('Se testeo correctamente.');
              },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
                alert('Error! no se pudo testear');
        }            
});
}


function mifuncion(){
 var alumnos = $(this);
     var idedo = $("#idedo option:selected").val();
     var val2 = $("#idedo option:selected").text();
	 //alert('Hello world!' + val2 );
//return;
    $.ajax({              
              url: 'getcities/', // the URL of the controller action method
              type: "POST",
              dataType: "json",
              data: {'idedo': idedo},//pasas tu parametro clave es nombre de tu variable quien lo a cacha
              //contentType: "application/json; charset=utf-8",
              success: function(respuesta, textStatus) {
                //JSON.parse(respuesta);      
                //$("#mens").html(respuesta);
                console.log(textStatus);
                 //result = JSON.parse(respuesta);
                 document.getElementById('idciudad').innerHTML = respuesta;                  
              },
              error: function (XMLHttpRequest, textStatus, errorThrown) {
                console.log(XMLHttpRequest.responseText);
                //document.getElementById('listafechascita').innerHTML = "";
                document.getElementById("hora").disabled = true;
                //document.getElementById("btnenviar").disabled = true;                
              }              
          });

    // if(diasemana==1 ||diasemana==2 || diasemana==6 ){
    //   for(var i = 0; i < respuesta.length; i++)
    //     options += '<option value="'+morning[i]+'" />';
    //   document.getElementById('listafechascita').innerHTML = options;
    }    

    function getidcity(){
 
     var idcity = $("#idciudad option:selected").val();
     var val2 = $("#idciudad option:selected").text();
	 alert('Hello world!' + val2);
return;
    }  
