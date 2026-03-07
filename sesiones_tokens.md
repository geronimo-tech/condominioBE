Implementación de manejo de sesiones por dispositivo



Al iniciar sesión el sistema genera un token único que se asocia al usuario y al dispositivo desde el que se inició sesión.



Cada dispositivo tendrá su propio token almacenado en la base de datos, lo que permite mantener múltiples sesiones activas al mismo tiempo.



Cuando el usuario cambia su contraseña, el sistema elimina todos los tokens asociados al usuario, lo que provoca el cierre de sesión en todos los dispositivos por motivos de seguridad.

