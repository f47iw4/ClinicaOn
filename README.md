# 🏥 Clínica Médica - Sistema de Gestión

![Laravel](https://img.shields.io/badge/Laravel-10-red?style=flat-square&logo=laravel) ![PHP](https://img.shields.io/badge/PHP-83.6%25-blue?style=flat-square&logo=php) ![Blade](https://img.shields.io/badge/Blade-9.3%25-purple?style=flat-square) ![JavaScript](https://img.shields.io/badge/JavaScript-1.2%25-yellow?style=flat-square&logo=javascript) ![CSS](https://img.shields.io/badge/CSS-0.1%25-blue?style=flat-square&logo=css3)

## 📌 Descripción
Este es un sistema de gestión para una clínica médica desarrollado en **Laravel**, diseñado para manejar citas, pacientes, historiales médicos y administración general de la clínica de manera eficiente y segura.

## 🚀 Tecnologías Utilizadas
- **PHP (Laravel 10)** - Framework principal
- **Blade** - Motor de plantillas
- **JavaScript** - Funcionalidades dinámicas
- **CSS** - Diseño y estilos
- **MySQL** - Base de datos

## 🎯 Funcionalidades (WIP)
✅ Gestión de pacientes y médicos
✅ Administración de citas médicas
✅ Registro y consulta de historiales clínicos
✅ Control de usuarios y roles
✅ Sistema de notificaciones y alertas
✅ Dashboard con estadísticas

## 📂 Instalación
1. Clona este repositorio:
   ```sh
   git clone https://github.com/tuusuario/clinica-medica.git
   ```
2. Instala las dependencias con Composer:
   ```sh
   cd clinica-medica
   composer install
   ```
3. Crea y configura el archivo `.env`:
   ```sh
   cp .env.example .env
   ```
4. Genera la clave de la aplicación:
   ```sh
   php artisan key:generate
   ```
5. Configura la base de datos en `.env` y migra:
   ```sh
   php artisan migrate --seed
   ```
6. Inicia el servidor:
   ```sh
   php artisan serve
   ```

## 📜 Licencia
Este proyecto está bajo la licencia **MIT**.

---
💡 *Desarrollado con Laravel para facilitar la gestión médica.*
