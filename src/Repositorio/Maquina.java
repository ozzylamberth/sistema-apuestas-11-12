
package Repositorio;
import Dominio.ConectarBD;
import java.sql.*;
import java.util.logging.Level;
import java.util.logging.Logger;


/*@author Irene
 *esta clase contiene los atributos de la maquina de apuesta, asi como la insercion de
 * sus datos a la Base de Datos 
 */

public class Maquina extends ConectarBD {
    
    private Integer maqId;
    private String maqStatus;
    private Connection con =null;
    private Integer maqIdQ;
    
    public Maquina(){
    con=obtenerConexion();
    
    }

    public Maquina(Integer maqId, String maqStatus) {
        this.maqId = maqId;
        this.maqStatus = maqStatus;
    }

    public Connection getCon() {
        return con;
    }

    public void setCon(Connection con) {
        this.con = con;
    }

    public Integer getMaqId() {
        return maqId;
    }

    public void setMaqId(Integer maqId) {
        this.maqId = maqId;
    }

    public String getMaqStatus() {
        return maqStatus;
    }

    public void setMaqStatus(String maqStatus) {
        this.maqStatus = maqStatus;
    }

/*Esta funcion se encargara de buscar en la BD el id de la maquina en la que se esta, luego se les actualizara
 * el status que trae el XML de esa maquina
*/
    
     public void InsertarenBD (int maqId, String maqStatusxml) {
   
      try{
            PreparedStatement ps1= null;
            PreparedStatement ps2= null;
            // se selecciona si el estatus que es pasado desde el XML es el de la maquina
            String sql="SELECT maq_status  FROM MAQUINA WHERE maq_id=?";
            
            ps1=con.prepareStatement(sql);
            ps1.setInt(1, maqId);
            ResultSet rs=ps1.executeQuery();
        
              while(rs.next())
            {
                maqStatus = rs.getString("maq_status"); 
              
                /* se valida si el status es diferente de nulo, se consiguio ese id de maquina en la BD
                 * y se modificara el status de la BD al presente en el XML
                 */
                if (maqStatus!= null) {
                   
                    try{
                       String sql2="UPDATE maquina SET maq_status =? WHERE maq_id=?";
                       ps2=con.prepareStatement(sql2);
                       ps2.setString(1,maqStatusxml);
                       ps2.setInt(2, maqId);
                       ResultSet rs2=ps2.executeQuery();                       
                    }catch(SQLException e){
                       System.out.println("ERROR, No se puedo actualizar el Status de la maquina por el presente en el XML"+e.toString());
                    }
                 }
            }
             
        
        }catch(SQLException e){
            System.out.println("ERROR, No se seleccionar el ID de la maquina"+e.toString());

        }
         
         
         
     }
          public int seleccionarIdMaq (){
        
         
           
        try {
            PreparedStatement ps1= null; 
            
            String sql="SELECT maq_id  FROM maquina ";
            
            ps1=con.prepareStatement(sql);
            
            ResultSet rs=ps1.executeQuery();
        
            if (rs.next())

             {

                    maqIdQ = rs.getInt("maq_id"); 
                    
             }   
            
           
     
         } catch (SQLException ex) {
            Logger.getLogger(Maquina.class.getName()).log(Level.SEVERE, null, ex);
        }
     return (maqIdQ);
}   
    
}
