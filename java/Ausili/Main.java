//package Learning.java.Ausili;     //Devo mettere il package altrimenti non mi va la compilazione. Se però eseguo il
                                    //programma mi da errore e devo togliere il package andando in un loop infinito
import java.io.*;
import java.util.*;

public class Main {
    public static void main(String[] args) throws Exception{
        
        String comparata = new String();
        String comparatore = new String();
        Scanner scan = new Scanner(System.in);

        try {
            System.out.println("Scrivi una parola qualsiasi: ");
            comparatore = scan.nextLine();
            scan.close();   //Chiudere la scannerizzazione della parola digitata

            FileReader fr = new FileReader("dizionario.txt");   //Fiel che viene letto
            BufferedReader bf = new BufferedReader(fr);
            FileWriter fw = new FileWriter("ordinamento.txt");  //Creazione del file ordinamento dove andranno
                                                                //le parole ordinate

            comparata = bf.readLine();  //lettura della prima riga
            while (comparata != null) {
                if (comparata.compareTo(comparatore) > 0) {    //Se mla parola comparata è maggiore (alfabeticamente) della parola comparata allora viene trascritta, se minor o uguale no
                    fw.write(comparata);    //Essendo che è maggiore viene trascritta sul nuovo file
                }
                comparata = bf.readLine();  //lettura del resto delle righe
            }
            bf.close();
            fw.close();

        } catch (Exception e) {
            System.out.println("Errore nell'ordinamento del file...");
            System.out.println(e.getMessage());
        }
    }
}