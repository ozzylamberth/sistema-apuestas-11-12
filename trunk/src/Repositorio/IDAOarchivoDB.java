
package Repositorio;

import java.text.ParseException;


/**
 *@author Irene
 * Esta es la interfaz de la clase DAOeventoDB se declara el metodo insertar que se implementa en 
 * DAOeventoDB 
 */

public interface IDAOarchivoDB {
    
   public void insertar(String fileLocation) throws ParseException;
    
    
}
