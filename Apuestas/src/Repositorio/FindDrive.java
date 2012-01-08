package Repositorio;

import GUI.Jmaquina;
import java.io.*;
import java.text.ParseException;

/**
 * Clase que espera que se inserte un dispositivo externo en la unidad, para posteriormente
 * saber en que puerto fue insertado y pasar ese parametro a la clase que exporta el archivo
 * de las apuestas que no han sido enviadas, esta clase tambien invoca al metodo que inserta 
 * en la BD al instanciar un objeto de tipo DAOarchivoDB
 */
public class FindDrive extends Thread {

    Jmaquina maquina;

    public FindDrive(Jmaquina maquina) {
        this.maquina = maquina;
    }

    /**
     * Este metodo finder, recorre el dispositivo encontrado, y busca archivos con la 
     * extension XML.
     */
    public static File[] finder(String dirName) {
        File dir = new File(dirName);

        return dir.listFiles(new FilenameFilter() {

            public boolean accept(File dir, String filename) {
                return filename.endsWith(".xml");
            }
        });

    }

    public void run() {
        String[] letters = new String[]{"A", "B", "C", "D", "E", "F", "G", "H", "I"};
        File[] drives = new File[letters.length];
        boolean[] isDrive = new boolean[letters.length];

       
      // Se  inicializan  los objetos del archivo y el estado inicial de la unidad
        for (int i = 0; i < letters.length; ++i) {
            drives[i] = new File(letters[i] + ":/");

            isDrive[i] = drives[i].canRead();
        }

        System.out.println("Esperando dispositivos...");

        // Se crea un loop indefinido, que tiene un tiempo de espera para buscar dispositivos
        while (true) {
            // Se chequea cada uno de los puertos
            for (int i = 0; i < letters.length; ++i) {
                boolean pluggedIn = drives[i].canRead();

                // se verifica si el estado ha cambiado
                if (pluggedIn != isDrive[i]) {
                    if (pluggedIn) {
                       // Se inicializa un objeto de tipo jmaquina y se invoca al metodo de esperar 
                        if (maquina.isActive()) {
                            maquina.setPendrive(drives[i].getPath());
                            maquina.esperar();
                       
                            System.out.println("El dispositivo" + drives[i].getPath() + " ha sido introducido");
                            try {
                                File[] file = finder(drives[i].getPath());
                                // Se instacia un objeto de tipo DAOarchivoDB que es el encargado de guardar en la BD
                                // cada uno de los valores presentes en el XML
                                DAOarchivoDB dao = new DAOarchivoDB();
                                dao.insertar(file[0].getPath());
                            } catch (ParseException e) {
                                e.printStackTrace();  //To change body of catch statement use File | Settings | File Templates.
                            }
                            // luego de insertar los valores del XML se vuelve a mostrar la pantalla ppal
                            maquina.continuar();
                            
                        }
                        else{
                            // mensaje que indica que para introducir el pendrive debe el administrador
                            // estar en la primera pantalla
                           System.out.println("Por favor, dirigirse a la primera pantalla");
                        }
                    } else {
                        System.out.println("El dispositivo " + letters[i] + "ha sido desenchufado");
                    }

                    isDrive[i] = pluggedIn;
                }
            }

            // se define cierto tiempo para que se busque si se ha introducido un dispositivo externo
            try {
                Thread.sleep(100);
            } catch (InterruptedException e) {
             System.out.println("Se interrumpio la busqueda"+e); }

        }
    }
}