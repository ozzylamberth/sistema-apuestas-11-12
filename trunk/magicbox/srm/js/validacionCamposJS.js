function chequear(k){
	if(k.value.length==0){
			alert("Disculpe, el campo "+k.name+" no puede estar vacio");
			k.focus();
			return false;
			}
	else{
	return true;
	}
}

function chequearNombre(k){
	if(k.value.length==0){
			alert("Disculpe, el campo "+k.name+" no puede estar vacio");
			k.focus();
			return false;
	}else{
		for(i=0;i<10;i++){
			if(k.value.indexOf(i)!=-1){
				alert("Disculpe, el campo "+k.name+ " no puede contener numeros");
				k.focus();
				return false;
			}
		}
	}return true;
}//fin de chequearNombre

function chequearApellido(k){
	if(k.value.length==0){
			alert("Disculpe, el campo "+k.name+" no puede estar vacio");
			k.focus();
			return false;
	}else{
		for(i=0;i<10;i++){
			if(k.value.indexOf(i)!=-1){
				alert("Disculpe, el campo "+k.name+" no puede contener numeros");
				k.focus();
				return false;
			}
		}
	}return true;
}//fin de chequearApellido

function chequearCedula(k){
CI=k.value;
	if(CI.length==0){
			alert("Disculpe, el campo "+k.name+" no puede estar vacio");
			k.focus();
			return false;
			}
	if(CI.length<7 || CI.length>8){
			alert("Disculpe, el campo "+k.name+" debe contener entre 7 y 8 numeros ");
			document.f.CI.focus();
			return false;
			}
	if(isNaN(CI)){
		alert("Disculpe, el campo "+k.name+" debe contener obligatoriamente numeros válidos");
		document.f.CI.focus();
		return false;
		}
	else{ 
		return true;
		}
}//fin de chequearCedula

function chequearEmail(k){
	txt=document.f.Email.value;
	arroba=txt.indexOf("@");
	longuitud=txt.length;
	if(arroba<3) {
		alert("Disculpe, el campo "+k.name+" debe contener caracteres antes y despues del arroba (@) ");
		document.f.Email.focus();
		return false;
	}
	punto=txt.lastIndexOf(".");
	chequearUltimo=longuitud-punto;
	if(chequearUltimo<3) {
		alert("Disculpe, el campo "+k.name+" debe contener letras antes y despues del punto (.) ");
		document.f.Email.focus();
		return false;
	}
	verificar= txt.indexOf(".",arroba);
	longuitud=verificar-arroba;
	if (longuitud<2) {
		alert("Disculpe, el campo "+k.name+" debe contener un punto (.) despues de un arroba (@) ");
		document.f.Email.focus();
		return false;
	}  
	else{ 
		return true;
	}
	
	for(i=0;i<20;i++){
		if(k.value.indexOf(i)!=-1){
			alert("Disculpe, el campo "+k.name+" no puede contener numeros");
			k.focus();
			return false;
		}else{
			return true;
		}
	}
}//fin de chequearEmail

function chequearDireccion(k){
	long = k.value.length;
	if(k.value.length==0){
			alert("Disculpe, el campo "+k.name+" no puede estar vacio");
			k.focus();
			return false;
	}else{
		for(i=0;i<long;i++){
			if(k.value.indexOf(i)!=-1){
				alert("Disculpe, el campo "+k.name+ " no puede contener numeros");
				k.focus();
				return false;
			}
		}
	}return true;
}//fin de chequearDireccion
			
function chequearTelefonoHabitacion(k) {
telefono=k.value;
	if(k.value.length==0){
			alert("Disculpe, Telefono Habitacion no puede estar vacio");
			k.focus();
			return false;
			}
	if(k.value.length!=7){
			alert("Disculpe, Telefono Habitacion debe contener 7 numeros");
			k.focus();
			return false;
			}
	if(isNaN(telefono)){
		alert("Disculpe, Telefono Habitacion debe contenter obligatoriamente 11 numeros válidos");
		document.f.Telefono.focus();
		return false;
		}
	else{ 
		return true;
		}
}//fin de chequearTelefonoHabitacion

function chequearTelefonoCelular(k) {
telefono=k.value;
	if(k.value.length==0){
			alert("Disculpe, Telefono Celular no puede estar vacio");
			k.focus();
			return false;
			}
	if(k.value.length!=11){
			alert("Disculpe, Telefono Celular debe contener 11 numeros");
			k.focus();
			return false;
			}
	if(isNaN(telefono)){
		alert("Disculpe, Telefono Celular debe contener obligatoriamente 11 numeros válidos");
		document.f.Telefono.focus();
		return false;
		}
	else{ 
		return true;
		}
}//fin de chequearTelefonoCelular

function chequearEstadoCivil(k){
estado_civil=k.value;
	if(estado_civil=="Escoja una opcion"){
		alert("Disculpe, Estado Civil debe ser una opcion valida");
		k.focus();
		return false;
	}
}//fin de chequearEstadoCivil

function chequearNacionalidad(k){
estado_civil=k.value;
	if(estado_civil=="Escoja una opcion"){
		alert("Disculpe, Nacionalidad debe ser una opcion valida");
		k.focus();
		return false;
	}
}//fin de chequearNacionalidad

function chequearLugarNacimiento(k){
	if(k.value.length==0){
			alert("Disculpe, el Lugar de Nacimiento no puede estar vacio");
			k.focus();
			return false;
	}else{
		for(i=0;i<10;i++){
			if(k.value.indexOf(i)!=-1){
				alert("Disculpe, el Lugar de Nacimiento no puede contener numeros");
				k.focus();
				return false;
			}
		}
	}return true;
}//fin de chequearLugarNacimientoHijo

function chequearTipoSangre(k){
estado_civil=k.value;
	if(estado_civil=="Escoja una opcion"){
		alert("Disculpe, Tipo de Sangre debe ser una opcion valida");
		k.focus();
		return false;
	}
}//fin de chequearTipoSangre

function chequearNombreConyugue(k){
	if(k.value.length==0){
			alert("Disculpe, el Nombre del Conyugue no puede estar vacio");
			k.focus();
			return false;
	}else{
		for(i=0;i<10;i++){
			if(k.value.indexOf(i)!=-1){
				alert("Disculpe, el Nombre del Conyugue no puede contener numeros");
				k.focus();
				return false;
			}
		}
	}return true;
}//fin de chequearNombreConyugue