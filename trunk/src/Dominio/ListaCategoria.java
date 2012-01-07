/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package Dominio;

import Repositorio.Categoria;
import java.util.ArrayList;

/**
 *
 * @author Eleany G
 * Esta Clase contiene el arreglo de Categorias
 * asi como los metodos de busqueda para este arreglo tanto por nombre como por id
 */
public class ListaCategoria {
    
    /** LISTA Categorias*/
       public static ArrayList<Categoria> lasCategorias = new ArrayList<Categoria>();
       


    /**Agregar categoria al arreglo**/

     public static void nuevaCategoria(Integer catId, String catNombre){

        Categoria categoriaNueva = new Categoria();
        categoriaNueva.setCatNombre(catNombre);
        categoriaNueva.setCatId(catId);
                lasCategorias.add(categoriaNueva);
 }
    
     //Buscar categoria por id
     public static Integer buscarCategoriaporId(Integer catId){

       int resultado = 0;

       for (int i = 0; i < lasCategorias.size();i++) {

        if ( lasCategorias.get(i).getCatId().equals(catId))
        {

               resultado = i;
        }
 }
  return resultado;
   }
   
  //Buscar categoria por nombre
     public static Integer buscarCategoriaporNombre(String catNombre){

       Integer resultado= 0;

       for (int i = 0; i < lasCategorias.size();i++) {

        if ( lasCategorias.get(i).getCatNombre().equals(catNombre))
        {

               resultado = i;
        }
 }
  return resultado;
   }   
     
     //Esta metodo se encarga de recorrer el arreglo de categorias y llenar el combobox que se muestra en la interfaz grafica
 //* JmaquinaCategoria a partir de la informacion que contiene el arreglo.
   
     public void categoriaCB(javax.swing.JComboBox jCB)
    {

        for (int i = 0; i < ListaCategoria.lasCategorias.size();i++)
            jCB.addItem(ListaCategoria.lasCategorias.get(i).getCatNombre());

  }
     
}
