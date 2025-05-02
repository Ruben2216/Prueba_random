import threading # Importar el módulo threading para manejar hilos
import time

# Definir una clase llamada Box que representa una caja con un mecanismo de bloqueo para sincronización.
class Box(object):
    # Crear un bloqueo reentrante (RLock) que permite que el mismo hilo adquiera el bloqueo varias veces.
    lock = threading.RLock()

    def __init__(self):
        # Inicializar el número total de artículos en la caja.
        self.total_items = 0

    # Definir un método para ejecutar una operación que modifica el número de artículos en la caja.
    def execute(self, n):
        # Adquirir el bloqueo antes de modificar el estado compartido.
        Box.lock.acquire()
        self.total_items += n  # Modificar el número total de artículos.
        # Liberar el bloqueo después de realizar la operación.
        Box.lock.release()

    # Definir un método para agregar un artículo a la caja.
    def add(self):
        # Adquirir el bloqueo antes de llamar a execute.
        Box.lock.acquire()
        self.execute(1)  # Incrementar el número de artículos en 1.
        # Liberar el bloqueo después de la operación.
        Box.lock.release()

    # Definir un método para remover un artículo de la caja.
    def remove(self):
        # Adquirir el bloqueo antes de llamar a execute.
        Box.lock.acquire()
        self.execute(-1)  # Decrementar el número de artículos en 1.
        # Liberar el bloqueo después de la operación.
        Box.lock.release()

# Definir una función que agrega artículos a la caja en un hilo separado.
def adder(box, items):
    while items > 0:
        print("Agregando 1 artículo a la caja\n")
        box.add()  # Llamar al método add de la clase Box.
        time.sleep(5)  # Pausar por 5 segundos para simular trabajo.
        items -= 1  # Reducir el contador de artículos por agregar.

# Definir una función que remueve artículos de la caja en un hilo separado.
def remover(box, items):
    while items > 0:
        print("Removiendo 1 artículo de la caja")
        box.remove()  # Llamar al método remove de la clase Box.
        time.sleep(5)  # Pausar por 5 segundos para simular trabajo.
        items -= 1  # Reducir el contador de artículos por remover.

# Definir el bloque principal del programa.
if __name__ == "__main__":
    items = 5  # Establecer el número inicial de artículos a agregar y remover.
    print("Colocando %s artículos en la caja " % items)
    box = Box()  

    t1 = threading.Thread(target=adder, args=(box, items))
    t2 = threading.Thread(target=remover, args=(box, items))

    # Iniciar ambos hilos.
    t1.start()
    t2.start()

    # Esperar a que ambos hilos terminen su ejecución.
    t1.join()
    t2.join()

    # Imprimir el número total de artículos restantes en la caja.
    print("%s artículos aún permanecen en la caja " % box.total_items)