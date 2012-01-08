/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/*
 * JmaquinaApuesta.java
 *
 * Created on 23/12/2011, 06:58:37 PM
 */

package GUI;





import Dominio.ListaCategoria;
import Dominio.ListaEvento;
import Dominio.ListaParticipante;
import Repositorio.Apuesta;
import Repositorio.Categoria;
import Repositorio.Evento;
import Repositorio.ParEve;
import Repositorio.Participante;
import java.sql.SQLException;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.swing.ImageIcon;
import javax.swing.JOptionPane;


/**
 **@author Eleany G
 * Esta interfaz grafica muestra un comboBox con los distintos eventos activos para apostar 
 *al seleccionar alguno, muestra sus datos y si decide apostar, valida si se puede apostar por tabla de resultados o no
 * y segun la eleccion, crea una instancia de la interfaz grafica JmaquinaParticipante o JmaquinaTabaResultado
 */
public class JmaquinaApuesta extends javax.swing.JFrame {
   
private ListaEvento comboBoxEvento= new ListaEvento();
private Participante llenarList = new Participante();
private Apuesta manejadorRepositorioApu= new Apuesta();
private Integer eveIdGlobal;
private Integer eveNroGan;

    /** Creates new form JmaquinaApuesta */

    public JmaquinaApuesta() {
        initComponents();
        
        comboBoxEvento.eventoCB(jComboEvento);
        
        apostar.setVisible(false);
        jLabel6.setVisible(false);
        jLabel2.setVisible(false);
        jLabel4.setVisible(false);
        jLabel5.setVisible(false);
        jTextFieldCategoria.setVisible(false);
        jTextFieldNombreE.setVisible(false);
        jTextFieldNroPart.setVisible(false);
        jTextFieldNroGan.setVisible(false);
       
    }


    

    /** This method is called from within the constructor to
     * initialize the form.
     * WARNING: Do NOT modify this code. The content of this method is
     * always regenerated by the Form Editor.
     */
    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        jComboEvento = new javax.swing.JComboBox();
        jLabel2 = new javax.swing.JLabel();
        jTextFieldNombreE = new javax.swing.JTextField();
        jTextFieldNroPart = new javax.swing.JTextField();
        jTextFieldNroGan = new javax.swing.JTextField();
        jLabel3 = new javax.swing.JLabel();
        jLabel4 = new javax.swing.JLabel();
        jLabel5 = new javax.swing.JLabel();
        apostar = new javax.swing.JButton();
        jLabel6 = new javax.swing.JLabel();
        jTextFieldCategoria = new javax.swing.JTextField();
        jLabel7 = new javax.swing.JLabel();
        volver = new javax.swing.JButton();
        jLabel1 = new javax.swing.JLabel();

        setDefaultCloseOperation(javax.swing.WindowConstants.EXIT_ON_CLOSE);
        setMinimumSize(new java.awt.Dimension(1090, 720));
        setResizable(false);
        getContentPane().setLayout(null);

        jComboEvento.setFont(new java.awt.Font("Comic Sans MS", 1, 24));
        jComboEvento.setModel(new javax.swing.DefaultComboBoxModel(new String[] { "Seleccione" }));
        jComboEvento.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jComboEventoActionPerformed(evt);
            }
        });
        getContentPane().add(jComboEvento);
        jComboEvento.setBounds(90, 110, 420, 100);

        jLabel2.setFont(new java.awt.Font("Comic Sans MS", 1, 24));
        jLabel2.setForeground(new java.awt.Color(227, 224, 0));
        jLabel2.setText("Tipo de Pago");
        getContentPane().add(jLabel2);
        jLabel2.setBounds(700, 180, 170, 40);

        jTextFieldNombreE.setEditable(false);
        jTextFieldNombreE.setFont(new java.awt.Font("Comic Sans MS", 1, 24));
        jTextFieldNombreE.setBorder(new javax.swing.border.LineBorder(new java.awt.Color(227, 227, 42), 3, true));
        jTextFieldNombreE.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jTextFieldNombreEActionPerformed(evt);
            }
        });
        getContentPane().add(jTextFieldNombreE);
        jTextFieldNombreE.setBounds(890, 180, 180, 40);

        jTextFieldNroPart.setEditable(false);
        jTextFieldNroPart.setFont(new java.awt.Font("Comic Sans MS", 1, 24));
        jTextFieldNroPart.setBorder(javax.swing.BorderFactory.createLineBorder(new java.awt.Color(240, 240, 46), 3));
        jTextFieldNroPart.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jTextFieldNroPartActionPerformed(evt);
            }
        });
        getContentPane().add(jTextFieldNroPart);
        jTextFieldNroPart.setBounds(890, 260, 180, 40);

        jTextFieldNroGan.setEditable(false);
        jTextFieldNroGan.setFont(new java.awt.Font("Comic Sans MS", 1, 24));
        jTextFieldNroGan.setBorder(javax.swing.BorderFactory.createLineBorder(new java.awt.Color(227, 227, 42), 3));
        getContentPane().add(jTextFieldNroGan);
        jTextFieldNroGan.setBounds(890, 340, 180, 40);

        jLabel3.setFont(new java.awt.Font("Comic Sans MS", 1, 48));
        jLabel3.setForeground(new java.awt.Color(227, 224, 0));
        jLabel3.setText(" Eventos");
        getContentPane().add(jLabel3);
        jLabel3.setBounds(170, 30, 230, 60);

        jLabel4.setFont(new java.awt.Font("Comic Sans MS", 1, 24));
        jLabel4.setForeground(new java.awt.Color(227, 224, 0));
        jLabel4.setText("Nro de Participantes");
        getContentPane().add(jLabel4);
        jLabel4.setBounds(610, 250, 260, 50);

        jLabel5.setFont(new java.awt.Font("Comic Sans MS", 1, 24));
        jLabel5.setForeground(new java.awt.Color(227, 224, 0));
        jLabel5.setText("Nro de Ganadores");
        getContentPane().add(jLabel5);
        jLabel5.setBounds(640, 340, 230, 40);

        apostar.setBackground(new java.awt.Color(255, 255, 255));
        apostar.setFont(new java.awt.Font("Comic Sans MS", 1, 48)); // NOI18N
        apostar.setForeground(new java.awt.Color(175, 11, 11));
        apostar.setIcon(new javax.swing.ImageIcon(getClass().getResource("/GUI/tragaperras.gif"))); // NOI18N
        apostar.setText("Apostar");
        apostar.setBorder(new javax.swing.border.SoftBevelBorder(javax.swing.border.BevelBorder.RAISED));
        apostar.setBorderPainted(false);
        apostar.setContentAreaFilled(false);
        apostar.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                apostarActionPerformed(evt);
            }
        });
        getContentPane().add(apostar);
        apostar.setBounds(10, 260, 440, 207);

        jLabel6.setFont(new java.awt.Font("Comic Sans MS", 1, 24));
        jLabel6.setForeground(new java.awt.Color(227, 224, 0));
        jLabel6.setText("Categoria");
        getContentPane().add(jLabel6);
        jLabel6.setBounds(740, 100, 170, 50);

        jTextFieldCategoria.setEditable(false);
        jTextFieldCategoria.setFont(new java.awt.Font("Comic Sans MS", 1, 18));
        jTextFieldCategoria.setBorder(new javax.swing.border.LineBorder(new java.awt.Color(227, 224, 0), 3, true));
        getContentPane().add(jTextFieldCategoria);
        jTextFieldCategoria.setBounds(890, 110, 180, 40);

        jLabel7.setFont(new java.awt.Font("Comic Sans MS", 1, 36));
        jLabel7.setForeground(new java.awt.Color(227, 224, 0));
        jLabel7.setText("Descripcion");
        getContentPane().add(jLabel7);
        jLabel7.setBounds(780, 10, 260, 60);

        volver.setBackground(new java.awt.Color(0, 0, 0));
        volver.setFont(new java.awt.Font("Comic Sans MS", 1, 24)); // NOI18N
        volver.setForeground(new java.awt.Color(153, 0, 0));
        volver.setIcon(new javax.swing.ImageIcon(getClass().getResource("/GUI/right_arrow_128.png"))); // NOI18N
        volver.setBorderPainted(false);
        volver.setContentAreaFilled(false);
        volver.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                volverActionPerformed(evt);
            }
        });
        getContentPane().add(volver);
        volver.setBounds(860, 530, 200, 150);

        jLabel1.setIcon(new javax.swing.ImageIcon(getClass().getResource("/GUI/home.jpg"))); // NOI18N
        jLabel1.setMaximumSize(new java.awt.Dimension(1090, 720));
        jLabel1.setMinimumSize(new java.awt.Dimension(1090, 720));
        jLabel1.setOpaque(true);
        jLabel1.setPreferredSize(new java.awt.Dimension(1090, 720));
        getContentPane().add(jLabel1);
        jLabel1.setBounds(-30, -10, 1150, 720);

        pack();
    }// </editor-fold>//GEN-END:initComponents

    private void jComboEventoActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jComboEventoActionPerformed
apostar.setVisible(true);
    jLabel6.setVisible(true);
    jLabel2.setVisible(true);
    jLabel4.setVisible(true);
    jLabel5.setVisible(true);
    jTextFieldCategoria.setVisible(true);
    jTextFieldNombreE.setVisible(true);
    jTextFieldNroPart.setVisible(true);
    jTextFieldNroGan.setVisible(true);
    
 //Limpio la lista de participantes del evento
ListaParticipante.losParticipantes.clear();

 int eve = jComboEvento.getSelectedIndex();
//Guardo la opcion seleccionana en el combobox en la variable evento
    String evento = (String) jComboEvento.getSelectedItem();
    
 if (eve!=0)  { 
 // Guardo en variables la informacion del evento que voy a mostrar en pantalla  
int evePosicion = ListaEvento.buscarEventoNombre(evento);
int eveTipoPago= ListaEvento.losEventos.get(evePosicion).getEveTipoPago();
 eveNroGan = ListaEvento.losEventos.get(evePosicion).getEveNroGan();
int eveNroPart= ListaEvento.losEventos.get(evePosicion).getEveNroPart();
int eveId= ListaEvento.losEventos.get(evePosicion).getEveId();
int catId = ListaEvento.losEventos.get(evePosicion).getEveFkCatId();


//busco la posicion en el arreglo de la categoria del evento seleccionado 
//y gusrado el nombre en una variable para imprimirla
int catPosicion = ListaCategoria.buscarCategoriaporId(catId);
String catNombre = ListaCategoria.lasCategorias.get(catPosicion).getCatNombre();

//Imprimo en pantalla
String eveNroG= String.valueOf(eveNroGan);
String eveNroP= String.valueOf(eveNroPart);
String eveTipoP= String.valueOf(eveTipoPago);
jTextFieldNombreE.setText(eveTipoP);
jTextFieldNroPart.setText(eveNroP);
jTextFieldNroGan.setText(eveNroG);
jTextFieldCategoria.setText(catNombre);

        try {
            llenarList.consultar(eveId);

                // TODO add your handling code here:
        } catch (SQLException ex) {
            Logger.getLogger(JmaquinaApuesta.class.getName()).log(Level.SEVERE, null, ex);
        }
        
        eveIdGlobal= eveId;
        // TODO add your handling code here:
 }
    }//GEN-LAST:event_jComboEventoActionPerformed

private void jTextFieldNombreEActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jTextFieldNombreEActionPerformed
// TODO add your handling code here:
}//GEN-LAST:event_jTextFieldNombreEActionPerformed

private void jTextFieldNroPartActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jTextFieldNroPartActionPerformed
// TODO add your handling code here:
}//GEN-LAST:event_jTextFieldNroPartActionPerformed

private void apostarActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_apostarActionPerformed

    
 //if que valida si deseas apostar con tabla de resultado o no   
  if (eveNroGan>1){
 //pantalla que valida como desea apostar

int respuesta= JOptionPane.showConfirmDialog(null, "Desea Apostar con tabla de Resultado?","Tabla de Resultado", JOptionPane.YES_NO_CANCEL_OPTION, JOptionPane.INFORMATION_MESSAGE, new ImageIcon("C:/Users/Eleany G/Documents/NetBeansProjects/ApuestasconPD/src/GUI/ruleta-01.gif"));   
//Si selecciona NO, es decir que apostara por un participante en especifico, crea una instancia de la interfaz JmaquinaParticipante
if (respuesta==1){
    new JmaquinaParticipantes(eveIdGlobal).setVisible(true);
                   this.dispose();
}
else{
    //Si selecciona cancelar,regresa a la misma ventana
    if(respuesta==2){
    apostar.setVisible(true);
    }
    //Si selecciona SI, es decir apostara por tabla de resultado, crea una instancia de la interfaz JmaquinaTablaResultado
    else {
        
        new JmaquinaTablaResultados(eveNroGan,eveIdGlobal).setVisible(true);
        this.dispose();
    } 
   }
  }
  //si el evento solo tiene un ganador, crea una instancia de la interfaz JmauinaParticipante para apostar
  else {
      
       new JmaquinaParticipantes(eveIdGlobal).setVisible(true);
                   this.dispose();
  }
    
   
    // TODO add your handling code here:
}//GEN-LAST:event_apostarActionPerformed

//Boton de regresar, regresa a la pantalla principal, cierra las conexiones y limpia las listas
private void volverActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_volverActionPerformed
Categoria cat = new Categoria();
ParEve pe = new ParEve();
Participante par = new Participante();
Evento eve = new Evento();
    
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
    
    // TODO add your handling code here:
}//GEN-LAST:event_volverActionPerformed

    /**
    * @param args the command line arguments
    */
    public static void main(String args[]) {
        java.awt.EventQueue.invokeLater(new Runnable() {
            public void run() {
                new JmaquinaApuesta().setVisible(true);
            }
        });
    }

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JButton apostar;
    private javax.swing.JComboBox jComboEvento;
    private javax.swing.JLabel jLabel1;
    private javax.swing.JLabel jLabel2;
    private javax.swing.JLabel jLabel3;
    private javax.swing.JLabel jLabel4;
    private javax.swing.JLabel jLabel5;
    private javax.swing.JLabel jLabel6;
    private javax.swing.JLabel jLabel7;
    private javax.swing.JTextField jTextFieldCategoria;
    private javax.swing.JTextField jTextFieldNombreE;
    private javax.swing.JTextField jTextFieldNroGan;
    private javax.swing.JTextField jTextFieldNroPart;
    private javax.swing.JButton volver;
    // End of variables declaration//GEN-END:variables

}
