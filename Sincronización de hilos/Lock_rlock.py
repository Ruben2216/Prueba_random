import threading

# Variables compartidas y configuración inicial
shared_resource_with_lock = 0  # Recurso compartido protegido por un Lock
shared_resource_with_no_lock = 0  # Recurso compartido sin protección
COUNT = 1000000  # Número de iteraciones para incrementar/decrementar
shared_resource_lock = threading.Lock()  # Objeto Lock para sincronización

#### GESTIÓN CON LOCK ##
# Función para incrementar el recurso compartido protegido por un Lock
def increment_with_lock():
    global shared_resource_with_lock
    for i in range(COUNT):
        shared_resource_lock.acquire()  # Adquiere el Lock
        shared_resource_with_lock += 1  # Incrementa el recurso
        shared_resource_lock.release()  # Libera el Lock

# Función para decrementar el recurso compartido protegido por un Lock
def decrement_with_lock():
    global shared_resource_with_lock
    for i in range(COUNT):
        shared_resource_lock.acquire()  # Adquiere el Lock
        shared_resource_with_lock -= 1  # Decrementa el recurso
        shared_resource_lock.release()  # Libera el Lock

#### GESTIÓN SIN LOCK ##
# Función para incrementar el recurso compartido sin protección
def increment_without_lock():
    global shared_resource_with_no_lock
    for i in range(COUNT):
        shared_resource_with_no_lock += 1  # Incrementa el recurso

# Función para decrementar el recurso compartido sin protección
def decrement_without_lock():
    global shared_resource_with_no_lock
    for i in range(COUNT):
        shared_resource_with_no_lock -= 1  # Decrementa el recurso

#### PROGRAMA PRINCIPAL
if __name__ == "__main__":
    # Creación de hilos para cada función
    t1 = threading.Thread(target=increment_with_lock)  # Hilo para incrementar con Lock
    t2 = threading.Thread(target=decrement_with_lock)  # Hilo para decrementar con Lock
    t3 = threading.Thread(target=increment_without_lock)  # Hilo para incrementar sin Lock
    t4 = threading.Thread(target=decrement_without_lock)  # Hilo para decrementar sin Lock

    # Inicio de los hilos
    t1.start()
    t2.start()
    t3.start()
    t4.start()

    # Espera a que los hilos terminen
    t1.join()
    t2.join()
    t3.join()
    t4.join()

    # Impresión de los resultados finales
    print("The value of shared variable with lock management is %s" % shared_resource_with_lock)
    print("The value of shared variable with race condition is %s" % shared_resource_with_no_lock)