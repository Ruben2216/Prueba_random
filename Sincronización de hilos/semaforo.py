# Usando un semáforo para sincronizar hilos 
import threading
import time
import random

# Crear un semáforo con un contador inicial de 0.
# Esto significa que los consumidores tendrán que esperar hasta que el productor libere el semáforo.
semaphore = threading.Semaphore(0)

# Función que representa al consumidor
def consumer():
    print("El consumidor está esperando.")
    # Adquirir el semáforo. Esto bloquea al consumidor hasta que el productor lo libere.
    semaphore.acquire()
    # Una vez adquirido, el consumidor tiene acceso al recurso compartido (el ítem producido).
    print("Consumidor notifica: consumió el ítem número %s" % item)

# Función que representa al productor
def producer():
    global item  # Declarar la variable 'item' como global para que sea accesible por el consumidor.
    time.sleep(10)  # Simular un retraso en la producción del ítem.
    # Crear un ítem aleatorio (número entre 0 y 1000).
    item = random.randint(0, 1000)
    print("Productor notifica: produjo el ítem número %s" % item)
    # Liberar el semáforo, incrementando su contador interno.
    # Esto permite que el consumidor que estaba esperando pueda continuar.
    semaphore.release()

# Programa principal
if __name__ == '__main__':
    # Crear y ejecutar 5 pares de hilos (productor y consumidor).
    for i in range(0, 5):
        # Crear un hilo para el productor.
        t1 = threading.Thread(target=producer)
        # Crear un hilo para el consumidor.
        t2 = threading.Thread(target=consumer)
        # Iniciar el hilo del productor.
        t1.start()
        # Iniciar el hilo del consumidor.
        t2.start()
        # Esperar a que el hilo del productor termine.
        t1.join()
        # Esperar a que el hilo del consumidor termine.
        t2.join()
    # Imprimir un mensaje indicando que el programa ha terminado.
    print("Programa terminado")