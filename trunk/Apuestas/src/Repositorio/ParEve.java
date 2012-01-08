
package Repositorio;


import java.sql.*;
import Dominio.ConectarBD;
import Dominio.ListaParticipante;
import org.apache.commons.logging.Log;
import org.apache.commons.logging.LogFactory;

/*@author Irene
 * Esta clase contiene los atributos de los participantes que participan en un evento
 * como lo pueden ser si tipo de pago y tope, en caso de tener 
 * @author Eleany G
 * modificacion realizada el 27/12/2012
 * Modificacion de la clase, se implemento el metodo que consulta en la BD los atributos
 * de la tabla pareve, donde se encuentra la informacion de los participantes de un evento
 */


public class ParEve extends ConectarBD{
    private Integer peFkEveId;
    private Integer peFkPartId;
    private Integer peTipoPago;
    private Integer peTopeApuesta;
    private Connection con =null;
    // variable utilizada para el log de errores
    protected final Log logger = LogFactory.getLog(getClass());
   
    public ParEve(){
    con=obtenerConexion();
    
    }

    public ParEve(Integer peFkEveId, Integer peFkPartId, Integer peTipoPago, Integer peTopeApuesta) {
        this.peFkEveId = peFkEveId;
        this.peFkPartId = peFkPartId;
        this.peTipoPago = peTipoPago;
        this.peTopeApuesta = peTopeApuesta;
    }

    public Connection getCon() {
        return con;
    }

    public void setCon(Connection con) {
        this.con = con;
    }

    public Integer getPeFkEveId() {
        return peFkEveId;
    }

    public void setPeFkEveId(Integer peFkEveId) {
        this.peFkEveId = peFkEveId;
    }

    public Integer getPeFkPartId() {
        return peFkPartId;
    }

    public void setPeFkPartId(Integer peFkPartId) {
        this.peFkPartId = peFkPartId;
    }

    public Integer getPeTipoPago() {
        return peTipoPago;
    }

    public void setPeTipoPago(Integer peTipoPago) {
        this.peTipoPago = peTipoPago;
    }

    public Integer getPeTopeApuesta() {
        return peTopeApuesta;
    }

    public void setPeTopeApuesta(Integer peTopeApuesta) {
        this.peTopeApuesta = peTopeApuesta;
    }
 
  public void InsertarenBD (int peFkParId, Float peTopeApuesta,Integer peTipoPago, Integer peFkEveId) {   
    
       try {
          
       

           String sql="insert into par_eve values(?,?,?,?)";
           PreparedStatement ps= con.prepareStatement(sql);
           ps.setInt(1,peFkEveId);
           ps.setInt(2,peFkParId);
           ps.setInt(3,peTipoPago);
           ps.setFloat(4,peTopeApuesta);
           
           int registros=ps.executeUpdate();

           System.out.println("Ingreso correcto de"+registros+"en la tabla par_eve");


           //cerrar conexion
              ps.close();

  
       } catch (SQLException e) {
          System.out.println("ERROR, No se pudo ingresar el registro en la tabla pareve "+e.toString());
          logger.error("No se pudo ingresar el registro en la tabla pareve");
       }
    
  }
  
   //llenar la lista de Par_Eve a partir de la BD
    public void consultar() throws SQLException
    {
        try{
            PreparedStatement ps= null;
            String sql="SELECT * FROM par_eve";
            ps=con.prepareStatement(sql);
            ResultSet rs=ps.executeQuery();
            
            // Este while es el encargado de almacenar en un arreglo todas los atributos de la tabla pareve
            // que se encuentran en la BD
            while(rs.next())
            {
                ListaParticipante.nuevoParEve(rs.getInt("pe_fk_eve_id"),rs.getInt("pe_fk_par_id"),rs.getInt("pe_top_apuesta"),rs.getInt("pe_tipo_pago"));              
            }
        }catch(SQLException e){
            System.out.println("ERROR, No se pudo ejecutar la consulta en pareve"+e.toString());
            logger.error("No se pudo ingresar el registro en la tabla pareve");

        }
    }
  
  
    
}
