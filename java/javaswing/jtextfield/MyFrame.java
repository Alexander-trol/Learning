package Learning.java.javaswing.jtextfield;

import javax.swing.*;
import java.awt.event.*;

public class MyFrame extends JFrame implements ActionListener{

    private JTextField t1, t2, t3;
    private JButton b1, b2;

    public MyFrame(){

        super("Textfield example");

        t1 = new JTextField();
        t1.setBounds(50, 50, 150, 20);
        t2 = new JTextField();
        t2.setBounds(50, 100, 150, 20);
        t3 = new JTextField();
        t3.setBounds(50, 150, 150, 20);

        b1 = new JButton("+");
        b1.setBounds(50, 200, 50, 50);
        b2 = new JButton("-");
        b2.setBounds(120, 200, 50, 50);

        b1.addActionListener(this);
        b2.addActionListener(this);

        add(t1); add(t2); add(t3);
        add(b1); add(b2);

        setResizable(false);
        setLocationRelativeTo(null);
        setSize(400, 400);
        setLayout(null);
        setVisible(true);
        setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
    }

    public void actionPerformed(ActionEvent e){
        String s1 =t1.getText();
        String s2 =t2.getText();
        int a = Integer.parseInt(s1);
        int b = Integer.parseInt(s2);
        int c = 0;

        if (e.getSource() == b1) c = a + b;
        else if (e.getSource() == b2) c = a - b;
        
        String result = String.valueOf(c);
        t3.setText(result);
    }
}