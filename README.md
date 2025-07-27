# API CRUD DE PRUEBA EN PHP

Esta API usa Docker Compose para levantar un entorno web Apache y una base de datos en MySQL
Para probarlo simplemente es necesario contar con Docker Desktop

# CÓMO EJECUTAR O DESPLEGAR LA API

1.  Con la terminal de comandos accederemos a la ruta del proyecto donde se encuentran los archivos necesarios para levantar el contenedor en Docker. (Dockerfile y docker-compose.yml)

2.  Una vez en la carpeta en la terminal levantaremos el proyecto con el comando: docker compose up . Este comando se encargará de crear una imagen para el servidor Apache y MySQL en los puertos 8080 y 3306 respectivamente.

3.  En un navegador accedemos a la siguiente URL: localhost:8080/front 

4.  Para parar la ejecución del contenedor en la misma terminal de comandos usamos el comando: docker compose down. (Opcional añadir la flag -v que limpiará los datos.)


# ENLACE DEL REPOSITORIO EN GITHUB (No incluye el archivo .env)
https://github.com/AlejandroVaquero2001/CRUD-API-en-PHP
