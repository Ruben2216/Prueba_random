import time 
from threading import Thread, Event # Importa las librerías necesarias para la programación de hilos y eventos
import random 

# Lista compartida entre hilos
items = []

# Evento para sincronización entre productor y consumidor
event = Event()

class Consumer(Thread):
    def __init__(self, items, event):
        Thread.__init__(self)
        self.items = items
        self.event = event

    # Método principal que ejecuta el hilo del consumidor
    def run(self):
        while True:
            time.sleep(2)  # Simula un retraso en el consumo, sleep qui es un método que suspende la ejecución del hilo durante x tiempo
            self.event.wait()  # Espera a que el evento sea activado, wait es un método que bloquea el hilo hasta que el evento se active
            item = self.items.pop()  # Extrae un elemento de la lista, pop es un método que elimina y devuelve el último elemento de la lista
            print('Consumidor notifica: %d extraído de la lista por %s' % (item, self.name)) 

class Producer(Thread):
    def __init__(self, items, event): # __init__ método especial que se llama al crear una instancia de la clase
        Thread.__init__(self)
        self.items = items
        self.event = event

    # Método principal que ejecuta el hilo del productor
    def run(self):
        global item 
        for i in range(5): #hasta 5 elementos
            time.sleep(2)  # Simula un retraso en la producción
            item = random.randint(0, 256)  # Genera un número aleatorio
            self.items.append(item)  # Agrega el número a la lista con append al final
            print('Productor notifica: elemento N° %d agregado a la lista por %s' % (item, self.name))
            print('Productor notifica: evento activado por %s' % self.name) #el %  es un marcador de posición para  obtener cadenas 
            self.event.set()  # Activa el evento para notificar al consumidor con set
            print('Productor notifica: evento limpiado por %s \n' % self.name) #se repite la impresion?.... 
            self.event.clear()  # Limpia el evento para el siguiente ciclo

if __name__ == '__main__':
    # Creación de instancias de productor y consumidor
    t1 = Producer(items, event)
    t2 = Consumer(items, event)

    # Inicio de los hilos
    t1.start()
    t2.start() #start inicia la ejecucion

    # Espera a que los hilos terminen
    t1.join()
    t2.join()