package Repositorio;

import java.io.FileOutputStream;
import java.io.IOException;

import org.jdom.Element;
import org.jdom.Document;
import org.jdom.JDOMException;
import org.jdom.input.SAXBuilder;
import org.jdom.output.XMLOutputter;
import java.util.Date;

/**
 * @author IRENE
 * Clase encargada de la creacion del XML que contiene las apuestas que no han sido transmitidas
 */
public class DAOapuestaXML implements IDAOapuestaXML {
   private Element root;

   private String fileLocation = "C:/Users/Irene/Documents/NetBeansProjects/Apuestas/src/XML/apuesta.xml";
  // public DAOapuestaXML(String letraRuta) {
   public DAOapuestaXML() {
      try {
         SAXBuilder builder = new SAXBuilder(false);
         Document doc = null;
         doc = builder.build(fileLocation);
      //   doc = builder.build(letraruta+"apuesta.xml");
         root = doc.getRootElement();
      } catch (JDOMException ex) {
          root = new Element ("apuestas");
      } catch (IOException ex) {
         System.out.println("No se pudo iniciar la operacion por: " + ex.getMessage());
      }
   }

/* Este metodo crea el elemento nuevo, y va haciendo get de cada uno de los valores que seran introducidos
 * en el XML 
 */
   private Element apuestatoXmlElement(Apuesta apuesta) {
      
      Element Apuestatrans = new Element("apuesta");

      Element id = new Element("id");
      id.setText(Integer.toString(apuesta.getApuId()));

     
      Element fecha = new Element("fecha");
      fecha.setText(apuesta.getApuFecha().toString());

      Element monto = new Element("monto");
      monto.setText(Integer.toString(apuesta.getApuMonto()));

      Element maqid = new Element("maqid");
      maqid.setText(Integer.toString(apuesta.getApuFkMaqid()));
      
      Element eveid = new Element("eveid");
      eveid.setText(Integer.toString(apuesta.getApuFkEveId()));

     // se va agregando el contenido al XML
      Apuestatrans.addContent(id);
      Apuestatrans.addContent(monto);
      Apuestatrans.addContent(maqid);
      Apuestatrans.addContent(eveid);
      Apuestatrans.addContent(fecha);
      return Apuestatrans;
   }

//Metodo encargado de actualizar el documento cuando contiene todos los valores de la Base de Datos
   private boolean updateDocument() {
      try {
         XMLOutputter out = new XMLOutputter();
         FileOutputStream file = new FileOutputStream(fileLocation);
         out.output(root, file);
         file.flush();
         file.close();
         return true;
      } catch (Exception e) {
         System.out.println("error: " + e.getMessage());
         return false;
      }
   }

/* Este metodo es el que recibe los valores de la clase ListadoApuesta ademas
*  esta  encargado de invocar al metodo apuestatoXmlElement que convierte los valores
*  para ser insertados en el XML, luego le hace un update al documento por medio del metodo
*  updateDocument  */
 //  public boolean agregarApuesta(Apuesta apuesta, String letraRuta) {
   public boolean agregarApuesta(Apuesta apuesta) {
      boolean resultado = false;
      root.addContent(apuestatoXmlElement(apuesta));
      resultado = updateDocument();
      return resultado;
   }


}
