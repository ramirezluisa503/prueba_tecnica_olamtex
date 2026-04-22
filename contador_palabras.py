# contadorpalabras.

def contar_palabras(nombre_archivo):
    try:
        # Abrimos el archivo en modo lectura ('r')
        with open(nombre_archivo, 'r', encoding='utf-8') as archivo:
            contenido = archivo.read()
            # Dividimos el contenido en palabras (por defecto separa por espacios)
            palabras = contenido.split()
            cantidad = len(palabras)
            
            print(f"¡Éxito! El archivo '{nombre_archivo}' contiene {cantidad} palabras.")
            
    except FileNotFoundError:
        print(f"❌ Error: El archivo '{nombre_archivo}' no existe en esta carpeta.")

# Ejecutamos la función con el nombre de nuestro archivo
contar_palabras('datos.txt')