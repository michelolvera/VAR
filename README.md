# Proyecto *Punto de Venta* para la clase Gestión de Proyectos de Software

Este proyecto se elabora para aprobar una clase, puede tener poca o nula contribución a la comunidad.

## Características
- Catalogo de Productos
- Registro de Usuarios
- Carro de Compras
- Pago mediante Paypal
- Gestión de productos por parte de un administrador

## Reporte de errores o solicitudes de pull

*No serán atendidas*

## Comandos para configurar Laravel
En consola, ejecuta los siguientes comandos:

	git clone https://github.com/michelolvera/VAR.git
	cd VAR
	composer install
	cp .env.example .env
	php artisan key:generate

Recuerda configurar tu autenticación a base de datos en el archivo `.env` que acabas de crear, después de esto podrás crear la base de datos de la siguiente manera:

- `php artisan migrate` si lo único que deseas es la base de datos sin registros.
- `php artisan migrate --seed` si deseas agregar datos de prueba y poder iniciar sesión con los siguientes datos:
	+ Administrador:
		* Correo: admin@mail.com
		* Contraseña: 12345678
	+ Usuario:
		* Correo: user@mail.com
		* Contraseña: 12345678

Despues de eso, estas listo para desarrollar.