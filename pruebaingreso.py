# pruebaingreso.py

# Lista base
lista_base = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10]

# 1. Crear una lista con los números pares de la lista base
numeros_pares = [numero for numero in lista_base if numero % 2 == 0]

# 2. Crear una lista con el cuadrado de cada número
cuadrados = [numero ** 2 for numero in lista_base]

# 3. Crear un diccionario con números originales (llave) y sus cuadrados (valor)
diccionario_cuadrados = {numero: numero ** 2 for numero in lista_base}

# RESULTADOS
print("RESULTADOS DE LA PRUEBA - PARTE 2\n")
print(f"Lista original: {lista_base}")
print(f"Números pares:  {numeros_pares}")
print(f"Cuadrados:      {cuadrados}")
print(f"\nDiccionario generado:\n{diccionario_cuadrados}")