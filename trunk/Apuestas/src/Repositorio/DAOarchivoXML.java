
package Repositorio;

import Dominio.ListadoArchivo;
import java.io.IOException;
import java.text.ParseException;
import java.util.ArrayList;
import org.jdom.Document;
import org.jdom.Element;
import org.jdom.JDOMException;
import org.jdom.input.SAXBuilder;

/**
 * @author Irene
 * Esta clase es la encargada de recorrer el XML y formar los arreglos con la diferente
 * informacion que esta contenido en el mismo
 */
public class DAOarchivoXML implements IDAOarchivoXML{

   private Element root;
   
  //Se abre el archivo  
   public DAOarchivoXML(String fileLocation) {
      try {
         SAXBuilder builder = new SAXBuilder(false);
         Document doc = null;
         doc = builder.build(fileLocation);
         root = doc.getRootElement();
      } catch (JDOMException ex) {
         System.out.println("No se pudo iniciar la operacion por: " + ex.getMessage());
      } catch (IOException ex) {
         System.out.println("No se pudo iniciar la operacion por: " + ex.getMessage());
      }
   }

/*Se parsean los valores, es decir con el metodo SET, se toma cada uno de los valores presentes en el XML
esta función es llamada para hacer el arreglo de todos los eventos que estan en el archivo   */
   private Evento eventoToObject(Element element) throws ParseException {
      Evento evento = new Evento();
      
      evento.setEveId(Integer.parseInt(element.getChildText("id")));
      evento.setEveNombre(element.getChildText("nombre"));
      evento.setEveFecha(element.getChildText("fecha"));
      evento.setEveNroPart(Integer.parseInt(element.getChildText("nropart")));
      evento.setEveNroGan(Integer.parseInt(element.getChildText("nrogan")));
      evento.setEveFkCatId(Integer.parseInt(element.getChildText("idcat")));
      evento.setEveTipoPago(Integer.parseInt(element.getChildText("tipopago")));
      evento.setEveFkCedula(Integer.parseInt(element.getChildText("cedadmin")));
      
      return evento;
   }

   /*
    * Este método devolvera un array o arreglo con todos los eventos presentes en el XML que esten bajo la esctruc-
    * tura (tag) de eventos
    */
   public ArrayList<Evento> todosLosEventos() {
      ArrayList<Evento> resultado = new ArrayList<Evento>();
      for (Object it : root.getChild("eventos").getChildren()) {
         Element xmlElem = (Element) it;
         try {
            resultado.add(eventoToObject(xmlElem));
         } catch (ParseException ex) {
            System.out.println(ex.getMessage());
         }
      }
      return resultado;
   }


  
    /*Se parsean los valores, es decir con el metodo SET, se toma cada uno de los valores presentes en el XML
    esta función es llamada para hacer el arreglo de todos los participantes que estan en el archivo   */
   private Participante participanteToObject(Element element) throws ParseException {
      Participante participante = new Participante();

      participante.setPartNombre(element.getChildText("nombrepart"));
      participante.setPartTipoPago(Integer.parseInt(element.getChildText("tipopagop")));
      participante.setPartTopeApuesta(Float.parseFloat(element.getChildText("topeapuesta")));
      participante.setPartId(Integer.parseInt(element.getChildText("idpart")));
      participante.setPartFkEveId(Integer.parseInt(element.getChildText("ideve")));

      return participante;
   }

    /*
    * Este método devolvera un array o arreglo con todos los participantes presentes en el XML que esten bajo
    * el tag de participantes
    */
   public ArrayList<Participante> todosLosParticipantes() {
      ArrayList<Participante> resultado = new ArrayList<Participante>();
      for (Object it : root.getChild("participantes").getChildren()) {
         Element xmlElem = (Element) it;
         try {
            resultado.add(participanteToObject(xmlElem));

         } catch (ParseException ex) {
            System.out.println(ex.getMessage());
         }
      }
      return resultado;
   }
   
   
   
   
   
   
       /*Se parsean los valores, es decir con el metodo SET, se toma cada uno de los valores presentes en el XML
    esta función es llamada para hacer el arreglo de todos lo administradores que estan en el archivo   */
   private Administrador administradorToObject(Element element) throws ParseException {
      Administrador administrador = new Administrador();

      administrador.setAdmCedula(Integer.parseInt(element.getChildText("cedulaadm")));
      administrador.setAdmContrasena(element.getChildText("contrasenaadm"));
      administrador.setAdmLogin(element.getChildText("loginadm"));
    
      return administrador;
   }
   
      /*
    * Este método devolvera un array o arreglo con todos los administradores presentes en el XML que esten bajo
    * el tag de administrador
    */
   public ArrayList<Administrador> todosLosAdministradores() {
      ArrayList<Administrador> resultado = new ArrayList<Administrador>();
      for (Object it : root.getChild("administradores").getChildren()) {
         Element xmlElem = (Element) it;
         try {
            resultado.add(administradorToObject(xmlElem));

         } catch (ParseException ex) {
            System.out.println(ex.getMessage());
         }
      }
      return resultado;
   }
   
   
          /*Se parsean los valores, es decir con el metodo SET, se toma cada uno de los valores presentes en el XML
    esta función es llamada para hacer el arreglo de todas las categorias que estan en el archivo   */
   private Categoria categoriaToObject(Element element) throws ParseException {
      Categoria categoria = new Categoria();
      
      categoria.setCatId(Integer.parseInt(element.getChildText("catid")));
      categoria.setCatNombre(element.getChildText("catnombre"));
      
      return categoria;
   }
   
   
        /*
    * Este método devolvera un array o arreglo con todas las categorias presentes en el XML que esten bajo
    * el tag de administrador
    */
   public ArrayList<Categoria> todasLasCategorias() {
      ArrayList<Categoria> resultado = new ArrayList<Categoria>();
      for (Object it : root.getChild("categorias").getChildren()) {
         Element xmlElem = (Element) it;
         try {
            resultado.add(categoriaToObject(xmlElem));

         } catch (ParseException ex) {
            System.out.println(ex.getMessage());
         }
      }
      return resultado;
   }
   
   
    /*Se parsean los valores, es decir con el metodo SET, se toma cada uno de los valores presentes en el XML
    esta función es llamada para hacer el arreglo de todas las maquinas que estan en el archivo   */
   private Maquina maquinaToObject(Element element) throws ParseException {
      Maquina maquina = new Maquina();

      maquina.setMaqId(Integer.parseInt(element.getChildText("maqid")));
      maquina.setMaqStatus(element.getChildText("maqstatus"));
       
      return maquina;
   }
   

   
    /*
    * Este método devolvera un array o arreglo con todas las maquinas presentes en el XML que esten bajo
    * el tag de maquinas
    */
   public ArrayList<Maquina> todasLasMaquinas() {
      ArrayList<Maquina> resultado = new ArrayList<Maquina>();
      for (Object it : root.getChild("maquinas").getChildren()) {
         Element xmlElem = (Element) it;
         try {
            resultado.add(maquinaToObject(xmlElem));

         } catch (ParseException ex) {
            System.out.println(ex.getMessage());
         }
      }
      return resultado;
   }
   
   
   
   
   
   /*Con este método, se define que la esctructura apuesta esta compuesta
    * por todos los valores presentes en el XML, eventos, participantes, categorias y administradores
    * este metodo es fundamental, para que se lean todos los diversos tags del XML sino sobreentiende 
    * que todo el archivo es del primer tag que encuentra. Se instancia a listadoArchivo, clase presente 
    * en el Dominio
    */ 
   
   
    public ListadoArchivo obtenerArchivo() {
      ListadoArchivo listado = new ListadoArchivo();
      listado.Eventos = todosLosEventos();
      listado.Participantes = todosLosParticipantes();
      listado.Administradores=todosLosAdministradores();
      listado.Categorias=todasLasCategorias();
      listado.Maquinas=todasLasMaquinas();
  
      return listado;
   }



}
