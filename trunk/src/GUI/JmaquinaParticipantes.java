/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/*
 * JmaquinaParticipantes.java
 *
 * Created on 28-dic-2011, 2:38:44
 */
package GUI;

import Repositorio.Apuesta;
import Repositorio.Categoria;
import Repositorio.Evento;
import Dominio.ListaCategoria;
import Dominio.ListaEvento;
import Dominio.ListaParticipante;
import Repositorio.Maquina;
import Repositorio.ParEve;
import Repositorio.Participante;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.swing.JOptionPane;

/**
 *
 * @author Eleany G
 */
public class JmaquinaParticipantes extends javax.swing.JFrame {
    private Integer eveId;
    private Integer parId;
    private String apuMonto;
    private int peTopeApuesta;
    private ListaParticipante comboBoxParticipante= new ListaParticipante();
    private Apuesta manejadorRepositorioApu= new Apuesta();
    private Maquina manejadorRepositorioMaq= new Maquina();
   
   
    

    /** Creates new form JmaquinaParticipantes */
    public JmaquinaParticipantes() {
        initComponents();
        comboBoxParticipante.participanteCB(jComboBoxPar);
        
    }
    
    public JmaquinaParticipantes(Integer idEveGlobal) {
        initComponents();
        comboBoxParticipante.participanteCB(jComboBoxPar);
        eveId= idEveGlobal;
        //System.out.println(idE+"idevento");
        apostar.setVisible(false);
        aceptar.setVisible(false);
        jLabel3.setVisible(false);
        jLabel2.setVisible(false);
        jLabel5.setVisible(false);
        jTextFieldMonto.setVisible(false);
        jTextField1TopA.setVisible(false);
        jTextFieldTipoP.setVisible(false);
    }

    /** This method is called from within the constructor to
     * initialize the form.
     * WARNING: Do NOT modify this code. The content of this method is
     * always regenerated by the Form Editor.
     */
    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        jLayeredPane1 = new javax.swing.JLayeredPane();
        jLayeredPane2 = new javax.swing.JLayeredPane();
        jLabel4 = new javax.swing.JLabel();
        jComboBoxPar = new javax.swing.JComboBox();
        jTextField1TopA = new javax.swing.JTextField();
        jTextFieldTipoP = new javax.swing.JTextField();
        jLabel2 = new javax.swing.JLabel();
        jLabel5 = new javax.swing.JLabel();
        jLabel6 = new javax.swing.JLabel();
        apostar = new javax.swing.JButton();
        jLabel3 = new javax.swing.JLabel();
        jTextFieldMonto = new javax.swing.JTextField();
        aceptar = new javax.swing.JButton();
        cancelar = new javax.swing.JButton();
        jLabel1 = new javax.swing.JLabel();

        setDefaultCloseOperation(javax.swing.WindowConstants.EXIT_ON_CLOSE);
        setMinimumSize(new java.awt.Dimension(1080, 720));
        setResizable(false);

        jLayeredPane1.setMaximumSize(new java.awt.Dimension(1080, 720));
        jLayeredPane1.setMinimumSize(new java.awt.Dimension(1080, 720));

        jLayeredPane2.setMaximumSize(new java.awt.Dimension(1080, 720));
        jLayeredPane2.setMinimumSize(new java.awt.Dimension(1080, 720));
        jLayeredPane2.setRequestFocusEnabled(false);

        jLabel4.setFont(new java.awt.Font("Comic Sans MS", 1, 48));
        jLabel4.setForeground(new java.awt.Color(227, 224, 0));
        jLabel4.setText("Participantes");
        jLabel4.setBounds(70, 30, 310, 67);
        jLayeredPane2.add(jLabel4, javax.swing.JLayeredPane.DEFAULT_LAYER);

        jComboBoxPar.setFont(new java.awt.Font("Comic Sans MS", 1, 24));
        jComboBoxPar.setModel(new javax.swing.DefaultComboBoxModel(new String[] { "Seleccion" }));
        jComboBoxPar.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jComboBoxParActionPerformed(evt);
            }
        });
        jComboBoxPar.setBounds(60, 150, 360, 100);
        jLayeredPane2.add(jComboBoxPar, javax.swing.JLayeredPane.DEFAULT_LAYER);

        jTextField1TopA.setEditable(false);
        jTextField1TopA.setFont(new java.awt.Font("Comic Sans MS", 1, 18));
        jTextField1TopA.setBorder(javax.swing.BorderFactory.createLineBorder(new java.awt.Color(227, 224, 0), 3));
        jTextField1TopA.setBounds(780, 130, 210, 40);
        jLayeredPane2.add(jTextField1TopA, javax.swing.JLayeredPane.DEFAULT_LAYER);

        jTextFieldTipoP.setEditable(false);
        jTextFieldTipoP.setFont(new java.awt.Font("Comic Sans MS", 1, 18));
        jTextFieldTipoP.setBorder(javax.swing.BorderFactory.createLineBorder(new java.awt.Color(227, 224, 0), 3));
        jTextFieldTipoP.setBounds(780, 220, 210, 40);
        jLayeredPane2.add(jTextFieldTipoP, javax.swing.JLayeredPane.DEFAULT_LAYER);

        jLabel2.setFont(new java.awt.Font("Comic Sans MS", 1, 24));
        jLabel2.setForeground(new java.awt.Color(227, 224, 0));
        jLabel2.setText("Tope Apuesta");
        jLabel2.setBounds(590, 120, 170, 50);
        jLayeredPane2.add(jLabel2, javax.swing.JLayeredPane.DEFAULT_LAYER);

        jLabel5.setFont(new java.awt.Font("Comic Sans MS", 1, 24));
        jLabel5.setForeground(new java.awt.Color(227, 224, 0));
        jLabel5.setText("Tipo de Pago");
        jLabel5.setBounds(600, 220, 170, 40);
        jLayeredPane2.add(jLabel5, javax.swing.JLayeredPane.DEFAULT_LAYER);

        jLabel6.setFont(new java.awt.Font("Comic Sans MS", 1, 48));
        jLabel6.setForeground(new java.awt.Color(227, 224, 0));
        jLabel6.setText("Descripcion");
        jLabel6.setBounds(670, 30, 290, 70);
        jLayeredPane2.add(jLabel6, javax.swing.JLayeredPane.DEFAULT_LAYER);

        apostar.setFont(new java.awt.Font("Comic Sans MS", 1, 36));
        apostar.setForeground(new java.awt.Color(204, 0, 0));
        apostar.setText("Apostar");
        apostar.setBorderPainted(false);
        apostar.setContentAreaFilled(false);
        apostar.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                apostarActionPerformed(evt);
            }
        });
        apostar.setBounds(40, 390, 260, 90);
        jLayeredPane2.add(apostar, javax.swing.JLayeredPane.DEFAULT_LAYER);

        jLabel3.setFont(new java.awt.Font("Comic Sans MS", 1, 24));
        jLabel3.setForeground(new java.awt.Color(227, 224, 0));
        jLabel3.setText("Ingrese Monto de la Apuesta:");
        jLabel3.setBounds(500, 350, 390, 60);
        jLayeredPane2.add(jLabel3, javax.swing.JLayeredPane.DEFAULT_LAYER);

        jTextFieldMonto.setFont(new java.awt.Font("Comic Sans MS", 1, 24));
        jTextFieldMonto.setBorder(javax.swing.BorderFactory.createLineBorder(new java.awt.Color(227, 224, 0), 3));
        jTextFieldMonto.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jTextFieldMontoActionPerformed(evt);
            }
        });
        jTextFieldMonto.addKeyListener(new java.awt.event.KeyAdapter() {
            public void keyReleased(java.awt.event.KeyEvent evt) {
                jTextFieldMontoKeyReleased(evt);
            }
        });
        jTextFieldMonto.setBounds(530, 430, 300, 40);
        jLayeredPane2.add(jTextFieldMonto, javax.swing.JLayeredPane.DEFAULT_LAYER);

        aceptar.setFont(new java.awt.Font("Comic Sans MS", 1, 36));
        aceptar.setForeground(new java.awt.Color(227, 224, 0));
        aceptar.setText("Aceptar");
        aceptar.setBorderPainted(false);
        aceptar.setContentAreaFilled(false);
        aceptar.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                aceptarActionPerformed(evt);
            }
        });
        aceptar.setBounds(580, 500, 200, 50);
        jLayeredPane2.add(aceptar, javax.swing.JLayeredPane.DEFAULT_LAYER);

        cancelar.setFont(new java.awt.Font("Comic Sans MS", 1, 28)); // NOI18N
        cancelar.setForeground(new java.awt.Color(227, 224, 0));
        cancelar.setText("Cancelar");
        cancelar.setBorderPainted(false);
        cancelar.setContentAreaFilled(false);
        cancelar.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                cancelarActionPerformed(evt);
            }
        });
        cancelar.setBounds(820, 620, 250, 59);
        jLayeredPane2.add(cancelar, javax.swing.JLayeredPane.DEFAULT_LAYER);

        jLabel1.setIcon(new javax.swing.ImageIcon(getClass().getResource("/GUI/Gris.jpg"))); // NOI18N
        jLabel1.setMaximumSize(new java.awt.Dimension(1080, 720));
        jLabel1.setMinimumSize(new java.awt.Dimension(1080, 720));
        jLabel1.setPreferredSize(new java.awt.Dimension(1080, 720));
        jLabel1.setBounds(0, 0, 1170, 850);
        jLayeredPane2.add(jLabel1, javax.swing.JLayeredPane.DEFAULT_LAYER);

        jLayeredPane2.setBounds(0, 0, 1080, 840);
        jLayeredPane1.add(jLayeredPane2, javax.swing.JLayeredPane.DEFAULT_LAYER);

        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(getContentPane());
        getContentPane().setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addComponent(jLayeredPane1, javax.swing.GroupLayout.Alignment.TRAILING, javax.swing.GroupLayout.PREFERRED_SIZE, 1080, javax.swing.GroupLayout.PREFERRED_SIZE)
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addComponent(jLayeredPane1, javax.swing.GroupLayout.Alignment.TRAILING, javax.swing.GroupLayout.DEFAULT_SIZE, 720, Short.MAX_VALUE)
        );

        pack();
    }// </editor-fold>//GEN-END:initComponents

private void jComboBoxParActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jComboBoxParActionPerformed
apostar.setVisible(true);
jTextField1TopA.setVisible(true);
jTextFieldTipoP.setVisible(true);
jLabel2.setVisible(true);
jLabel5.setVisible(true);
aceptar.setVisible(false);
jLabel3.setVisible(false);
jTextFieldMonto.setVisible(false);



  int parN= jComboBoxPar.getSelectedIndex();  
  
  if(parN!=0){
    //Selecciono del combo el participante
    String parNombre = (String) jComboBoxPar.getSelectedItem();
    
 //guardo la posicion en el arreglo del participante segun la seleccion anterior
int parPosicion = ListaParticipante.buscarParticipanteNombre(parNombre);

//Guardo el id del participante seleccionado
int parIde= ListaParticipante.losParticipantes.get(parPosicion).getPartId();
parId= parIde;

//busco y guardo la informacion de ese participante en la tabla par_eve
int pePosicion = ListaParticipante.buscarPE(eveId, parIde);
peTopeApuesta = ListaParticipante.losParEve.get(pePosicion).getPeTopeApuesta();
int peTipoPago = ListaParticipante.losParEve.get(pePosicion).getPeTipoPago();
int evePosicion = ListaEvento.buscarEvento(eveId);
int eveTipoPago = ListaEvento.losEventos.get(evePosicion).getEveTipoPago();




//Imprimo la informacion en pantalla
String peTopApu = String.valueOf(peTopeApuesta);
String peTipoP = String.valueOf(peTipoPago);
String eveTipoP = String.valueOf(eveTipoPago);
jTextField1TopA.setText(peTopApu);

if (peTipoPago==0){
  jTextFieldTipoP.setText(eveTipoP);  
}
else{
jTextFieldTipoP.setText(peTipoP);
}
  }
    // TODO add your handling code here:
}//GEN-LAST:event_jComboBoxParActionPerformed

private void cancelarActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_cancelarActionPerformed

 int respuesta= JOptionPane.showConfirmDialog(null,"Seguro que quiere abandonar esta apuesta?","Cancelar",JOptionPane.YES_NO_OPTION,JOptionPane.INFORMATION_MESSAGE);
    
if (respuesta==1){
    
}
else{
    Categoria cat = new Categoria();
ParEve pe = new ParEve();
Participante par = new Participante();
Evento eve = new Evento();


//Limpio las listas
ListaEvento.losEventos.clear();
ListaCategoria.lasCategorias.clear();
ListaParticipante.losParticipantes.clear();
ListaParticipante.losParEve.clear();
System.out.println("limpie las listas");
        try {
            cat.finalizar();
            eve.finalizar();
            pe.finalizar();
            par.finalizar();
            manejadorRepositorioApu.finalizar();       
            new Jmaquina().setVisible(true);
            this.dispose();
            
        } catch (Throwable ex) {
            Logger.getLogger(JmaquinaParticipantes.class.getName()).log(Level.SEVERE, null, ex);
        }

    }        
  
    // TODO add your handling code here:
}//GEN-LAST:event_cancelarActionPerformed

private void aceptarActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_aceptarActionPerformed

    //Selecciono el monto ingresado por el usuario
apuMonto= jTextFieldMonto.getText();
if ( apuMonto.equals("")){
        JOptionPane.showMessageDialog(null, "Debe ingresar un monto para poder realizar la apuesta");
        

    }

else{
//Transformo el monto en float
Float apuestaMonto = Float.valueOf(apuMonto);
//Valido que si el participante tiene tope de apuesta el monto ingresado no sea mayor
if ((peTopeApuesta>0) && (apuestaMonto > peTopeApuesta)){
    JOptionPane.showMessageDialog(null, "No puede apostar por un monto mayor que el tope del participante");
}

else{
    //Valido que no apueste sin cantidad
    if (apuestaMonto==0 ){
        JOptionPane.showMessageDialog(null, "Debe ingresar un monto para poder realizar la apuesta");
    }
    
    else{
    int idMaquina= manejadorRepositorioMaq.seleccionarIdMaq();
    //Inserto en la BD la apuesta     
    manejadorRepositorioApu.insertar(eveId,parId,apuestaMonto,idMaquina,0);
    
    int respuesta= JOptionPane.showConfirmDialog(null,"Desea Realizar otra apuesta de este evento?","Se ha registrado su apuesta exitosamente",JOptionPane.YES_NO_OPTION,JOptionPane.INFORMATION_MESSAGE);
    
if (respuesta==1){
    Categoria cat = new Categoria();
ParEve pe = new ParEve();
Participante par = new Participante();
Evento eve = new Evento();


//Limpio las listas
ListaEvento.losEventos.clear();
ListaCategoria.lasCategorias.clear();
ListaParticipante.losParticipantes.clear();
ListaParticipante.losParEve.clear();
System.out.println("limpie las listas");
        try {
            cat.finalizar();
            eve.finalizar();
            pe.finalizar();
            par.finalizar();
            manejadorRepositorioApu.finalizar();
            new Jmaquina().setVisible(true);
            this.dispose();
            
        } catch (Throwable ex) {
            Logger.getLogger(JmaquinaParticipantes.class.getName()).log(Level.SEVERE, null, ex);
        }
        
    
}
else{
        new JmaquinaParticipantes(eveId).setVisible(true);
        this.dispose();
    } 
   }
     
    }
}
    // TODO add your handling code here:
}//GEN-LAST:event_aceptarActionPerformed

private void apostarActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_apostarActionPerformed

    aceptar.setVisible(true);
    jLabel3.setVisible(true);
    jTextFieldMonto.setVisible(true);
    apostar.setVisible(false);
    
  
// TODO add your handling code here:
}//GEN-LAST:event_apostarActionPerformed

private void jTextFieldMontoActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jTextFieldMontoActionPerformed

    // TODO add your handling code here:
}//GEN-LAST:event_jTextFieldMontoActionPerformed

private void jTextFieldMontoKeyReleased(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_jTextFieldMontoKeyReleased
// TODO add your handling code here:
}//GEN-LAST:event_jTextFieldMontoKeyReleased

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
            java.util.logging.Logger.getLogger(JmaquinaParticipantes.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (InstantiationException ex) {
            java.util.logging.Logger.getLogger(JmaquinaParticipantes.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (IllegalAccessException ex) {
            java.util.logging.Logger.getLogger(JmaquinaParticipantes.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (javax.swing.UnsupportedLookAndFeelException ex) {
            java.util.logging.Logger.getLogger(JmaquinaParticipantes.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        }
        //</editor-fold>

        /* Create and display the form */
        java.awt.EventQueue.invokeLater(new Runnable() {

            public void run() {
                new JmaquinaParticipantes().setVisible(true);
            }
        });
    }
    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JButton aceptar;
    private javax.swing.JButton apostar;
    private javax.swing.JButton cancelar;
    private javax.swing.JComboBox jComboBoxPar;
    private javax.swing.JLabel jLabel1;
    private javax.swing.JLabel jLabel2;
    private javax.swing.JLabel jLabel3;
    private javax.swing.JLabel jLabel4;
    private javax.swing.JLabel jLabel5;
    private javax.swing.JLabel jLabel6;
    private javax.swing.JLayeredPane jLayeredPane1;
    private javax.swing.JLayeredPane jLayeredPane2;
    private javax.swing.JTextField jTextField1TopA;
    private javax.swing.JTextField jTextFieldMonto;
    private javax.swing.JTextField jTextFieldTipoP;
    // End of variables declaration//GEN-END:variables
}
