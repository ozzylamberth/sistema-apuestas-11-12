/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/*
 * Jmaquina.java
 *
 * Created on 23/12/2011, 06:16:35 PM
 */
package GUI;

import Repositorio.Categoria;
import Repositorio.Evento;
import Repositorio.FindDrive;
import Repositorio.ParEve;
import java.sql.SQLException;
import java.util.logging.Level;
import java.util.logging.Logger;
import org.apache.commons.logging.Log;
import org.apache.commons.logging.LogFactory;

/**
 *
 * *@author Eleany G
 * Esta interfaz garafica muestra la pantalla principal, de la cual se puede dirigir a las instrucciones 
 * o a jugar por categoria o eventos
 * Modificacion 05.01
 * @author Irene
 * invocacion del metodo para detecctar el pendrive
 * 
 * 
 */
public class Jmaquina extends javax.swing.JFrame {

    private Evento leerBD = new Evento();
    private ParEve llenarPE = new ParEve();
    private Categoria llenarCat = new Categoria();
    private  String letter;

    /** Creates new form Jmaquina */
    public Jmaquina() {
        initComponents();
        initBD();
    }
    
  
//Inicializa las listas para llenar los combobox con la informacion de los distintos eventos, categorias, etc
    public final void initBD() {
        try {
            leerBD.consultar();
            llenarPE.consultar();
            llenarCat.consultar();
            eventos.setVisible(false);
            categorias.setVisible(false);
        } catch (SQLException ex) {
            Logger.getLogger(Jmaquina.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
    
    //metodo que guarda la letra de la unidad donde se conecto el pendrive
     public void setPendrive(String letter) {
        letter= this.letter;
        logger.info("Unidad " + this.letter);
        System.out.println("Unidad es "+this.letter);
    }

    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        Jugar = new javax.swing.JButton();
        Instrucciones = new javax.swing.JButton();
        eventos = new javax.swing.JButton();
        categorias = new javax.swing.JButton();
        jLogin = new javax.swing.JButton();
        jLabel1 = new javax.swing.JLabel();

        setDefaultCloseOperation(javax.swing.WindowConstants.EXIT_ON_CLOSE);
        setMinimumSize(new java.awt.Dimension(1090, 720));
        setResizable(false);
        getContentPane().setLayout(null);

        Jugar.setFont(new java.awt.Font("Comic Sans MS", 1, 60)); // NOI18N
        Jugar.setForeground(new java.awt.Color(153, 0, 0));
        Jugar.setIcon(new javax.swing.ImageIcon(getClass().getResource("/GUI/LC00CS0T.gif"))); // NOI18N
        Jugar.setText("¡JUGAR!");
        Jugar.setBorderPainted(false);
        Jugar.setContentAreaFilled(false);
        Jugar.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                JugarActionPerformed(evt);
            }
        });
        getContentPane().add(Jugar);
        Jugar.setBounds(250, 140, 460, 130);

        Instrucciones.setFont(new java.awt.Font("Comic Sans MS", 1, 36)); // NOI18N
        Instrucciones.setForeground(new java.awt.Color(227, 224, 0));
        Instrucciones.setText("INSTRUCCIONES");
        Instrucciones.setBorderPainted(false);
        Instrucciones.setContentAreaFilled(false);
        Instrucciones.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                InstruccionesActionPerformed(evt);
            }
        });
        getContentPane().add(Instrucciones);
        Instrucciones.setBounds(30, 40, 370, 60);

        eventos.setFont(new java.awt.Font("Comic Sans MS", 1, 48)); // NOI18N
        eventos.setForeground(new java.awt.Color(227, 224, 0));
        eventos.setIcon(new javax.swing.ImageIcon(getClass().getResource("/GUI/06.gif"))); // NOI18N
        eventos.setText("Eventos");
        eventos.setBorderPainted(false);
        eventos.setContentAreaFilled(false);
        eventos.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                eventosActionPerformed(evt);
            }
        });
        getContentPane().add(eventos);
        eventos.setBounds(110, 330, 350, 80);

        categorias.setFont(new java.awt.Font("Comic Sans MS", 1, 48)); // NOI18N
        categorias.setForeground(new java.awt.Color(227, 224, 0));
        categorias.setIcon(new javax.swing.ImageIcon(getClass().getResource("/GUI/06.gif"))); // NOI18N
        categorias.setText("Categorias");
        categorias.setBorderPainted(false);
        categorias.setContentAreaFilled(false);
        categorias.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                categoriasActionPerformed(evt);
            }
        });
        getContentPane().add(categorias);
        categorias.setBounds(600, 330, 380, 80);

        jLogin.setText("LOGIN");
        jLogin.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jLoginActionPerformed(evt);
            }
        });
        getContentPane().add(jLogin);
        jLogin.setBounds(270, 470, 73, 23);

        jLabel1.setIcon(new javax.swing.ImageIcon(getClass().getResource("/GUI/home.jpg"))); // NOI18N
        jLabel1.setMaximumSize(new java.awt.Dimension(1090, 720));
        jLabel1.setMinimumSize(new java.awt.Dimension(1090, 720));
        jLabel1.setPreferredSize(new java.awt.Dimension(1090, 720));
        getContentPane().add(jLabel1);
        jLabel1.setBounds(0, -80, 1440, 910);

        pack();
    }// </editor-fold>//GEN-END:initComponents
//Boton de jugar, que hace visible 2 botones, el de eventos y categorias
    private void JugarActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_JugarActionPerformed
        // TODO add your handling code here:
        eventos.setVisible(true);
        categorias.setVisible(true);
    }//GEN-LAST:event_JugarActionPerformed

    //Boton de Instrucciones, hace una nueva instancia de la pantalla instrucciones y cierra la principal
    private void InstruccionesActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_InstruccionesActionPerformed
        // TODO add your handling code here:
        new Jinstrucciones().setVisible(true);
        
    }//GEN-LAST:event_InstruccionesActionPerformed
//Boton eventos, hace una nueva instancia de la pantalla apuesta para apostar desde el evento y cierra la pantalla principal
private void eventosActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_eventosActionPerformed

    new JmaquinaApuesta().setVisible(true);
    this.dispose();
    // TODO add your handling code here:
}//GEN-LAST:event_eventosActionPerformed
//Boton categorias, crea una nueva instancia de la pantalla categorias, para jugar por categorias y cierra la pantalla principal
private void categoriasActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_categoriasActionPerformed
    new JmaquinaCategoria().setVisible(true);
    this.dispose();
    // TODO add your handling code here:
}//GEN-LAST:event_categoriasActionPerformed

private void jLoginActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jLoginActionPerformed
// TODO add your handling code here:
    
  
    new JexportArchivo(this.letter).setVisible(true);
    this.dispose();
    System.out.println("lettra"+this.letter);
}//GEN-LAST:event_jLoginActionPerformed

    /**
     * @param args the command line arguments
     */
    public static void main(String args[]) {
        java.awt.EventQueue.invokeLater(new Runnable() {

            public void run() {
                Jmaquina maquina = new Jmaquina();
                maquina.setVisible(true);
                new FindDrive(maquina).start();
            }
        });
    }
    protected final Log logger = LogFactory.getLog(getClass());

   //Metodo que al detectar un pendrive,oculta la pantalla mientras se actualiza la BD 
    public void esperar() {
        logger.error("AQUIIIIIII");
        this.setVisible(false);
        System.out.println("esperando....");
        new Jactualizar().setVisible(true);
    }

    //Metodo que al terminar la actualizacion de la BD, hace visible la pantalla principal, reinicia la maquina
    public void continuar() {
        
        new Jmaquina().setVisible(true);
        System.out.println("continuando....");
    }

  /*  public void setPendrive(String letter) {
        this.letter = letter;
        logger.info("Unidad " + this.letter);
    }
     * 
     */
    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JButton Instrucciones;
    private javax.swing.JButton Jugar;
    private javax.swing.JButton categorias;
    private javax.swing.JButton eventos;
    private javax.swing.JLabel jLabel1;
    private javax.swing.JButton jLogin;
    // End of variables declaration//GEN-END:variables
}
