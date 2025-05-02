from threading import Thread, Event
from queue import Queue #queue es una clase que implementa una cola FIFO (First In First Out) para la sincronización entre hilos
import time
import random

class Producer(Thread):
    def __init__(self, queue):
        Thread.__init__(self)
        self.queue = queue

    def run(self):
        for i in range(10):
            item = random.randint(0, 256)
            self.queue.put(item)
            print('Producer notify: item N°%d appended to queue by %s\n' % (item, self.name))
            time.sleep(1)

class Consumer(Thread):
    def __init__(self, queue):
        Thread.__init__(self)
        self.queue = queue

    def run(self):
        while True:
            item = self.queue.get()
            print('Consumer notify: %d popped from queue by %s' % (item, self.name))
            self.queue.task_done()

if __name__ == '__main__':
    queue = Queue()

    # Crear y lanzar el hilo productor
    t1 = Producer(queue)

    # Crear y lanzar los hilos consumidores
    t2 = Consumer(queue)
    t3 = Consumer(queue)
    t4 = Consumer(queue)

    t1.start()
    t2.start()
    t3.start()
    t4.start()

    # Esperar a que todos los hilos terminen
    t1.join()
    t2.join()
    t3.join()
    t4.join()
    