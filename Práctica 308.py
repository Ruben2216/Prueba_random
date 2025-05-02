from threading import Thread, Condition
import time

items = []          # Recurso compartido (búfer)
condition = Condition()  # Objeto de condición para sincronización

class consumer(Thread):
    def __init__(self):
        Thread.__init__(self)  # Posible error de sintaxis: debería ser Thread.__init__(self)

    def consume(self):
        global condition
        global items
        condition.acquire()  # Adquiere el bloqueo
        if len(items) == 0:
            condition.wait()  # Espera si el búfer está vacío
            print("Consumer notify : no item to consume")
        items.pop()  # Consume un elemento
        print("Consumer notify : consumed 1 item")
        print("Consumer notify : items to consume are " + str(len(items)))
        condition.notify() # Notifica al productor (posible error: paréntesis extra)
        condition.release()  # Libera el bloqueo

    def run(self):
        for i in range(0,20):
            time.sleep(10)  # Consume cada 10 segundos
            self.consume()

class producer(Thread):
    def __init__(self):
        Thread.__init__(self)  # Posible error de sintaxis: debería ser Thread.__init__(self)

    def produce(self):
        global condition
        global items
        condition.acquire()  # Adquiere el bloqueo
        if len(items) == 10:
            condition.wait()  # Espera si el búfer está lleno
            print("Producer notify : items producted are " + str(len(items)))
            print("Producer notify : stop the production!!")
        items.append(1)  # Produce un elemento
        print("Producer notify : total items producted " + str(len(items)))
        condition.notify()  # Notifica al consumidor
        condition.release()  # Libera el bloqueo

    def run(self):
        for i in range(0,20):
            time.sleep(5)  # Produce cada 5 segundos
            self.produce()

if __name__ == "__main__":
    producer = producer()
    consumer = consumer()
    producer.start()  # Inicia el hilo productor
    consumer.start()  # Inicia el hilo consumidor
    producer.join()   # Espera a que termine el productor
    consumer.join()   # Espera a que termine el consumidor