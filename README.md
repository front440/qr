<p align="center">
  <img src="SCQR.png" alt="Logo de mi aplicación">
</p>

<h2>SCQR</h2>
<p>
  Este repositorio contiene una aplicación web desarrollada en Laravel que proporciona un panel de control y un sistema de acceso mediante códigos QR para un centro educativo.
</p>

<h2>Características</h2>
<p>
  Panel de Control (AdminLTE): La aplicación cuenta con un panel de control intuitivo y fácil de usar que permite a los administradores y al personal del centro educativo gestionar diversos aspectos del alumnado, como registros de entrada y salida, usuarios, etc...
</p>
<p>
  Acceso mediante Códigos QR: La aplicación utiliza códigos QR únicos asociados a cada usuario autorizado (estudiantes) para controlar los absentismos. Al escanear el código QR en los puntos de acceso designados, se guarda un registro con la información del usuario y la hora del escaneo.
</p>

<h2>Tecnologías Utilizadas</h2>
<ul>
  <li>Laravel</li>
  <li>Javascript</li>
  <li>MySQL</li>
</ul>

<h2>Instalación</h2>
<ol>
  
  <li>Clona este repositorio en tu máquina local.</li>
  <li>El fichero qr2.sql contiene la estructura necesaria para que funcione la aplicación, se deberá importar este fichero en la base de datos que se usará para la aplicación</li>
  <li>Ejecuta el comando <code>composer install</code> para instalar las dependencias de Laravel.</li>
  <li>Ejecuta el comando <code>composer update</code> en el caso de que <code>composer install</code> muestre algún tipo de fallo</li>
  <li>Crea un archivo <code>.env</code> a partir del archivo <code>.env.example</code> y configura la base de datos y otros ajustes necesarios.</li>
  <li>Ejecuta el comando <code>php artisan key:generate</code> para generar una clave de aplicación única.</li>
  <li>Ejecuta el comando <code>php artisan serve</code> para iniciar el servidor de desarrollo.</li>
</ol>
