package Learning.java.javaswing.jtextarea;

import javax.swing.*;
import java.awt.event.*;

public class TextAreaExample extends JFrame implements ActionListener{
    private JLabel l1, l2;
    private JButton b1;
    private JTextArea area;

    public TextAreaExample(){
        super("Finestrella bella");

        b1 = new JButton("Conta le parole");
        b1.setBounds(100, 200, 120, 30);

        l1 = new JLabel();
        l1.setBounds(50, 25, 100, 30);
        l2 = new JLabel();
        l2.setBounds(160, 25, 100, 30);

        area = new JTextArea("ciao angelica");
        area.setBounds(50, 75, 250, 200);
        
        b1.addActionListener(this);

        add(b1);
        add(l1); add(l2);
        add(area);

        setSize(400, 400);
        setLayout(null);
        setVisible(true);
        setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
    }
    public void actionPerformed(ActionEvent e){
        String text = area.getText();
        String words[] = text.split("\\s");
        l1.setText("Words: " +words.length);
        l2.setText("Characters: " +text.length());
    }
}