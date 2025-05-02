public class Hilo extends Thread {
    public Hilo(String nombre) {
        super(nombre);  // Constructor con nombre
    }

    public void run() {  // Método run (similar a Python)
        for(int i = 0; i < 5; i++) {
            System.out.println("Iteracion " + (i+1) + " de " + getName());
        }
        System.out.println("Termina el " + getName());
    }

    public static void main(String[] args) {
        new Hilo("Primer hilo").start();  // Iniciar hilo 1
        new Hilo("Segundo Hilo").start(); // Iniciar hilo 2
        System.out.println("Termina el hilo principal");
    }
}