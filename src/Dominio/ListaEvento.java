/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package Dominio;

import Repositorio.Evento;
import java.util.ArrayList;

/**
 *
 * @author Eleany G
 * * Esta Clase contiene los arreglos de eventos en general y eventos por categoria
 * asi como los metodos de busqueda para estos arreglos tanto por nombre como por id
 */
public class ListaEvento {
    /** LISTA EVENTOS*/
       public static ArrayList<Evento> losEventos = new ArrayList<Evento>();
        public static ArrayList<Evento> losEventosPorCat = new ArrayList<Evento>();
       


    /**Agregar evento a la lista de todos los eventos**/

     public static void nuevoEvento(Integer eveId, String eveNombre, Integer eveNroPart, Integer eveNroGan, Integer eveFkCatId, Integer eveTipoPago, Integer eveFkCedula){

        Evento eventoNuevo = new Evento();
        eventoNuevo.setEveNombre(eveNombre);
        eventoNuevo.setEveId(eveId);
        eventoNuevo.setEveNroPart(eveNroPart);
        eventoNuevo.setEveNroGan(eveNroGan);
        eventoNuevo.setEveFkCatId(eveFkCatId);
        eventoNuevo.setEveTipoPago(eveTipoPago);
        eventoNuevo.setEveFkCedula(eveFkCedula);
        
                losEventos.add(eventoNuevo);
 }

     //Agrego los eventos a la lista de evntos por categoria
      public static void nuevoEventoCat(Integer eveId, String eveNombre, Integer eveNroPart, Integer eveNroGan, Integer eveFkCatId, Integer eveTipoPago, Integer eveFkCedula){

        Evento eventoNuevo = new Evento();
        eventoNuevo.setEveNombre(eveNombre);
        eventoNuevo.setEveId(eveId);
        eventoNuevo.setEveNroPart(eveNroPart);
        eventoNuevo.setEveNroGan(eveNroGan);
        eventoNuevo.setEveFkCatId(eveFkCatId);
        eventoNuevo.setEveTipoPago(eveTipoPago);
        eventoNuevo.setEveFkCedula(eveFkCedula);
        
                losEventosPorCat.add(eventoNuevo);
 }
    

        /**Buscar evento por id*/

            public static Integer buscarEvento(Integer eveId ){

       Integer resultado = 0;

       for (int i = 0; i < losEventos.size();i++) {

        if ( losEventos.get(i).getEveId().equals(eveId))
        {

               resultado = i;
        }
 }
  return resultado;
   }
   
            
            //buscar evento por nombre
            public static int buscarEventoNombre(String eveNombre){

       int resultado = 0;

       for (int i = 0; i < losEventos.size();i++) {


        if ( losEventos.get(i).getEveNombre().equals(eveNombre))
        {

               resultado = i;
        }
   }
  return resultado;
   }

 // * * Este metodo se encarga de recorrer el arreglo de eventos y llenar el combobox que se muestra en la interfaz grafica
 //* JmaquinaApuesta a partir de la informacion que contiene el arreglo.
 
      public void eventoCB(javax.swing.JComboBox jCB)
    {

        for (int i = 0; i < ListaEvento.losEventos.size();i++)
            jCB.addItem(ListaEvento.losEventos.get(i).getEveNombre());

  }
            
           
      }

    

