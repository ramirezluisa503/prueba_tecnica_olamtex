## INFORMACIÓN DE CONTACTO
## Nombre completo: 
Luisa Ferndand Ramírez Osorio
## Número de contacto:
3203215195
## Tiempo real para resolver la prueba 

# Prueba Técnica - Analista TICs (Olamtex)

Este repositorio contiene la solución integral a la prueba técnica para el cargo de Analista TICs. El proyecto demuestra competencias en desarrollo Fullstack (Laravel + Vue.js), programación en Python y soporte técnico proactivo.

## Tecnologías Utilizadas

- **Backend**: Laravel 12+ con PHP 8.x.
- **Frontend**: Vue 3 (Composition API) con Vite.
- **Estilos**: Tailwind CSS para un diseño responsivo y moderno.
- **Base de Datos**: MySQL.
- **Autenticación**: Laravel Sanctum para seguridad mediante Tokens.
- **Python**: Versión 3.x para procesamiento de estructuras de datos y archivos.

---

## Instalación y Configuración

Siga estos pasos para desplegar el entorno de desarrollo local:

### 1. Clonar el Repositorio

```bash
git clone [https://github.com/ramirezluisa503/prueba_tecnica_olamtex.git](https://github.com/ramirezluisa503/prueba_tecnica_olamtex.git)
cd prueba_tecnica_olamtex
```

### 2. Configuración del Backend (Laravel)

1. Instale las dependencias de PHP:

    ```bash
    composer install

    ```

2. Configure la base de datos: Copie el archivo .env.example y renómbrelo a .env. Ajuste las credenciales:
   DB_DATABASE=notas_rapidas
   DB_USERNAME=root
   DB_PASSWORD= (o su contraseña local de MySql)

3. Genere la llave de seguridad de la aplicación:
   php artisan key:generate

4. Ejecute las migraciones para crear las tablas:
   php artisan migrate

### 3. CConfiguración del Frontend (Vue 3)

1. Instale las dependencias de Node.js:
   npm install
2. Compile los activos del frontend:
   npm run dev

## Comandos para Ejecutar

Para correr la aplicación en entorno de desarrollo, mantenga dos terminales abiertas y ejecute:

- Servidor Backend (Terminal 1): php artisan serve (La API estará disponible en https://www.google.com/search?q=http://127.0.0.1:8000)

- Servidor Frontend (Terminal 2): npm run dev

## Módulos en Python

Los scripts correspondientes a la prueba de Python se encuentran en la raíz del proyecto.

### Manipulación de Listas y Diccionarios

Este script (pruebaingreso.py) filtra números pares de una lista base, calcula sus cuadrados y genera un diccionario estructurado.
python pruebaingreso.py

###Procesamiento de Archivos
Este programa (contador_palabras.py) lee el archivo datos.txt, cuenta el número total de palabras e imprime el resultado.
python contador_palabras.py

## Resolución de problemas TICs (Escenarios reales)

### 1. Impresora no imprime o no aparece en red

- Pasos de diagnóstico:

1. Verificación física (Capa 1): Comprobar que el cable de red o la conexión Wi-Fi estén activos y la impresora encendida.
2. Verificación de red (Capa 3): Hacer un ping a la dirección IP de la impresora desde el equipo del usuario para confirmar comunicación.
3. Verificación de sistema: Revisar si la "Cola de impresión" (Spooler) de Windows está bloqueada con un documento corrupto.

- Solución propuesta:
  Si no hay ping, revisar la configuración de red (DHCP/IP estática) de la impresora. Si hay ping pero no imprime, reiniciar el servicio Spooler en el equipo del usuario o eliminar la cola de impresión atorada.

- Medidas preventivas:
  Asignar siempre direcciones IP estáticas a las impresoras de red para evitar desconfiguraciones.

### 2. Equipo que no enciende, está lento o presenta errores frecuentes

- Pasos de diagnóstico:

1. Si no enciende: Verificar conexiones de poder, fuente de alimentación y estado de los tomacorrientes.
2. Si está lento: Abrir el Administrador de Tareas para monitorear cuellos de botella en CPU, Memoria RAM o Disco.
3. Revisar temperaturas de hardware y realizar un escaneo en busca de malware.

- Solución propuesta:
  Limpiar archivos temporales, deshabilitar programas de inicio innecesarios y actualizar controladores. Si el cuello de botella es físico, proponer el cambio del disco duro mecánico (HDD) por uno de estado sólido (SSD) o aumentar la RAM.

- Medidas preventivas:
  Establecer políticas de mantenimiento preventivo cada 6 meses y educar al usuario sobre descargas seguras.

### 3. Usuario sin acceso a internet o a la red interna

- Pasos de diagnóstico:

1. Revisar la conexión física: ¿El cable UTP está bien conectado? ¿El puerto del Switch parpadea?
2. Ejecutar ipconfig en la terminal: Verificar si el equipo está recibiendo una IP válida.
3. Hacer ping a la puerta de enlace (Router) y luego a internet (8.8.8.8) para saber si el problema es local o de salida externa.

- Solución propuesta:
  Si es problema de cable, reemplazarlo o reconectar. Si es configuración, ejecutar ipconfig /release y ipconfig /renew para refrescar la IP, y ipconfig /flushdns para limpiar la caché de nombres.

- Medidas preventivas:
  Mantener los cuartos de equipos (Racks) ordenados, marcar el cableado estructurado e implementar monitoreo básico del Switch principal.

### 4. Problemas de acceso a sistemas, correo o credenciales

- Pasos de diagnóstico:

1. Comprobar lo más básico: ¿El usuario tiene activado el Bloqueo de Mayúsculas (Caps Lock)?
2. Verificar si la cuenta fue bloqueada en el Directorio Activo o panel de administración por múltiples intentos fallidos.
3. Revisar si el equipo del usuario tiene internet, ya que sin conexión no puede validarse contra el servidor de credenciales.

- Solución propuesta:
  Desbloquear la cuenta desde el panel de administrador y generar una contraseña temporal, forzando al usuario a cambiarla en su próximo inicio de sesión.

- Medidas preventivas:
  Implementar herramientas de autoservicio para recuperación de contraseñas (mediante SMS o correo alterno) para reducir la carga en el departamento de TICs.

### 5. Pérdida de archivos o fallos de sincronización

- Pasos de diagnóstico:

1. Verificar si el archivo está en la Papelera de Reciclaje local o en la nube.
2. Revisar el cliente de sincronización (ej. OneDrive, Google Drive) en la barra de tareas para ver si está en pausa, sin conexión o si hay un "conflicto de sincronización".
3. Comprobar los permisos de red del usuario sobre la carpeta compartida.

- Solución propuesta:
  Si es un problema de sincronización, reiniciar el cliente de nube o desvincular y volver a vincular la cuenta. Si es pérdida real, restaurar el archivo desd

- Medidas preventivas:
  Configurar las políticas de la empresa para que los directorios importantes (Escritorio, Documentos) se sincronicen automáticamente a la nube, y prohibir el almacenamiento exclusivo de información vital en el disco C: local.

```

```
