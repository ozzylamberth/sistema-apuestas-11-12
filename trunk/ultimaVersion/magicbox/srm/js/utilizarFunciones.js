//Este JavaScript fue hecho por Gustavo Karcher
//Año 2000, Buenos Aires, Argentina
//
//Este script y otros muchos pueden
//descarse on-line de forma gratuita
//en MundoJavascript.com

var nav = (document.layers) ? true : false

function RatonArriba(Boton){
   if (!nav && Boton) Boton.style.backgroundColor="lightblue"
}

function RatonAfuera(Boton){
   if (!nav && Boton) Boton.style.backgroundColor="silver"
}

function EnviandoTexto(Boton){
   if (!nav && Boton) Boton.style.backgroundColor="lightblue"
}

function conMayusculas(field) {
    field.value = field.value.toUpperCase()
}

function cambiar_color_over(celda){ 
   celda.style.backgroundColor="lightblue" 
} 

function cambiar_color_out(celda){ 
   celda.style.backgroundColor="white" 
} 
