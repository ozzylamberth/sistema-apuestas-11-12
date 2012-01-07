
package GUI;

import Dominio.ListadoApuesta;
import Repositorio.Administrador;
import java.awt.event.KeyAdapter;
import java.awt.event.KeyEvent;
import java.util.logging.Level;
import java.util.logging.Logger;
/**
 *
 * @author Irene
 * interfaz creada para 
 */
public class JexportArchivo extends javax.swing.JFrame {
Administrador admin = new Administrador();
private String letraRuta;

ListadoApuesta control =  new ListadoApuesta();
    
    /** Creates new form JexportArchivo */
    public JexportArchivo() {
        initComponents();
         Validaciones();
      //  control.nuevaApuesta(id,monto,maqId);
    }

    public JexportArchivo(String letra) {
        initComponents();
        letraRuta= letra;
        // System.out.println("letra"+letra);
    }

    
       public void Validaciones(){
        jCedula.addKeyListener(new KeyAdapter() {
            @Override
            public void keyTyped(KeyEvent e) {
                char c = e.getKeyChar();
                if (!((Character.isDigit(c) ||
                        (c == KeyEvent.VK_BACK_SPACE) ||
                        (c == KeyEvent.VK_DELETE)))) {
                    getToolkit().beep();
                    e.consume();
                }
            }
        });
       }

    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        jUsuario = new javax.swing.JTextField();
        jLabel3 = new javax.swing.JLabel();
        jLabel4 = new javax.swing.JLabel();
        jLabel2 = new javax.swing.JLabel();
        jButtonAceptar = new javax.swing.JButton();
        jContrasena = new javax.swing.JPasswordField();
        jLabel1 = new javax.swing.JLabel();
        jCedula = new javax.swing.JTextField();

        setDefaultCloseOperation(javax.swing.WindowConstants.EXIT_ON_CLOSE);
        setMinimumSize(new java.awt.Dimension(1080, 720));
        getContentPane().setLayout(null);

        jUsuario.setFont(new java.awt.Font("Tahoma", 1, 18));
        jUsuario.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jUsuarioActionPerformed(evt);
            }
        });
        getContentPane().add(jUsuario);
        jUsuario.setBounds(490, 280, 376, 75);

        jLabel3.setFont(new java.awt.Font("Tahoma", 1, 24));
        jLabel3.setText("Usuario");
        getContentPane().add(jLabel3);
        jLabel3.setBounds(300, 300, 130, 45);

        jLabel4.setFont(new java.awt.Font("Tahoma", 1, 24));
        jLabel4.setText("Contraseña:");
        getContentPane().add(jLabel4);
        jLabel4.setBounds(300, 420, 150, 45);

        jLabel2.setFont(new java.awt.Font("Tahoma", 1, 24));
        jLabel2.setText("Estimado Administrador debe proporcionar:");
        getContentPane().add(jLabel2);
        jLabel2.setBounds(257, 41, 558, 64);

        jButtonAceptar.setFont(new java.awt.Font("Tahoma", 1, 24));
        jButtonAceptar.setText("Aceptar");
        jButtonAceptar.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jButtonAceptarActionPerformed(evt);
            }
        });
        getContentPane().add(jButtonAceptar);
        jButtonAceptar.setBounds(450, 570, 280, 70);

        jContrasena.setFont(new java.awt.Font("Tahoma", 1, 18));
        getContentPane().add(jContrasena);
        jContrasena.setBounds(490, 410, 380, 70);

        jLabel1.setFont(new java.awt.Font("Tahoma", 1, 24));
        jLabel1.setText("Cédula");
        getContentPane().add(jLabel1);
        jLabel1.setBounds(300, 190, 150, 40);

        jCedula.setFont(new java.awt.Font("Tahoma", 1, 18));
        getContentPane().add(jCedula);
        jCedula.setBounds(490, 170, 370, 70);

        pack();
    }// </editor-fold>//GEN-END:initComponents

private void jUsuarioActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jUsuarioActionPerformed
// TODO add your handling code here:
}//GEN-LAST:event_jUsuarioActionPerformed

private void jButtonAceptarActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jButtonAceptarActionPerformed
// TODO add your handling code here:
    String usuario = this.jUsuario.getText();
    String contrasena = this.jContrasena.getText();
    String cedula = this.jCedula.getText();
    
    admin.ValidarExistencia(usuario, contrasena, cedula); 
  // admin.ValidarExistencia(usuario, contrasena, cedula, letraRuta);
}//GEN-LAST:event_jButtonAceptarActionPerformed

    /**
     * @param args the command line arguments
     */
    public static void main(String args[]) {
        /* Set the Nimbus look and feel */
        //<editor-fold defaultstate="collapsed" desc=" Look and feel setting code (optional) ">
        /* If Nimbus (introduced in Java SE 6) is not available, stay with the default look and feel.
         * For details see http://download.oracle.com/javase/tutorial/uiswing/lookandfeel/plaf.html 
         */
        try {
            for (javax.swing.UIManager.LookAndFeelInfo info : javax.swing.UIManager.getInstalledLookAndFeels()) {
                if ("Nimbus".equals(info.getName())) {
                    javax.swing.UIManager.setLookAndFeel(info.getClassName());
                    break;
                }
            }
        } catch (ClassNotFoundException ex) {
            java.util.logging.Logger.getLogger(JexportArchivo.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (InstantiationException ex) {
            java.util.logging.Logger.getLogger(JexportArchivo.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (IllegalAccessException ex) {
            java.util.logging.Logger.getLogger(JexportArchivo.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (javax.swing.UnsupportedLookAndFeelException ex) {
            java.util.logging.Logger.getLogger(JexportArchivo.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        }
        //</editor-fold>

        /* Create and display the form */
        java.awt.EventQueue.invokeLater(new Runnable() {

            public void run() {
                new JexportArchivo().setVisible(true);
            }
        });
    }
    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JButton jButtonAceptar;
    private javax.swing.JTextField jCedula;
    private javax.swing.JPasswordField jContrasena;
    private javax.swing.JLabel jLabel1;
    private javax.swing.JLabel jLabel2;
    private javax.swing.JLabel jLabel3;
    private javax.swing.JLabel jLabel4;
    private javax.swing.JTextField jUsuario;
    // End of variables declaration//GEN-END:variables
}
