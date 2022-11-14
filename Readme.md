# BLOG PHP BY GEORGE & MARTIN
## Instrucciones para despliegue:  

- Habilitar el módulo rewrite en apache.
  ```
  sudo a2enmod rewrite
  ```
- Crear un virtual host en apache: Establecer como DocumentRoot la carpeta public.
  ```
    DocumentRoot /Path/to/Project/public
  ```
- Añadir directiva en el fichero apache.conf o virtual host: 
  ```
  <Directory /Path/to/Project/public>
      AllowOverride All
      Require all granted
  </Directory>
  ```
- Configurar y renombrar el fichero .example a .env

- El usuario por defecto creado al lanzar desplegar el sistema es 'admin' con contraseña 'root'.

- (Opcional) Modificar el fichero php.ini (/etc/php/X.Y/apache2/php.ini) para permitir subidas de ficheros mas grandes. Las imagenes se guardan como longblob en la BD.
  ```
    upload_max_filesize = 20M
    post_max_size = 21M
  ```

- (Opcional) En php.ini cambiar los valores de error_reporting y display_errors a los de abajo (en caso de despliegue)
  ```
    error_reporting = E_ALL & ~E_NOTICE
    display_errors = Off.
  ```
