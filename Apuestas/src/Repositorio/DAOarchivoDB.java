

package Repositorio;

import java.text.ParseException;
import java.util.ArrayList;
import java.util.Date;
import java.text.SimpleDateFormat;

/*@author Irene
 * Esta clase es la encargada de guardar en la Base de datos, hace la llamada  a DAOarchivoXML que es quien 
 * lee del xml y forma los arreglos con los eventos, participantes, administradores y categorias.
 */

public class DAOarchivoDB implements IDAOarchivoDB{
   /*Se declaran los arreglos que posteriormente se usaran para traer todos los Eventos, Participantes y Administradores
     *y  Maquinas son usados para asignar el arreglo que viene de DAOarchivoXML y recorrerlo para insertar en la BD
     */
   ArrayList<Evento> Eventos;
   ArrayList<Participante> Participantes;
   ArrayList<Administrador> Administradores;
   ArrayList<Categoria> Categorias;
   ArrayList<Maquina> Maquinas;

   /*Se declaran todas las variables presentes en el XML que seran las que usaremos para insertar en la base de datos*/

   //datos del evento
   private Integer eveId;
   private String eveNombre;
   private String eveFecha;
   private Integer eveNroPart;
   private Integer eveNroGan;
   private Integer eveFkCatId;
   private Integer eveTipoPago;
   private Integer eveFkCedula;
  // valor que devuleve la funcion insertar evento, si el mismo fue insertado
   private boolean eveResultado;

   // datos del participante
   private Integer partId;
   private String partNombre;
   private Float partTopeApuesta;
   private Integer partTipoPago;
   private Integer partFkEveId;

   // datos del administrador
   private Integer admCedula;
   private String admLogin;
   private String admContrasena;

   // datos de la categoria
   private Integer catId;
   private String catNombre;

   // datos de la maquina
   private Integer maqId;
   private String maqStatus;
  
   // atributo usado para la comparacion de la fecha actual con la del evento
   private Integer RetornoFecha;


   public void insertar(String fileLocation) throws ParseException {

      DAOarchivoXML archivoXML = new DAOarchivoXML(fileLocation);

      //Se instancia un objeto de tipo DAOapuestaXML que traera todas las maquinas presentes en el XML
      Maquinas = archivoXML.todasLasMaquinas();
      Maquina maquina = new Maquina();


      //Se instancia un objeto de tipo DAOapuestaXML que traera todas las categorias presentes en el XML
      Categorias = archivoXML.todasLasCategorias();
      Categoria categoria = new Categoria();

      //Se instancia un objeto de tipo DAOapuestaXML que traera todos los eventos presentes en el XML
      Eventos = archivoXML.todosLosEventos();
      Evento evento = new Evento();


      // Se instancia un objeto de tipo DAOapuestaXML que traera todos los participantes presentes en el XML
      Participantes = archivoXML.todosLosParticipantes();
      Participante participante = new Participante();

      // Se instancia un objeto de tipo DAOapuestaXML que traera todos los administradores presentes en el XML
      Administradores = archivoXML.todosLosAdministradores();
      Administrador administrador = new Administrador();


      /*
       * se recorren todas las maquinas y se va invocando a la funcion insertar que esta en la
      clase maquina
      */
      for (Maquina objectMaq : Maquinas) {
         maqId = objectMaq.getMaqId();
         maqStatus = objectMaq.getMaqStatus();
         
         maquina.InsertarenBD(maqId, maqStatus);
      }


      /*
       * se recorren todas las categorias y se va invocando a la funcion insertar que esta en la
       *clase categoria
      */
      for (Categoria objectCat : Categorias) {
         catId = objectCat.getCatId();
         catNombre = objectCat.getCatNombre();

         categoria.InsertarenBD(catId, catNombre);
      }


      /*
      * se recorren todos los administradores y se va invocando a la funcion insertar que esta en la
      *  clase administrador
      */
      for (Administrador objectAdm : Administradores) {
         admCedula = objectAdm.getAdmCedula();
         admLogin = objectAdm.getAdmLogin();
         admContrasena = objectAdm.getAdmContrasena();

         administrador.InsertarenBD(admCedula,admLogin,admContrasena);
      }

      // Se recorre el arreglo evento y se llama a la funcion para insertar los eventos

      for (Evento objectEve : Eventos) {

         eveId = objectEve.getEveId();
         eveNombre = objectEve.getEveNombre();
         eveFecha = objectEve.getEveFecha();
         eveNroPart = objectEve.getEveNroPart();
         eveNroGan = objectEve.getEveNroGan();
         eveFkCatId = objectEve.getEveFkCatId();
         eveTipoPago = objectEve.getEveTipoPago();
         eveFkCedula = objectEve.getEveFkCedula();

         // paso la fecha de String a tipo Date para hacer la comparacion con la fecha
         SimpleDateFormat sdf = new SimpleDateFormat("dd/MM/yyyy");
         Date fechaFortDate = sdf.parse(eveFecha);

         // tengo la fecha del dia en la variable fechaDia para luego compararla con la fecha del evento
         // que se trae del XML para ver si se inserta o no
         String strToday = sdf.format(new Date());
         Date today = sdf.parse(strToday);

         RetornoFecha = today.compareTo(fechaFortDate);

         /* si la funcion compareTo retorna 0 es q las fechas con iguales, es decir la fecha del sistema
         * y la del evento y si retorna -1 significa que la fecha del evento es mayor a la del sistem
         * por lo tanto con estas condiciones es que se inserta
         */
         if ((RetornoFecha == 0) || (RetornoFecha==-1)) {
              eveResultado= evento.InsertarenBD(eveId, eveNombre, eveFecha, eveNroPart, eveNroGan, eveFkCatId, eveTipoPago, eveFkCedula);
             
              // valido si se inserto el evento, si ya no existia uno con ese mismo Id
              if (eveResultado ==true){
                 for (Participante objectPar : Participantes) {

                   partNombre = objectPar.getPartNombre();
                   partId = objectPar.getPartId();
                   partTopeApuesta = objectPar.getPartTopeApuesta();
                   partTipoPago = objectPar.getPartTipoPago();
                   partFkEveId = objectPar.getPartFkEveId();

                   // este if se hace para validar si se insertan o no los participantes, sino se inserto el evento,
                   // no se insertaran los participantes del mismo
                   if (partFkEveId.intValue() == eveId.intValue()){            
                      participante.InsertarenBD(partId, partNombre, partTopeApuesta, partTipoPago,partFkEveId);
                   }
               } 
            } 
         }
     }
         
    }

}
      
       
    
     
     
 
