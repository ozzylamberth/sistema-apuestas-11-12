	function isNumber(campo){
		if(isNaN(campo))
			return false;
		else 
			return true;
	}


	function isEmpty(campo){
		if(campo[0] != ' ' && campo.length > 0){
			return false;
		}else{
			return true;
		}	
	}

	
	
	function chequeoSelect(campo){
		if (campo=="eleccion")
			return false;
		else
			return true;
	}

function abrirVentana(direccion, pantallacompleta, herramientas, direcciones, estado, barramenu, barrascroll, cambiatamano, ancho, alto, izquierda, arriba, sustituir){
     var opciones = "fullscreen=" + pantallacompleta +
                 ",toolbar=" + herramientas +
                 ",location=" + direcciones +
                 ",status=" + estado +
                 ",menubar=" + barramenu +
                 ",scrollbars=" + barrascroll +
                 ",resizable=" + cambiatamano +
                 ",width=" + ancho +
                 ",height=" + alto +
                 ",left=" + izquierda +
                 ",top=" + arriba;
     var ventana = window.open(direccion,"venta",opciones,sustituir);

} //onclick="abrirVentana('google.com',0,0,0,0,0,1,1,500,500,50,50,0);"

function PseudoSubmit(url,Documento){
	Documento.action=url;
	Documento.submit();
}