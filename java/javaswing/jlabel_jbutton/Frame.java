package jlabel_jbutton;

import javax.swing.*;
import java.awt.event.*;

public class Frame extends JFrame implements ActionListener{

    private JButton button;
    private JTextField textField;
    private JLabel l;
    public Frame(){

        super("Finestrella");

        button = new JButton("Trova IP");
        textField = new JTextField();
        l = new JLabel();
        
        button.setBounds(50, 150, 95, 30);
        textField.setBounds(50, 50, 200, 20);
        l.setBounds(50, 100, 250, 20);

        button.addActionListener(this);

        add(button);
        add(textField);
        add(l);

        setSize(500, 500);
        setLocationRelativeTo(null);
        setResizable(true);
        setLayout(null);
        setVisible(true);
        setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
    }

    public void actionPerformed(ActionEvent e){
        try {
            String host = textField.getText();
            String ip = java.net.InetAddress.getByName(host).getHostAddress();
            l.setText("l'IP di'"+host+" e': "+ip);
        } catch (Exception ex) {System.out.println(ex);}
    }
}