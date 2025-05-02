#jose Ruben Clemente Corzo 4M LIDTS
#26-03-2025
#Programación distribuida y en paralelo


# arreglo de datos
conjunto_definido = {
    "a": {"x", "y"},
    "b": {"z"},
    "c": {"a", "b"},
    "w": {"c"}
}

print(conjunto_definido)


# guardar valor en otra variable


while True:
    conjunto1 = input("Ingrese el primer conjunto: ")
    val1=conjunto1
    conjunto2 = input("Ingrese el segundo conjunto: ")
    val2= conjunto2
    if conjunto1 == "" or conjunto2 == "" or (conjunto1 and conjunto2 not in conjunto_definido):  # Verifica si está vacío-
        print("El conjunto no puede estar vacío y necesita estar definido dentro de los conjuntos,\nInténtalo de nuevo.")
    else:
        break


# Obtener los conjuntos a partir de lo ingresado del usuario
contenido1 = conjunto_definido.get(conjunto1, set())
contenido2 = conjunto_definido.get(conjunto2, set())


# LECTURA Y ESCRITURA, regla 1
if val2 in contenido1:
    print("l1 y l2 no disjuntos")
else:
    print("l1 y l2 si son disjuntos")

#ESCRITURA Y LECTURA, regla 2
if val1 in contenido2:
    print("l1 y l2 no son disjuntos")
else:
    print("l1 y l2 si son disjuntos")

# ESCRITURA Y ESCRITURA, regla 3
if contenido1.intersection(contenido2):
    print("l1 y l2 no son disjuntos\n")
else:
    print("l1 y l2 si son disjuntos\n")

if val2 in contenido1 or val1 in contenido2 or contenido1.intersection(contenido2):
    print("l1 y l2 NO APLICA la regla de bernstein")
else:
    print("l1 y l2 son disjuntosl si aplica la regla de bernstein, SI ES PARALELIZABLE")

