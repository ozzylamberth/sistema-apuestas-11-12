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
import Repositorio.DAOarchivoDB;
import Repositorio.Evento;
import Repositorio.FindDrive;
import Repositorio.ParEve;
import java.io.File;
import java.io.FilenameFilter;
import java.sql.SQLException;
import java.text.ParseException;
import java.util.logging.Level;
import java.util.logging.Logger;

import org.apache.commons.logging.Log;
import org.apache.commons.logging.LogFactory;

/**
 *
 * @author Irene
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

    public void initBD() {
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
    
     public void setPendrive(String letter) {
        this.letter=letter;
        logger.info("Unidad " + this.letter);
        System.out.println("lettrasp"+letter);
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

        Jugar.setFont(new java.awt.Font("Comic Sans MS", 1, 60));
        Jugar.setForeground(new java.awt.Color(153, 0, 0));
        Jugar.setText("¡JUGAR!");
        Jugar.setBorderPainted(false);
        Jugar.setContentAreaFilled(false);
        Jugar.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                JugarActionPerformed(evt);
            }
        });
        getContentPane().add(Jugar);
        Jugar.setBounds(340, 140, 320, 130);

        Instrucciones.setFont(new java.awt.Font("Comic Sans MS", 1, 36));
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

        eventos.setFont(new java.awt.Font("Comic Sans MS", 1, 48));
        eventos.setForeground(new java.awt.Color(227, 224, 0));
        eventos.setText("Eventos");
        eventos.setBorderPainted(false);
        eventos.setContentAreaFilled(false);
        eventos.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                eventosActionPerformed(evt);
            }
        });
        getContentPane().add(eventos);
        eventos.setBounds(130, 330, 280, 80);

        categorias.setFont(new java.awt.Font("Comic Sans MS", 1, 48));
        categorias.setForeground(new java.awt.Color(227, 224, 0));
        categorias.setText("Categorias");
        categorias.setBorderPainted(false);
        categorias.setContentAreaFilled(false);
        categorias.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                categoriasActionPerformed(evt);
            }
        });
        getContentPane().add(categorias);
        categorias.setBounds(600, 330, 280, 80);

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

    private void JugarActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_JugarActionPerformed
        // TODO add your handling code here:
        eventos.setVisible(true);
        categorias.setVisible(true);
    }//GEN-LAST:event_JugarActionPerformed

    private void InstruccionesActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_InstruccionesActionPerformed
        // TODO add your handling code here:
        new Jinstrucciones().setVisible(true);
        this.dispose();
    }//GEN-LAST:event_InstruccionesActionPerformed

private void eventosActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_eventosActionPerformed

    new JmaquinaApuesta().setVisible(true);
    this.dispose();
    // TODO add your handling code here:
}//GEN-LAST:event_eventosActionPerformed

private void categoriasActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_categoriasActionPerformed
    new JmaquinaCategoria().setVisible(true);
    this.dispose();
    // TODO add your handling code here:
}//GEN-LAST:event_categoriasActionPerformed

private void jLoginActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jLoginActionPerformed
// TODO add your handling code here:
    
  
    new JexportArchivo(this.letter).setVisible(true);
    this.dispose();
   System.out.println("lettra"+letter);
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

    public void esperar() {
        logger.error("AQUIIIIIII");
        this.setVisible(false);
        System.out.println("esperando....");
    }

    public void continuar(String letter) {
        new Jmaquina().setVisible(true);
        System.out.println("continuando....");
        this.letter=letter;
        logger.info("Unidadconti " + this.letter);
        System.out.println("continuar"+letter);
       
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
