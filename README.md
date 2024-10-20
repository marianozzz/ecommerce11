E-Commerce Laravel Project
Este es un proyecto de e-commerce desarrollado en Laravel, diseñado para ser una tienda online completamente funcional, donde los usuarios pueden navegar por productos, agregarlos a su carrito, realizar compras, y más. El proyecto incluye tanto un lado de administración para gestionar productos, ventas, y usuarios, como un lado de cliente para la experiencia de compra.

Características
Sistema de Usuarios:

Registro e inicio de sesión para usuarios.
Autenticación y roles básicos para la administración y los clientes.
Los administradores pueden ver y gestionar todas las ventas realizadas en la tienda.
Carrito de Compras:

Funcionalidad para agregar productos al carrito, ver el carrito y actualizar la cantidad de productos.
Los usuarios pueden eliminar productos del carrito.
Finalización de compra con la creación de registros de ventas.
Gestión de Productos:

Los administradores pueden agregar, editar y eliminar productos desde un panel de control.
Soporte para cargar imágenes de productos.
Los productos tienen categorías asignadas para facilitar la navegación.
Administración de Ventas:

Los administradores pueden visualizar un listado de todas las ventas realizadas, con detalles como el cliente, el total y la fecha.
Funcionalidad para crear nuevas ventas desde el lado del administrador.
Panel de Administración (AdminLTE):

Un panel de administración personalizado utilizando AdminLTE, que permite gestionar productos, usuarios, y ventas de forma intuitiva.
Relaciones entre Tablas:

Los productos están relacionados con categorías.
Los perfiles de los usuarios almacenan datos adicionales, como provincia y ciudad.
Las ventas están relacionadas con los usuarios registrados y contienen el detalle de la compra.
Tecnologías Utilizadas
Laravel: Framework PHP para el backend.
MySQL: Base de datos para almacenar usuarios, productos, ventas, y otros datos.
Bootstrap: Framework CSS para un diseño responsivo.
AdminLTE: Tema de administración basado en Bootstrap para la gestión del backend.
Font Awesome: Íconos para mejorar la interfaz de usuario.

Uso
Los usuarios pueden registrarse e iniciar sesión para comenzar a comprar productos.
Los administradores tienen acceso a un panel de control donde pueden gestionar productos y ventas.
Los usuarios pueden agregar productos al carrito, revisar su contenido y finalizar la compra.
TDD: Desarrollo basado en pruebas para asegurar la calidad del código.
Requisitos del Sistema
PHP >= 8.1
Composer
MySQL o cualquier otro sistema de base de datos compatible con Laravel
Node.js y NPM (opcional, para compilar los assets del frontend)
