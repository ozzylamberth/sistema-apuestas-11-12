

package Repositorio;

import Dominio.ConectarBD;
import Dominio.ListaEvento;
import java.sql.*;
import org.apache.commons.logging.Log;
import org.apache.commons.logging.LogFactory;

/*
 * @author Eleany G
  * Esta clase contiene los atributos de evento asi como sus consultas a la BD para llenar los arreglos
 * de eventos tanto de eventos activos en general, como el arreglo de eventos segun su categoria
 *  @autonr Irene
 * modificacion realizada el 02/01/2012
 * Creacion del metodo que inserta en la Bd 
 */

public class Evento extends ConectarBD {
    private Integer eveId;
    private String eveNombre;
    private String eveFecha;
    private Integer eveNroPart;
    private Integer eveNroGan;
    private Integer eveFkCatId;
    private Integer eveTipoPago;
    private Integer eveFkCedula;
    //variable usada para validar si existe el evento para su insercion
    private String eveNombreq;
     // variable utilizada para el log de errores
    protected final Log logger = LogFactory.getLog(getClass());
    // variable utilizada para la conexion
    private Connection con =null;

    public Evento(){
    con=obtenerConexion();
    
    }

    public Evento(Integer eveId, String eveNombre, String eveFecha, Integer eveNroPart, Integer eveNroGan, Integer eveFkCatId, Integer eveTipoPago, Integer eveFkCedula) {
        this.eveId = eveId;
        this.eveNombre = eveNombre;
        this.eveFecha = eveFecha;
        this.eveNroPart = eveNroPart;
        this.eveNroGan = eveNroGan;
        this.eveFkCatId = eveFkCatId;
        this.eveTipoPago = eveTipoPago;
        this.eveFkCedula = eveFkCedula;
    }

    public Connection getCon() {
        return con;
    }

    public void setCon(Connection con) {
        this.con = con;
    }

    public String getEveFecha() {
        return eveFecha;
    }

    public void setEveFecha(String eveFecha) {
        this.eveFecha = eveFecha;
    }

    public Integer getEveFkCatId() {
        return eveFkCatId;
    }

    public void setEveFkCatId(Integer eveFkCatId) {
        this.eveFkCatId = eveFkCatId;
    }

    public Integer getEveFkCedula() {
        return eveFkCedula;
    }

    public void setEveFkCedula(Integer eveFkCedula) {
        this.eveFkCedula = eveFkCedula;
    }

    public Integer getEveId() {
        return eveId;
    }

    public void setEveId(Integer eveId) {
        this.eveId = eveId;
    }

    public String getEveNombre() {
        return eveNombre;
    }

    public void setEveNombre(String eveNombre) {
        this.eveNombre = eveNombre;
    }

    public Integer getEveNroGan() {
        return eveNroGan;
    }

    public void setEveNroGan(Integer eveNroGan) {
        this.eveNroGan = eveNroGan;
    }

    public Integer getEveNroPart() {
        return eveNroPart;
    }

    public void setEveNroPart(Integer eveNroPart) {
        this.eveNroPart = eveNroPart;
    }

    public Integer getEveTipoPago() {
        return eveTipoPago;
    }

    public void setEveTipoPago(Integer eveTipoPago) {
        this.eveTipoPago = eveTipoPago;
    }

    
 public boolean InsertarenBD(int eveId, String eveNombre, String eveFecha, int eveNroPart, int eveNroGan, int eveFkCatId,  int eveTipoPago, int eveFkCedula) {
     
     boolean resultado = false;
   
     try{
          
             PreparedStatement ps= null;  //usado al consultar si el evento
             PreparedStatement ps1= null; //usado al insertar evento
            
            // se selecciona el login del administrador para ver si hay valores con esa cedula
            String sql="SELECT eve_nombre  FROM evento WHERE eve_id=?";
            
            ps1=con.prepareStatement(sql);
            ps1.setInt(1, eveId);
            ResultSet rs=ps1.executeQuery();
        
            //Se realiza la validacion de si el query trae algun valor para luego proceder a insertarlo o no 
            if (rs.next())
             {
                   eveNombreq = rs.getString("eve_nombre"); 
                   resultado = false;                  
             }   
              else
              {
              //si no existe ese nombre de la categoria con ese id se procede a insertar
               
                     try {

                           String sql2="insert into evento values(?,?,?,?,?,?,?,?)";
                           ps= con.prepareStatement(sql2);
                           ps.setInt(1,eveId);
                           ps.setString(2,eveNombre);
                           ps.setString(3,eveFecha);  
                           ps.setInt(4,eveNroPart);
                           ps.setInt(5,eveNroGan);
                           ps.setInt(6,eveTipoPago);
                           ps.setInt(7,eveFkCedula);
                           ps.setInt(8,eveFkCatId);

                           int registros=ps.executeUpdate();
                           System.out.println("Ingreso correcto de "+registros+"evento");
                           logger.info("Ingreso correcto en la tabla evento");
                           //cerrar conexion
                              ps.close();

                       } catch (SQLException e) {
                           System.out.println("ERROR, No se pudo ejecutar la insercion de los eventos"+e.toString());
                           logger.error("No se pudo ejecutar la insercion de los eventos");
                       } 
                     resultado = true;
                    
                      }
    
         
           }
             catch(SQLException e){
             System.out.println("ERROR, No se puedo realizar la consulta en la tabla Eventos"+e.toString());
             logger.error("No se puedo realizar la consulta en la tabla Eventos");
        }
   return resultado;
   }
 
  //Lleno la lista a partir de la BD
    public void consultar() throws SQLException
    {
        try{
            PreparedStatement ps= null;
            String sql="SELECT* FROM evento";
            ps=con.prepareStatement(sql);
            ResultSet rs=ps.executeQuery();

            // Este while es el encargado de almacenar en un arreglo todos los eventos
            // que se encuentran en la BD
            while(rs.next())
            {
                ListaEvento.nuevoEvento(rs.getInt("eve_id"), rs.getString("eve_nombre"), rs.getInt("eve_nro_part"), rs.getInt("eve_nro_gan"), rs.getInt("eve_fk_id_categoria"), rs.getInt("eve_tipo_pago"), rs.getInt("eve_fk_id_admin"));
            }
            
        }catch(SQLException e){
            System.out.println("ERROR, No se pudo ejecutar la consulta de los eventos"+e.toString());
            logger.error("No se pudo ejecutar la consulta de los eventos");
        }
    }
    
    //Lleno la lista de los eventos por categoria a partir de la BD
    public void consultarPorCat(int eveFkIdCat,javax.swing.JComboBox jCB) throws SQLException
    {
        try{
            ListaEvento.losEventosPorCat.clear();
            //Limpio el combobox
             jCB.removeAllItems();
             
            PreparedStatement ps1= null;
            String sql="SELECT* FROM evento WHERE eve_fk_id_categoria=?";
            ps1=con.prepareStatement(sql);
            ps1.setInt(1, eveFkIdCat);
            ResultSet rs=ps1.executeQuery();

            // Este while es el encargado de almacenar en un arreglo todos los eventos por categoria
            // que se encuentran en la BD y asignarolo al ComboBox de la interfaz JmaquinaCategoria
            while(rs.next())
            {
                ListaEvento.nuevoEventoCat(rs.getInt("eve_id"), rs.getString("eve_nombre"), rs.getInt("eve_nro_part"), rs.getInt("eve_nro_gan"), rs.getInt("eve_fk_id_categoria"), rs.getInt("eve_tipo_pago"), rs.getInt("eve_fk_id_admin"));
                jCB.addItem(rs.getString("eve_nombre"));
            }
            
               
        }catch(SQLException e){
            System.out.println("ERROR, No se pudo ejecutar la consulta de los eventos por categoria"+e.toString());
            logger.error("No se pudo ejecutar la consulta de los eventos por categoria");
        }
    }
    

 
 
 
}
