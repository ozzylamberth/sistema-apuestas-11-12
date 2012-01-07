/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package Repositorio;

import java.awt.print.PrinterException;
import java.awt.print.PrinterJob;

/**
 *
 * @author Eleany G
 */
public class Sample1
{
   public static void main (String[] args)
   {
      // Create an object that will hold all print parameters, such as
      // page size, printer resolution. In addition, it manages the print
      // process (job).
      PrinterJob job = PrinterJob.getPrinterJob();

      // It is first called to tell it what object will print each page.
      job.setPrintable(new PrintObject());

      // Then it is called to display the standard print options dialog.
      if (job.printDialog())
      {
         // If the user has pressed OK (printDialog returns true), then go
         // ahead with the printing. This is started by the simple call to
         // the job print() method. When it runs, it calls the page print
         // object for page index 0. Then page index 1, 2, and so on
         // until NO_SUCH_PAGE is returned.
      try { job.print(); }
         catch (PrinterException e) { System.out.println(e); }
      }
   }
}