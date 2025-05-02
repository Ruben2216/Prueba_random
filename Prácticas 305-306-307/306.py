import threading
import logging

# Configuración básica del logging
# Se configura el nivel de depuración y el formato de los mensajes de log.
logging.basicConfig(
    level=logging.DEBUG,
    format='(%(threadName)-10s) %(message)s',
)

# Función que utiliza el contexto "with" para manejar el bloqueo
# Esta función adquiere el bloqueo utilizando el contexto "with", lo que garantiza
# que el bloqueo se libere automáticamente al salir del bloque.
def threading_with(statement):
    with statement:
        logging.debug('%s acquired via with' % statement)

# Función que maneja el bloqueo sin usar "with"
# En esta función, el bloqueo se adquiere manualmente con acquire() y se libera
# con release() en un bloque try-finally para garantizar que siempre se libere.
def threading_not_with(statement):
    statement.acquire()
    try:
        logging.debug('%s acquired directly' % statement)
    finally:
        statement.release()

# Punto de entrada principal
if __name__ == '__main__':
    # Crear una batería de pruebas
    # Se crean diferentes tipos de mecanismos de sincronización:
    # - Lock: un bloqueo simple.
    # - RLock: un bloqueo reentrante.
    # - Condition: un bloqueo con condiciones.
    # - Semaphore: un semáforo con un contador inicial de 1.
    lock = threading.Lock()
    rlock = threading.RLock()
    condition = threading.Condition()
    mutex = threading.Semaphore(1)

    # Lista que contiene los mecanismos de sincronización.
    threading_synchronization_list = [lock, rlock, condition, mutex]

    # En el ciclo for llamamos a las funciones threading_with y threading_not_with
    # Para cada mecanismo de sincronización en la lista, se crean dos hilos:
    # - Uno que utiliza la función threading_with.
    # - Otro que utiliza la función threading_not_with.
    # Ambos hilos se inician y luego se espera a que terminen con join().
    for statement in threading_synchronization_list:
        t1 = threading.Thread(target=threading_with, args=(statement,))
        t2 = threading.Thread(target=threading_not_with, args=(statement,))
        
        t1.start()  # Inicia el primer hilo.
        t2.start()  # Inicia el segundo hilo.
        
        t1.join()  # Espera a que el primer hilo termine.
        t2.join()  # Espera a que el segundo hilo termine.