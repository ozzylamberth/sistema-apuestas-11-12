/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package Dominio;

import Repositorio.ParEve;
import Repositorio.Participante;
import java.util.ArrayList;

/**
 *
 * @author Eleany G
 * * Esta Clase contiene el arreglo de Participantes
 * asi como los metodos de busqueda para este arreglo tanto por nombre como por id
 */
public class ListaParticipante {
     /** LISTA de participantes y de par_eve*/
       public static ArrayList<Participante> losParticipantes = new ArrayList<Participante>();
       public static ArrayList<ParEve> losParEve = new ArrayList<ParEve>();


    /**Agregar participante a la lista**/

     public static void nuevoParticipante(Integer parId, String parNombre){

        Participante participanteNuevo = new Participante();
        participanteNuevo.setPartId(parId);
        participanteNuevo.setPartNombre(parNombre);
        
        
                losParticipantes.add(participanteNuevo);
 }

     /**Agregar pareve en la lista**/
    
     public static void nuevoParEve(Integer peFkEveId, Integer peFkPartId, Integer peTopeApuesta, Integer peTipoPago){

        ParEve pareveNuevo = new ParEve();
        pareveNuevo.setPeFkEveId(peFkEveId);
        pareveNuevo.setPeFkPartId(peFkPartId);
        pareveNuevo.setPeTopeApuesta(peTopeApuesta);
        pareveNuevo.setPeTipoPago(peTipoPago);
        
        losParEve.add(pareveNuevo);
 }

     

        /**Buscar Participante por id*/

     public static boolean buscarParticipante(String parId ){

       boolean resultado = false;

       for (int i = 0; i < losParticipantes.size();i++) {

            if ( losParticipantes.get(i).getPartId().equals(parId))
            {

                   resultado = true;
            }
 }
  return resultado;
}
   
            
            //buscar participante por nombre
   public static int buscarParticipanteNombre(String parNombre){
       int resultado = 0;
       for (int i = 0; i < losParticipantes.size();i++) {
          if ( losParticipantes.get(i).getPartNombre().equals(parNombre))
            {
                   resultado = i;
            }
   }
  return resultado;
   }

            //buscar en par_eve con los id de evento y de participante
public static int buscarPE(Integer peEveId, Integer peParId){

       int resultado = 0;
       for (int i = 0; i < losParEve.size();i++) {
            if ( losParEve.get(i).getPeFkEveId().equals(peEveId) && losParEve.get(i).getPeFkPartId().equals(peParId) )
            {

                   resultado = i;
            }
       }
  return resultado;
   }
       
// * Este metodo se encarga de recorrer el arreglo de participantes y llenar el combobox que se muestra en la interfaz grafica
// * JmaquinaApuesta a partir de la informacion que contiene el arreglo.
            
        public void participanteCB(javax.swing.JComboBox jCB)
    {

        for (int i = 0; i < ListaParticipante.losParticipantes.size();i++)
            jCB.addItem(ListaParticipante.losParticipantes.get(i).getPartNombre());

  }
}
