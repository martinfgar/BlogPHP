# BLOG PHP BY GEORGE & MARTIN
## Instrucciones para despliegue:
- Crear un virtual host en apache: Establecer como DocumentRoot la carpeta public.
- Añadir directiva en el fichero apache.conf o virtual host: 
```
<Directory /Path/to/Project/public>
    AllowOverride All
    Require all granted
</Directory>
```
- Configurar y renombrar el fichero .example a .env

Todos los usuarios de prueba creados por blog.sql tienen de contraseña 'root'.

- Modificar el fichero php.ini para permitir subidas de ficheros mas grandes. Las imagenes se guardan como longblob en la BD.