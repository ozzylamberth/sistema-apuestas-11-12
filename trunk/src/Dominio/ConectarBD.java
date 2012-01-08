/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package Dominio;


import java.sql.*;

/**
 *
 * @author Eleany G
 */
public class ConectarBD {
    
  private Connection conexion;
    
  //Este método en caso de no haber conexion se conesta a la bd registrada con el 
  //nombre de MAQUINAAPUESTA y contraseña IRENE
  public ConectarBD()
    {
        try{
            if(conexion==null)
            {
                DriverManager.registerDriver(new oracle.jdbc.driver.OracleDriver());
                conexion = DriverManager.getConnection("jdbc:oracle:thin:@localhost:1521:XE", "MAQUINAAPUESTA", "IRENE");
                 
                
            }
        }catch(Exception e){
            System.out.println("ERROR, No se pudo crear la conexion " + e.toString());
        }
    }
    
    //Este metodo devuelve si hayo no conexion a la bd
    public Connection obtenerConexion()
    {
        return conexion;
    }
    
   // Este metodo será el encargado de finalizar la conexion con la BD
    
    public void finalizar() throws Throwable
    {
        try{
            if(conexion!=null)
                conexion.close();
        }catch(SQLException e){
            System.out.println("ERROR, No se pudo cerrar la conexion " + e.toString());
        }
    }
    }
