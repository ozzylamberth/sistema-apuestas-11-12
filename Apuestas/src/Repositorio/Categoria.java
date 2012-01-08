

package Repositorio;

import Dominio.ConectarBD;
import Dominio.ListaCategoria;
import java.sql.*;
import org.apache.commons.logging.Log;
import org.apache.commons.logging.LogFactory;

/**
 * @author Irene
 * en esta clase se definen los atributos de la categoria, asi como tambien 
 * el metodo de insercion en bd
 *  @author Eleany G
 * modificacion realizada el 20/12/2011
 * Creacion del metodo que consulta en la Bd y llena el arreglo de la categoria
 * 
 */

public class Categoria extends ConectarBD {
    
    private Integer catId;
    private String catNombre;
    //Nombre al que se le asigna el valor traido de la bd cuando se valida si hacer o no la insercion
    private String catNombreq;
    // variable utilizada para el log de errores
    protected final Log logger = LogFactory.getLog(getClass());

    private Connection con =null;

    public Categoria(){
    con=obtenerConexion();
    
    }

    public Categoria(Integer catId, String catNombre) {
        this.catId = catId;
        this.catNombre = catNombre;
    }

    public Integer getCatId() {
        return catId;
    }

    public void setCatId(Integer catId) {
        this.catId = catId;
    }

    public String getCatNombre() {
        return catNombre;
    }

    public void setCatNombre(String catNombre) {
        this.catNombre = catNombre;
    }

    public Connection getCon() {
        return con;
    }

    public void setCon(Connection con) {
        this.con = con;
    }



    
 public void InsertarenBD (int catId, String catNombre) {
      
      try{
          
             PreparedStatement ps= null;  //usado al consultar si existe la categoria
             PreparedStatement ps1= null; //usado al insertar categorias
            
            // se selecciona el login del administrador para ver si hay valores con esa cedula
            String sql="SELECT cat_nombre  FROM CATEGORIA WHERE cat_id=?";
            
            ps1=con.prepareStatement(sql);
            ps1.setInt(1, catId);
            ResultSet rs=ps1.executeQuery();
        
            //Se realiza la validacion de si el query trae algun valor para luego proceder a insertarlo o no 
            if (rs.next())
             {
                 catNombreq = rs.getString("cat_nombre"); 
             }   
              else
             {
              //si no existe ese nombre de la categoria con ese id se procede a insertar
               
                 try {
                       String sql2="insert into categoria values(?,?)";
                       ps= con.prepareStatement(sql2);
                       ps.setInt(1,catId);
                       ps.setString(2,catNombre);

                       int registros=ps.executeUpdate();
                       System.out.println("Ingreso correcto de "+registros+"categoria");


                       //cerrar conexion
                          ps.close();

                   } catch (SQLException e) {
                       System.out.println("ERROR, No se pudo ejecutar la insercion de las categorias"+e.toString());
                       logger.error("No se pudo ejecutar la insercion de las categorias ");
                   }
              }
      // Cerrar la conexión  
           ps1.close();
           }
             catch(SQLException e){
             System.out.println("ERROR, No se puedo realizar la consulta en la tabla Categoria"+e.toString());
             logger.error("No se puedo realizar la consulta en la tabla Categoria");
        }
       
   }
 
  //Lleno la lista a partir de la BD
    
     public void consultar() throws SQLException
    {
        try{
            PreparedStatement ps= null;
            String sql="SELECT* FROM CATEGORIA";
            ps=con.prepareStatement(sql);
            ResultSet rs=ps.executeQuery();

            // Este while es el encargado de almacenar en un arreglo todas las categorias 
            // que se encuentran en la BD
            while(rs.next())
            {
                ListaCategoria.nuevaCategoria(rs.getInt("cat_id"), rs.getString("cat_nombre"));
            }
        }catch(SQLException e){
            System.out.println("ERROR, No se pudo ejecutar la consulta de las categorias"+e.toString());
            logger.error(" No se pudo ejecutar la consulta de las categorias");
        }
    }
 
 
}

