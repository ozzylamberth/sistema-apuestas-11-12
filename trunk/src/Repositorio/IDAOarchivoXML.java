
package Repositorio;

import java.util.ArrayList;


/* @author Irene
 * Esta es la interfaz que contiene las declaraciones de todos los metodos
 * en este caso arreglos, implementados en la clase DAOapuestaXML
 */
public interface IDAOarchivoXML {
    
    
    public ArrayList<Evento> todosLosEventos();
    public ArrayList<Participante> todosLosParticipantes();
    public ArrayList<Administrador> todosLosAdministradores();
    public ArrayList<Categoria> todasLasCategorias();
    public ArrayList<Maquina> todasLasMaquinas();
}
