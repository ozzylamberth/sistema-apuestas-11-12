/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package Repositorio;
    import java.io.FileInputStream;
import java.io.FileOutputStream;
import java.io.IOException;

import javax.print.Doc;
import javax.print.DocFlavor;
import javax.print.DocPrintJob;
import javax.print.PrintException;
import javax.print.PrintService;
import javax.print.PrintServiceLookup;
import javax.print.SimpleDoc;
import javax.print.attribute.HashPrintRequestAttributeSet;
import javax.print.attribute.PrintRequestAttributeSet;
import javax.print.attribute.standard.Copies;
/**
 *
 * @author Irene
 */
public class PrintPDF2 {

static public void main(String args[]) throws Exception {
try {
PrintRequestAttributeSet pras = new HashPrintRequestAttributeSet();
pras.add(new Copies(1));
//PrintService pss[] = PrintServiceLookup.lookupPrintServices(DocFlavor.INPUT_STREAM.POSTSCRIPT, pras);
//System.out.println("printing value:"+pss.length);
PrintService pss = PrintServiceLookup.lookupDefaultPrintService();
//if (pss.length == 0)
//throw new RuntimeException("No printer services available.");
PrintService ps = pss;
System.out.println("Printing to " + ps);
DocPrintJob job = ps.createPrintJob();
FileInputStream fin = new FileInputStream("c:/a.pdf");
Doc doc = new SimpleDoc(fin, DocFlavor.INPUT_STREAM.AUTOSENSE, null);
System.out.println(" printing...the pdf file .......");
/*FileOutputStream fout=new FileOutputStream("c:/Excephighlighting1.pdf");
int c;
while ((c = fin.read()) != -1) {
fout.write(c);
}*/
System.out.println(" writing file..........");
job.print(doc, pras);
System.out.println(" closing file..........");
fin.close();
//fout.close();
} catch (IOException ie) {
ie.printStackTrace();
} catch (Exception pe) {
pe.printStackTrace();
}
}
}


