$(document).ready(function(){
	if($("#mes").attr('alt')==0)
	{
		$("#anio-reporte").focus();
		$("#mes").hide();
		$("#enviarBusqueda").hide();
	}
	else
	{
		if($("#mes").attr('alt')==1)
		{
			llenarMes();
			$("#enviarBusqueda").show();
			$("#mes").focus();
		}
		else
		{
			llenarMes();
			$("#enviarBusqueda").show();
			$("#anio-reporte").focus();	
		}
	}
});

function llenarMes()
{
	var parametros = {
        ref_anio: $("#anio-reporte").val(),
        tipo_trans: 'mesReferenciaTotal'
    }

    $.ajax({
        url: "assets/includes/datosReferencia.php",
        type: 'POST',
        async: false,
        data: parametros,
        dataType: "json",
        success: function (respuesta)
        {
        	if(respuesta.codigo == 1)
          	{
            	$("#mes").html(respuesta.mensaje);
          	}
          	else
          	{
          		$("#mes").html(respuesta.mensaje);
          	}
        }, 
        error: function (error) {
          console.log("ERROR: " + error);
        }
    });
}


$("#enviarBusqueda").click(function(){
	$("#resultado-busqueda").html("<spam><b>Procesando...</b></spam>");
	if(window.XMLHttpRequest)
	{
		xmlhttp = new XMLHttpRequest();
	}
	else
	{
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.open("GET","assets/includes/resultadoReferencia.php?fecha="+$("#anio-reporte").val()+"-"+$("#mes").val()+"&profesional="+$("#profesional").html()+"",true);
	xmlhttp.send();
	xmlhttp.onreadystatechange = function()
	{
		if(xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			$("#resultado-busqueda").html(xmlhttp.responseText);
		}
	}
});