
package Repositorio;

import Dominio.ConectarBD;
import Dominio.ListadoApuesta;
import java.sql.*;
import java.util.Date;
import org.apache.commons.logging.Log;
import org.apache.commons.logging.LogFactory;

/**
 *@author Eleany G
 * Esta clase contiene los atributos de la apuesta 
 * asi como su insercion en la BD en las tablas apuesta y apu_par
 * Modificacion 03.01
 * @author Irene
 * Creacion del metodo que selecciona de la bd las apuestas y se encarga de invocar
 * a los metodos que realizaran su futura insercion
 * 
 */
public class Apuesta extends ConectarBD{
  
    private Integer apuId;
    private Date apuFecha;
    private Integer apuMonto;
    private Integer apuFkMaqid;
    private Integer apuFkEveId;
    private Integer apuTransmision;
    private Connection con =null;
    // variable utilizada cuando se selecciona el monto de la apuesta
    private Integer apuMonto2;
    // variable utilizada para el log de errores
    protected final Log logger = LogFactory.getLog(getClass());
    
    // se crea un objeto de tipo ListadoApuesta, para invocar a los metodos presentes en esa clase
    ListadoApuesta listadoApu =  new ListadoApuesta();

    public Apuesta(){
    con=obtenerConexion();
    
    }

    public Connection getCon() {
        return con;
    }

    public Apuesta(Integer apuId, Date apuFecha, Integer apuMonto, Integer apuFkMaqid, Integer apuFkEveId, Integer apuTransmision) {
        this.apuId = apuId;
        this.apuFecha = apuFecha;
        this.apuMonto = apuMonto;
        this.apuFkMaqid = apuFkMaqid;
        this.apuFkEveId = apuFkEveId;
        this.apuTransmision = apuTransmision;
    }

    
    public void setCon(Connection con) {
        this.con = con;
    }

    public Date getApuFecha() {
        return apuFecha;
    }

    public void setApuFecha(Date apuFecha) {
        this.apuFecha = apuFecha;
    }

    public Integer getApuFkMaqid() {
        return apuFkMaqid;
    }

    public void setApuFkMaqid(Integer apuFkMaqid) {
        this.apuFkMaqid = apuFkMaqid;
    }

    public Integer getApuId() {
        return apuId;
    }

    public void setApuId(Integer apuId) {
        this.apuId = apuId;
    }

    public Integer getApuMonto() {
        return apuMonto;
    }

    public void setApuMonto(Integer apuMonto) {
        this.apuMonto = apuMonto;
    }

    public Integer getApuTransmision() {
        return apuTransmision;
    }

    public void setApuTransmision(Integer apuTransmision) {
        this.apuTransmision = apuTransmision;
    }

    public Integer getApuFkEveId() {
        return apuFkEveId;
    }

    public void setApuFkEveId(Integer apuFkEveId) {
        this.apuFkEveId = apuFkEveId;
    }

   
  
 //inserto en la tabla apuesta 
  public int insertarApuesta(int apuFkEveId, int apuFkMaqId, int apuTransmision)
    {
        try{
            //Autoincremento el id para insertar apuesta
            String sql1="select MAX(apu_id)+1 FROM apuesta";
            PreparedStatement ps1=con.prepareStatement(sql1);
            ResultSet resultado = ps1.executeQuery(sql1);
            resultado.next();
            int siguienteId =resultado.getInt(1);
           
            if (siguienteId==0){
                siguienteId= siguienteId+1;
            }
           
            //para obtener la fecha del sistema
            java.util.Date today = new java.util.Date();
            java.sql.Date sqlToday = new java.sql.Date(today.getTime());
            //insertar en tabla apuesta
            String sql="insert into apuesta values(?,?,?,?,?)";
            PreparedStatement ps=con.prepareStatement(sql);
            ps.setInt(1,siguienteId);
            ps.setDate(2,sqlToday);
            ps.setInt(3,apuTransmision);
            ps.setInt(4,apuFkEveId);
            ps.setInt(5,apuFkMaqId);
           
            int registros=ps.executeUpdate();
            System.out.println("Ingreso correcto en la tabla apuesta "+registros);
            logger.info("Ingreso correcto en la tabla apuesta");
             return(siguienteId);
        }
       
            
            
        catch(SQLException e)
        {
            System.out.println("ERROR, No se pudo insertar la apuesta"+e.toString());
            logger.error("No se pudo insertar la apuesta");
            return(0);
        }
    }
  
  public boolean insertarApuPar(int apFkApuId,int apFkParId, float apMonto){
      try{
      //insertar en tabla apu_par
            String sql2= "insert into apu_par values (?,?,?)";
            PreparedStatement ps2=con.prepareStatement(sql2);
            ps2.setInt(2, apFkParId);
            ps2.setInt(1,apFkApuId);
            ps2.setFloat(3, apMonto);
            int registros2 = ps2.executeUpdate();
            System.out.println("Ingreso correcto en la tabla apu_par "+registros2);
            logger.info("Ingreso correcto en la tabla apu_par");
            
            return(true);  
        }
      catch(SQLException e)
        {
            System.out.println("ERROR, No se pudo insertar la apuesta"+e.toString());
            logger.error("No se pudo insertar la apuesta");
            return(false);
        }
  }
   
   
    
    //inserto en la tabla apuesta y en apu_par
  public boolean insertar(int apuFkEveId, int apuFkParId, float apuMonto,int apuFkMaqId, int apuTransmision)
    {
        try{
            //Autoincremento el id para insertar apuesta
            String sql1="select MAX(apu_id)+1 FROM apuesta";
            PreparedStatement ps1=con.prepareStatement(sql1);
            ResultSet resultado = ps1.executeQuery(sql1);
            resultado.next();
            int siguienteId =resultado.getInt(1);
           
            if (siguienteId==0){
                siguienteId= siguienteId+1;
            }
           
            //para obtener la fecha del sistema
            java.util.Date today = new java.util.Date();
            java.sql.Date sqlToday = new java.sql.Date(today.getTime());
            //insertar en tabla apuesta
            String sql="insert into apuesta values(?,?,?,?,?)";
            PreparedStatement ps=con.prepareStatement(sql);
            ps.setInt(1,siguienteId);
            ps.setDate(2,sqlToday);
            ps.setInt(3,apuTransmision);
            ps.setInt(4,apuFkEveId);
            ps.setInt(5,apuFkMaqId);
           
            int registros=ps.executeUpdate();
            System.out.println("Ingreso correcto en la tabla de apuestas "+registros);
            logger.info("Ingreso correcto en la tabla de apuestas");
            //insertar en tabla apu_par
            String sql2= "insert into apu_par values (?,?,?)";
            PreparedStatement ps2=con.prepareStatement(sql2);
            ps2.setInt(2, apuFkParId);
            ps2.setInt(1, siguienteId);
            ps2.setFloat(3, apuMonto);
            int registros2 = ps2.executeUpdate();
            System.out.println("Ingreso correcto en la tabla apupar "+registros2);
            
            
            
            return(true);
            
            
        }catch(SQLException e)
        {
            System.out.println("ERROR, No se pudo ingresar la apuesta "+e.toString());
            logger.error("No se pudo ingresar la apuesta");
            return(false);
        }

    }  
    // public void InsertaXML(String letraRuta){
   public void InsertaXML(){
    // Este metodo inserta en el XML las apuestas que estan en la BD
     try{
           
            PreparedStatement ps= null;
            PreparedStatement ps2= null;
            
            // se seleccionan los datos de la apuesta   que no han sido transmitidas, es decir
            // que el valor de transmision es 0
          
            String sql="SELECT *  FROM APUESTA where apu_transmision = 0";
            ps=con.prepareStatement(sql);
            ResultSet rs=ps.executeQuery();
        
              while(rs.next())
            {
                apuId = rs.getInt("apu_id"); 
                apuFecha =rs.getDate("apu_fecha"); 
              
                apuFkMaqid=rs.getInt("apu_fk_maq_id");
                apuFkEveId=rs.getInt("apu_fk_eve_id");
                
                // Se selecciona el monto de esa apuesta
                String sqlMonto="SELECT ap_monto_apuesta  FROM APU_PAR where ap_fk_apu_id=?";
               
                ps2=con.prepareStatement(sqlMonto);
                ps2.setInt(1, apuId);
                ResultSet rsMonto=ps2.executeQuery();
                 
                if (rsMonto.next()){
                apuMonto2 =rsMonto.getInt("ap_monto_apuesta");
                 System.out.println("monto apuesta"+apuMonto2);
                }
                
                // Se creo un objeto de tipo ListadoApuesta y se invoca al metodo nueva apuesta
                listadoApu.nuevaApuesta(apuId, apuMonto2, apuFkMaqid, apuFkEveId, apuFecha);
         //listadoApu.nuevaApuesta(apuId, apuMonto2, apuFkMaqid, apuFkEveId, apuFecha, letraRuta);
            }
          }catch(SQLException e){
            System.out.println("ERROR, No se puedo exportar el archivo con las apuestas"+e.toString());
            logger.error("No se puedo exportar el archivo con las apuestas");
        }
    }
}
    

