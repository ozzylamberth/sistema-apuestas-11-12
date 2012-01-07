

package Repositorio;
import Dominio.ConectarBD;
import java.sql.*;

/**
 * @author Irene
 * esta clase tiene los atributos de administrador y la insercion a la base de datos
 * Modificacion realizada el 04/01 
 * @author Irene
 * metodo que valida la existencia del administrador, que sirve al momento de exportar el archivo 
 * con las apuestas realizadas
 */


public class Administrador extends ConectarBD {
    
    private Integer admCedula;
    private String admLogin;
    private String admContrasena;
    //esta variable es usada para el valor que es traido de la bd para valodar si existe ya ese administrador o no
    private String adminLogin = null;
   //esta variable es usada para el valor que es traido de la bd para valodar si existe ya ese administrador o no
    private Integer adminCedula;
   // se crea un objeto de tipo apuesta para invocar al metodo que hara un select de todas las apuestas
    Apuesta apuesta = new Apuesta();
    private Connection con =null;

    
    public Administrador(){
    con=obtenerConexion();
    
    }

    public Administrador(Integer admCedula, String admLogin, String admContrasena) {
        this.admCedula = admCedula;
        this.admLogin = admLogin;
        this.admContrasena = admContrasena;
    }

    public Integer getAdmCedula() {
        return admCedula;
    }

    public void setAdmCedula(Integer admCedula) {
        this.admCedula = admCedula;
    }

    public String getAdmContrasena() {
        return admContrasena;
    }

    public void setAdmContrasena(String admContrasena) {
        this.admContrasena = admContrasena;
    }

    public String getAdmLogin() {
        return admLogin;
    }

    public void setAdmLogin(String admLogin) {
        this.admLogin = admLogin;
    }

    public Connection getCon() {
        return con;
    }

    public void setCon(Connection con) {
        this.con = con;
    }


public void InsertarenBD (int admCedula, String admLogin, String admContrasena) {

        try{
          
             PreparedStatement ps= null;  //usado al consultar si existe el administrador
             PreparedStatement ps1= null; //usado al insertar administradores
            
            // se selecciona el login del administrador para ver si hay valores con esa cedula
            String sql="SELECT admin_login  FROM ADMINISTRADOR WHERE admin_cedula=?";
            
            ps1=con.prepareStatement(sql);
            ps1.setInt(1, admCedula);
            ResultSet rs=ps1.executeQuery();
        
            //Se realiza la validacion de si el query trae algun valor para luego proceder a insertarlo o no 
            if (rs.next())

             {

                    adminLogin = rs.getString("admin_login"); 
                   // System.out.println("adminlogin"+adminLogin);
             }   
              else
              {
              //si no existe un login registrado, con esa cedula se procede a insertar
                    
              
                        try {
                               String sql2="insert into administrador values(?,?,?)";
                               ps= con.prepareStatement(sql2);
                               ps.setInt(1,admCedula);
                               ps.setString(2,admLogin);
                               ps.setString(3,admContrasena);

                              int registros=ps.executeUpdate();

                               System.out.println("Ingreso correcto de " +registros+ "administrador ");


                               //cerrar conexion
                                  ps.close();

                           } catch (SQLException e) {
                                System.out.println("ERROR, No se pudieron insertar los administradores "+e.toString());
                           }
                
              }
            
            // Cerrar la conexión  
           ps1.close();
           }catch(SQLException e){
           System.out.println("ERROR, No se puedo realizar la consulta en la tabla Administrador"+e.toString());

        }
              
              
}   
 //public void ValidarExistencia (String admLogin, String admContrasena, String admCedula, String letraRuta) {     
public void ValidarExistencia (String admLogin, String admContrasena, String admCedula) {

       try {
           int adminCedulaInt = Integer.parseInt(admCedula);
            PreparedStatement ps1= null;
            
            // se selecciona la cedula del administrador que ingreso esos valores a la interfaz para validar
            // su existencia
            String sql="SELECT admin_cedula  FROM ADMINISTRADOR WHERE admin_login=? and admin_contrasena=? and admin_cedula=?";
            
            ps1=con.prepareStatement(sql);
            ps1.setString(1, admLogin);
            ps1.setString(2, admContrasena);
            ps1.setInt(3, adminCedulaInt);
            ResultSet rs=ps1.executeQuery();
        
              if(rs.next())
            {
                /* se valida si se consiguio la cedula, es decir si el administrador existe podra
                 * exportar el archivo con las apuestas 
                 */
                adminCedula = rs.getInt("admin_cedula"); 
                apuesta.InsertaXML();
                //apuesta.InsertaXML(letraRuta);
            }
                    
        }catch(SQLException e){
            System.out.println("ERROR, No se pudo validar la existencia del administrador"+e.toString());

        }
         
         
         
    
    
    
    
    
    
} 
    
    
    
}
