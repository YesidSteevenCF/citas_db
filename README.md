# API de Citas Médicas

API REST desarrollada con Laravel para gestionar pacientes y citas médicas.

## Requisitos

- PHP 8.3 o superior
- Composer
- MySQL
- Laravel 13

## Instalación

1. Clonar el repositorio:

        git clone <https://github.com/YesidSteevenCF/citas_db.git>
        cd citas-api

2. Instalar dependencias:

        composer install

3. Crear el archivo de entorno y generar la clave:

        cp .env.example .env
        php artisan key:generate

4. Configurar la base de datos en el archivo `.env` (DB_DATABASE, DB_USERNAME, DB_PASSWORD).

5. Ejecutar las migraciones:

        php artisan migrate

6. Levantar el servidor:

        php artisan serve

La API queda disponible en `http://127.0.0.1:8000/api`.

## Endpoints

| Método | URL | Acción |
|---|---|---|
| GET | `/api/citas` | Listar citas |
| POST | `/api/citas` | Crear una cita |
| GET | `/api/citas/{cita}` | Ver una cita |
| PUT / PATCH | `/api/citas/{cita}` | Actualizar una cita |
| DELETE | `/api/citas/{cita}` | Eliminar una cita |

## Regla de negocio

No se pueden agendar citas en fechas pasadas.

## Pruebas

La colección de Postman con las pruebas está en `docs/pruebas_POSTMAN.json`, junto con las capturas de cada respuesta.

## Estándar de codificación

Se sigue el estándar **PSR-12** de PHP-FIG junto con las convenciones de Laravel:

- Clases y modelos: PascalCase, singular (`Cita`, `Paciente`)
- Controladores: PascalCase + Controller (`CitaController`)
- Tablas: snake_case, plural (`citas`, `pacientes`)
- Columnas y claves foráneas: snake_case (`paciente_id`)
- Métodos y variables: camelCase (`listarCitas()`, `$citaNueva`)
- Rutas: minúsculas y en plural (`/api/citas`)

El formateo se verifica con Laravel Pint:

    ./vendor/bin/pint --test

Los comentarios se usan solo para explicar reglas de negocio o decisiones, no para repetir lo que hace el código.