## Generar PDF con Laravel usando hojas de estilo CSS

>[Ver video explicación en YouTube](https://youtu.be/53B3cuUZMHU)

### Instalación
- Clonar el repositorio y ejecutar `composer install`.
- Copiar `.env.example` y renombrar a `.env`. Ajustar variables.
- Para enviar el PDF por email, crear base de datos y ejecutar migraciones con `php artisan migrate`

### Soluciones a posibles problemas
- Dompdf lanza un error si no existe el directorio "storage/fonts". Crear la carpeta en dicha dirección.
