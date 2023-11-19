<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Acerca del proyecto
Proyecto realizado con el fin de crear una primera version funcional de un Sistema de Control de Medios de Trasporte para las Zona Francas, pensado para una empresa dentro de dicha zona franca, que le permita tener control del estado y del selectivo asignado a cada medio de transporte dentro de la zona franca.

## Requisitos

 - PHP 8.1 (min) (importante la extensión "gd", utilizada para el generador de QR)
 - Composer en su versión más actualizada
 - Algun gestor de base de datos SQL
 - Git

## ¿Como clonar el proyecto?

 1. Clona el proyecto con _"git clone"_
 2. Muevete a la carpeta donde se clono el proyecto
 3. Instala las dependencias con _"composer install"_
 4. Clona el archivo de ejemplo de las variables de entorno _"cp .env.example .env"_
 5. Genera una nueva key con _"php artisa key:generate"_
 6. En el archivo ".env" configura el nombre de la base datos, usuario y contraseña.
 7. Realiza las migraciones "_php artisan migrate"_
 8. (Opt) Si deseas tener datos de prueba inciales usa _"php artisan db:seed"_
