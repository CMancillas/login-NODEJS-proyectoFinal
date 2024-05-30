Proyecto de Login y Registro - Carlos Mancillas

Este proyecto es una aplicación web de autenticación que permite a los usuarios registrarse, iniciar sesión y cerrar sesión. La aplicación incluye un sistema de gestión de sesiones, validación de usuarios y una interfaz gráfica amigable.
Características

    Registro de Usuarios: Los nuevos usuarios pueden registrarse proporcionando su nombre completo, correo electrónico, nombre de usuario y contraseña.
    Inicio de Sesión: Los usuarios registrados pueden iniciar sesión utilizando su correo electrónico y contraseña.
    Gestión de Sesiones: Se utiliza PHP para gestionar las sesiones de usuario, asegurando que solo los usuarios autenticados puedan acceder a ciertas páginas.
    Validación en el Lado del Servidor: Validación de la existencia del usuario y la contraseña en la base de datos.
    Responsive Design: La interfaz se adapta a diferentes tamaños de pantalla utilizando CSS y JavaScript.

    Requisitos

Para ejecutar este proyecto, necesitarás tener instalado:

    Un servidor web como Apache
    PHP 7.x o superior
    MySQL o MariaDB
    Composer (para gestionar dependencias PHP)

Configuración del Entorno

    Clonar el repositorio:

    sh

git clone https://github.com/tu-usuario/nombre-del-repositorio.git
cd nombre-del-repositorio

Configurar la base de datos:

    Crear una base de datos en MySQL llamada login_register_db.
    Importar el esquema de la base de datos desde el archivo database.sql (si existe).

Configurar la conexión a la base de datos:

Editar el archivo php/conexion_be.php para establecer las credenciales correctas de la base de datos.

php

<?php
$conexion = mysqli_connect("localhost", "root", "", "login_register_db");
if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
}
?>

Iniciar el servidor:
Puedes usar herramientas como XAMPP, MAMP o el servidor embebido de PHP para iniciar el servidor.

sh

    php -S localhost:8000

    Acceder a la aplicación:
    Abrir tu navegador web y navegar a http://localhost:8000.

Dependencias

    PHP: Lenguaje de programación del lado del servidor utilizado para manejar la lógica de la aplicación.
    MySQL: Base de datos relacional utilizada para almacenar la información de los usuarios.
    JavaScript: Utilizado para manejar la interactividad en la página (mostrar/ocultar formularios).
    CSS: Para los estilos y diseño de la interfaz de usuario.
    Chart.js: Librería para crear gráficos dentro de la página de bienvenida.

Uso
Registro

    Acceder a la página de inicio.
    Hacer clic en "Registrate".
    Completar el formulario de registro con el nombre completo, correo electrónico, nombre de usuario y contraseña.
    Hacer clic en "Registrarse".

Inicio de Sesión

    Acceder a la página de inicio.
    Hacer clic en "Iniciar Sesion".
    Ingresar el correo electrónico y la contraseña.
    Hacer clic en "Entrar".

Cerrar Sesión

    En la página de bienvenida, hacer clic en "Cerrar sesión".

Seguridad

Para mejorar la seguridad de este proyecto, considera los siguientes puntos:

    Encriptación de Contraseñas: Utilizar funciones de encriptación como password_hash() y password_verify() en PHP.
    Validación de Entrada: Asegurar que todos los datos de entrada sean validados y sanitizados.
    Protección contra CSRF: Implementar tokens CSRF para proteger formularios.
    Actualización de Dependencias: Mantener todas las dependencias actualizadas.

Contribuciones

Las contribuciones son bienvenidas. Por favor, abre un issue para discutir lo que te gustaría cambiar o mejora.
Licencia

Este proyecto está licenciado bajo la MIT License. Ver el archivo LICENSE para más detalles.

Desarrollado por Carlos Mancillas. ¡Gracias por visitar y usar este proyecto!
