
package Repositorio;
import Dominio.ConectarBD;
import Dominio.ListaParticipante;
import java.sql.*;
import org.apache.commons.logging.Log;
import org.apache.commons.logging.LogFactory;

/**
 * @author Eleany G
 * Esta clase contiene los atributos de participantes
 * asi como su consulta a la BD para llenar el arreglo de participantes
 *  @autonr Irene
 * modificacion realizada el 27/12/2012
 * Creacion del metodo que insercion en la Bd 
 * 
 */
public class Participante extends ConectarBD {
 
     private Integer partId;
     private String partNombre;
     private Float partTopeApuesta;
     private Integer partTipoPago;
     private Integer partFkEveId;
    
     ParEve pareve = new ParEve();
     // variable utilizada para el log de errores
     protected final Log logger = LogFactory.getLog(getClass());
     
     private Connection con =null;

    
    public Participante(){
    con=obtenerConexion();
    
    }

    public Participante(Integer partId, String partNombre, Float partTopeApuesta, Integer partTipoPago, Integer partFkEveId) {
        this.partId = partId;
        this.partNombre = partNombre;
        this.partTopeApuesta = partTopeApuesta;
        this.partTipoPago = partTipoPago;
        this.partFkEveId = partFkEveId;
    }

    public Participante(Integer partId, String partNombre) {
        this.partId = partId;
        this.partNombre = partNombre;
    }

    
    
    public Connection getCon() {
        return con;
    }

    public void setCon(Connection con) {
        this.con = con;
    }

    public Integer getPartFkEveId() {
        return partFkEveId;
    }

    public void setPartFkEveId(Integer partFkEveId) {
        this.partFkEveId = partFkEveId;
    }

    public Integer getPartId() {
        return partId;
    }

    public void setPartId(Integer partId) {
        this.partId = partId;
    }

    public String getPartNombre() {
        return partNombre;
    }

    public void setPartNombre(String partNombre) {
        this.partNombre = partNombre;
    }

    public Integer getPartTipoPago() {
        return partTipoPago;
    }

    public void setPartTipoPago(Integer partTipoPago) {
        this.partTipoPago = partTipoPago;
    }

    public Float getPartTopeApuesta() {
        return partTopeApuesta;
    }

    public void setPartTopeApuesta(Float partTopeApuesta) {
        this.partTopeApuesta = partTopeApuesta;
    }



    
   public void InsertarenBD (int partId, String partNombre, Float partTopeApuesta,Integer partTipoPago, Integer eveId) {
  
     try {
          
           String sql="insert into participante values(?,?)";
           PreparedStatement ps= con.prepareStatement(sql);
           ps.setInt(1,partId);
           ps.setString(2,partNombre);
           
           int registros=ps.executeUpdate();

           System.out.println("Ingreso correcto de "+registros+" participante");
            logger.info("Ingreso correcto en la tabla participante");

           //cerrar conexion
              ps.close();

  
       } catch (SQLException e) {
           System.out.println("ERROR, No se pudo insertar el participante "+e.toString());
           logger.error("No se pudo insertar el participante");
       }
     // luego de insertar el participante se invoca al metodo que insertara en la tabla pareve
     pareve.InsertarenBD(partId, partTopeApuesta, partTipoPago, eveId);
     
    }
   
    //llenar lista de participantes a partir de la bd
    public void consultar(int idEvento) throws SQLException
    {
        try{
            PreparedStatement ps= null;
            String sql="SELECT * FROM participante, par_eve WHERE pe_fk_par_id=par_id AND pe_fk_eve_id=?";
            ps=con.prepareStatement(sql);
            ps.setInt(1, idEvento);
            ResultSet rs=ps.executeQuery();
           
            // Este while es el encargado de almacenar en un arreglo todas los participantes segun el evento
            // que se encuentran en la BD
           
            while(rs.next())
            {
                ListaParticipante.nuevoParticipante(rs.getInt("par_id"), rs.getString("par_nombre"));
            }
        }catch(SQLException e){
            System.out.println("ERROR, No se pudo ejecutar la consulta de los participantes"+e.toString());
            logger.error(" No se pudo ejecutar la consulta de los participantes");
        }
    }


}
       
       
