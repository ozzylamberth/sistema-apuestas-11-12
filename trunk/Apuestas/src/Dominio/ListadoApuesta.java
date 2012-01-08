
package Dominio;

import Repositorio.Apuesta;
import Repositorio.DAOapuestaXML;
import Repositorio.IDAOapuestaXML;
import java.util.Date;


/**
 *@author Irene
 * Clase que se encarga de invocar al metodo que insertara en el XML las apuestas que le son enviadas desde
 * la clase apuesta
 * 
 */
public class ListadoApuesta {
    private String letraRuta;
    private IDAOapuestaXML manejadorRepositorio = new DAOapuestaXML(); 
 // private IDAOapuestaXML manejadorRepositorio = new DAOapuestaXML(letraRuta);
    private boolean valor;
   
    
    //public void nuevaApuesta(int apuId, int apuMonto, int apuFkMaqId, int apuFkEveId, Date apuFecha, String letraRuta)  
    public void nuevaApuesta(int apuId, int apuMonto, int apuFkMaqId, int apuFkEveId, Date apuFecha)
     {
        
        Apuesta apuestaNueva = new Apuesta();
        apuestaNueva.setApuId(apuId);
        apuestaNueva.setApuMonto(apuMonto);
        apuestaNueva.setApuFkMaqid(apuFkMaqId);
        apuestaNueva.setApuFkEveId(apuFkEveId);
        apuestaNueva.setApuFecha(apuFecha);
       
        // Se invoca a la clase DAO para que cree el XML con los valores
       valor = manejadorRepositorio.agregarApuesta(apuestaNueva);
       //  valor = manejadorRepositorio.agregarApuesta(apuestaNueva);
      }   

}
