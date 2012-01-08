/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package Repositorio;

/**
 *
 * @author Eleany G
 */
import java.awt.*;
import java.awt.print.*;
import java.awt.geom.*;

// Define a class that is called per page that needs printing. It implements
// the one and only method in the Printable interface : print. Note that
// this is quite separate from the PrinterJob class print() method.
//
// This method does not actually do any printing. All it does is write text
// and/or graphics onto the passed page (graphics context). The calling
// printer job object will then pass this page to the printer. 

//La clase debe de implementar la impresión implements Printable

class PrintObject implements Printable
{
   public int print (Graphics g, PageFormat f, int pageIndex)
   {
       //Creamos un objeto 2D para dibujar en el
      Graphics2D g2 = (Graphics2D) g;  // Allow use of Java 2 graphics on
                                       // the print pages :
      
      //Este código imprime 2 páginas una con un cuadrado o marco
      //y una segunda con un circulo en la esquina superior izquierda

      // A rectangle that shows the printable area of the page, allowing
      // for margins all round. To be drawn on the first page (index = 0).
      
      //Creamos el rectángulo
      //getImagebleX() coge la parte de la hoja donde podemos 
      //imprimir quitando los bordes. Si no hiciesemos 
      //esto así y tuviesemos bordes definidos en la impresión 
      //lo que dibujasemos fuera de los bordes no lo 
      //imprimiría aunque cupiese en la hoja físicamente.
      Rectangle2D rect = new Rectangle2D.Double(f.getImageableX(),
                                                f.getImageableY(),
                                                f.getImageableWidth(),
                                                f.getImageableHeight());

      // A simple circle to go on the second page (index = 1).
       //Creamos la circunferencia
      Ellipse2D circle = new Ellipse2D.Double(100,100,100,100);
      
      //pageIndex indica el número de la página que se imprime
      //cuando es 0 primera página a imprimir, es un rectángulo
      //cuando es 1 segunda página a imprimir, es una circunferencia
      //En otro caso se devulve que no hay más páginas a imprimir

      switch (pageIndex)
      {
         case 0 : //Página 1: Dibujamos sobre g y luego lo pasamos a g2
                  g.setColor(Color.black);
                  g.fillRect(110,120,30,5);
                  g.setColor(Color.pink);
                  g.drawLine(0,0,200,200);
                  g2.draw(rect);
                  return PAGE_EXISTS;
         case 1 : //Página 2: Circunferencia y rectángulo
                  g2.setColor(Color.red);
                  g2.draw(circle);
                  g2.draw(rect);
                  return PAGE_EXISTS;
         default: return NO_SUCH_PAGE;        // No other pages
      }
   }
}