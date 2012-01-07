/*
 * @author Irene
 * Esta clase es la que implementa todas las listas que seran invocadas
 * al momento de la lectura del archivo XML que contiene los datos a inser
 * tar en la BD, 
 */
package Dominio;

import Repositorio.Administrador;
import Repositorio.Categoria;
import Repositorio.Evento;
import Repositorio.Maquina;
import Repositorio.Participante;
import java.util.ArrayList;


public class ListadoArchivo {
    public ArrayList<Evento> Eventos;
    public ArrayList<Participante> Participantes;
    public ArrayList<Administrador> Administradores;
    public ArrayList<Categoria> Categorias;
    public ArrayList<Maquina> Maquinas;


}
