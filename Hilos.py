from threading import Thread  # Importar clase Thread para manejar hilos
from time import sleep       # Importar sleep para pausas

class CookBook(Thread):      # Subclase de Thread
    def __init__(self):
        Thread.__init__(self)  # Inicializar hilo
        self.message = "Hello Parallel Python CookBook!!\n"  # Mensaje del hilo

    def print_message(self):
        print(self.message)   # Método auxiliar para imprimir

    def run(self):           # Método run (se ejecuta al iniciar el hilo)
        print("Thread Starting\n")
        x = 0
        while x < 10:      # Bucle que se ejecuta 10 veces
            self.print_message()
            sleep(2)         # Pausa de 2 segundos
            x += 1 
        print("Thread Ended\n")

# Código principal del programa
print("Process Started")      # Inicio del proceso principal
hello_Python = CookBook()    # Crear instancia del hilo
hello_Python.start()         # Iniciar hilo
print("Process Ended")       # Fin del proceso principal