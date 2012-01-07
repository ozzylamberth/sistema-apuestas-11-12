package Repositorio;

import GUI.Jmaquina;
import java.io.*;
import java.text.ParseException;

/**
 * Waits for USB devices to be plugged in/unplugged and outputs a message
 *
 */
public class FindDrive extends Thread {

    Jmaquina maquina;

    public FindDrive(Jmaquina maquina) {
        this.maquina = maquina;
    }

    /**
     * Application Entry Point
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

        // init the file objects and the initial drive state
        for (int i = 0; i < letters.length; ++i) {
            drives[i] = new File(letters[i] + ":/");

            isDrive[i] = drives[i].canRead();
        }

        System.out.println("FindDrive: waiting for devices...");

        // loop indefinitely
        while (true) {
            // check each drive 
            for (int i = 0; i < letters.length; ++i) {
                boolean pluggedIn = drives[i].canRead();

                // if the state has changed output a message
                if (pluggedIn != isDrive[i]) {
                    if (pluggedIn) {
                        if (maquina.isActive()) {
                            maquina.setPendrive(drives[i].getPath());
                            maquina.esperar();
                       
                            System.out.println("Drive " + drives[i].getPath() + " has been plugged in");
                            try {
                                File[] file = finder(drives[i].getPath());
                                DAOarchivoDB dao = new DAOarchivoDB();
                                dao.insertar(file[0].getPath());
                            } catch (ParseException e) {
                                e.printStackTrace();  //To change body of catch statement use File | Settings | File Templates.
                            }
                      
                            maquina.continuar(drives[i].getPath());
                            
                        }
                        else{
                           System.out.println("Por favor, dirigirse a la primera pantalla");
                        }
                    } else {
                        System.out.println("Drive " + letters[i] + " has been unplugged");
                    }

                    isDrive[i] = pluggedIn;
                }
            }

            // wait before looping
            try {
                Thread.sleep(100);
            } catch (InterruptedException e) { /* do nothing */ }

        }
    }
}