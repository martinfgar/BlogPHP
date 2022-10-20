# BLOG PHP BY GEORGE & MARTIN
## Instrucciones para despliegue:
- Crear un virtual host en apache
- Añadir directiva en el fichero apache.conf: 
```
<Directory /Path/to/Project>
    AllowOverride All
    Require all granted
</Directory>
```
- Configurar y renombrar el fichero .example a .env
