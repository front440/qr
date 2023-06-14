<p align="center">
  <img src="SCQR.png" alt="Logo de mi aplicación">
</p>

## SCQR
Este repositorio contiene una aplicación web desarrollada en Laravel que proporciona un panel de control y un sistema de acceso mediante códigos QR para un centro educativo.

##Características
Panel de Control (AdminLTE): La aplicación cuenta con un panel de control intuitivo y fácil de usar que permite a los administradores y al personal del centro educativo gestionar diversos aspectos del alumnado, como registros de entrada y salida, usuarios, etc...

Acceso mediante Códigos QR: La aplicación utiliza códigos QR únicos asociados a cada usuario autorizado (estudiantes) para controlar los absentismos. Al escanear el código QR en los puntos de acceso designados, se guarda un registro con la información del usuario y la hora del escaneo.

##Tecnologías Utilizadas
Laravel
Javascript
MySQL

##Instalación
Clona este repositorio en tu máquina local.
Ejecuta el comando composer install para instalar las dependencias de Laravel.
Crea un archivo .env a partir del archivo .env.example y configura la base de datos y otros ajustes necesarios.
Ejecuta el comando php artisan key:generate para generar una clave de aplicación única.
Ejecuta el comando php artisan migrate para migrar las tablas de la base de datos.
Ejecuta el comando php artisan serve para iniciar el servidor de desarrollo.
