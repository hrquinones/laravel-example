

## Contenido

Este proyecto se uso como workshop de buenas prácticas en PHP


*¡Nunca te rindas! Siempre debes buscar superarte a ti mismo y nunca dejar de entrenar.
¡El crecimiento constante es la clave para alcanzar nuevas alturas en todo lo que hagas!* 
**-Goku**

| [<img src="https://avatarfiles.alphacoders.com/243/thumb-1920-243239.jpg" width=115><br><sub>Goku</sub>](https://en.wikipedia.org/wiki/Goku) |  
| :---: | 

## Indice
1. Como empezar con Laravel 🚀 
2. Como configurar y ejecutar Unit Test 🧪
3. Herramientas recomendadas para buenas practicas 🔧


## 1. Como empezar con Laravel 🚀

- Para crear un proyecto en laravel se puede usar composer

```bash
    composer create-project laravel/laravel laravel-example
```

```bash
    php artisan key:generate
```

Una vez credo el proyecto, se recomienda seguir estos pasos
1. Configurar conexion a base de datos
2. Crear Tabla
3. Crear Modelo
4. Crear Servicio
5. Crear controlador
6. Crear Routes

### 1.1 Conexion a base de datos 

Se debe configurar el archivo .env con el driver correcto, nombre o url de base de datos, puerto, etc.

- Lectura recomendada: [Database in laravel](https://laravel.com/docs/10.x/database)

  - Base de datos soportadas en Laravel 10
    - MariaDB 10.3+ (Version Policy)
    - MySQL 5.7+ (Version Policy)
    - PostgreSQL 10.0+ (Version Policy)
    - SQLite 3.8.8+
    - SQL Server 2017+ (Version Policy)

- Para el workshop se uso un mySQL en un contenedor Docker. 
- Paginas que podrian servir de referencia: 
    - [Como crear un contenedor con Docker-Mysql y persistir la informacióm](https://platzi.com/tutoriales/1432-docker-2018/3268-como-crear-un-contenedor-con-docker-mysql-y-persistir-la-informacion/)
    - [Docker oficial image](https://hub.docker.com/_/mysql/)


### 1.2 Crear tabla

El siguiente comando crea la plantilla para la estructura de la tabla en database/migrations
Se recomienda leer: https://laravel.com/docs/4.2/schema

```bash
    php artisan make:migration create_mediadores_table
```

Ejemplo:

```php
    Schema::create('mediador', function (Blueprint $table) {
        $table->uuid('id')->primary();
        $table->string('first_name');
        $table->string('last_name');
        $table->date('dt_birth');
        $table->char('document_type',4);
        $table->char('document_id',20);
        $table->enum('sex',['male','female','not specified']);
        $table->date('dt_death')->nullable();
        $table->char('distrito',20);
        $table->timestamps();
    });
```

Para ejecutar el proceso de crear las tablas:

```bash
    php artisan migrate
```

Para insertar datos: se crea un archivo en la carpeta database/seeds
En este archivo se indica que datos insertar
Se recomienda leer: https://laravel.com/docs/4.2/migrations
El comando para crear archivo seeder

```bash
    php artisan make:seeder MediadorSeeder
```
Ejemplo:
```php
    DB::table('mediador')->insert
    (
        [
            'id' => Str::uuid(),     
            'first_name' => 'Carlos',
            'last_name' => 'Rey',
            'dt_birth' => date('Y-m-d',strtotime('1985-10-15')),
            'sex' => 'male',
            'document_type' => 'DNI',
            'document_id' => '35000222',
            'distrito' => 'Capital',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s') 
        ]
    );
```

El comando para ejecutar el proceso para insertar datos:

```bash
    php artisan db:seed
```

### 1.3 Crear modelo
(https://laravel.com/docs/10.x/eloquent#generating-model-classes)

Comando para crear un modelo:

```bash
    php artisan make:model Mediadores
```

```bash
    php artisan make:model Bolillero
```

Se crea el archivo en /app

### 1.4 Crear servicio
Se recomienda crear la carpeta "app/Services" y crear las clases dentro de ésta
Las clases deben contener toda la logica de negocio de tu aplicacion
- Tratar de usar algun patron de diseño 
- Tratar de usar los principios SOLID
- Se puede comenzar con algo pequeño y luego ir agregando funcionalidades
- No tengas miedro de refactorizar si te das cuenta que puedes hacerlo mejor!

### 1.5 Crear controlador

En la capa de controladores, agregar logica de validaciones e inyectar las clases de servicio que necesites
Evitar agregar logica de negocio, dejar esto en la capa de servicio

Comando para crear controlador

```bash
    php artisan make:controller MediadoresController
```

Se crea en app/Http/Controllers. Dentro se deben definir todas las acciones del api


### 1.6 Agregar endpoints al routes
Se debe agregar en routes/api.php para que sea accesible, con un nombre y una acción
Ejemplo:

```php
    Route::get('/mediador/{id}', [MediadorController::class, 'get']);
    Route::get('/mediador', [MediadorController::class, 'show']);
    Route::post('/mediador', [MediadorController::class, 'post']);
```


## 2. Como configurar y ejecutar Unit Test 🧪

- Para configurar el ambiente de testing se debe modificar el archivo phpunit.xml
- En este archivo tambien se puede indicar en que carpeta se ubicaran los unit test y el sufijo del archivo php
- En el ejemplo del workshop se indico una base de datos SQLite en RAM, que nos servira para cargar datos de prueba

        <env name="DB_CONNECTION" value="sqlite"/>
        <env name="DB_DATABASE" value=":memory:"/>

- Con esta configuracion se puede insertar datos en la BD para armar los casos de prueba y ejecutar tus metodos
- Los unit test se ejecutan con este comando:

```bash
    php artisan test
```

- Lectura recomendada
  - [Testing](https://laravel.com/docs/10.x/testing)
  - [Database Testing](https://laravel.com/docs/10.x/database-testing)
  - [Mocking Objects](https://laravel.com/docs/9.x/mocking#mocking-objects)
  
 


## 3. Herramientas recomendadas para buenas practicas 🔧

1. PHP Codesniffer 
2. Swagger
   
### 3.1 PHP Codesniffer 

- Para instalar PHP Codesniffer en nuestro proyecto

    ```bash
        composer require squizlabs/php_codesniffer --dev
    ```
- Se debe agregar el archivo phpcs.xml en tu proyecto y establecer el estilo que acuerden en equipo. Para este proyecto se tomo el siguiente: 
  - https://github.com/fossbarrow/laravel-phpcs/blob/main/phpcs.xml


- Paginas de referencia:
  - PHP Standards Recommendations (PSR) [aqui](https://github.com/php-fig/fig-standards/tree/master/accepted)
  - Guia de estilo y buenas practicas PHP [aqui](https://es.stackoverflow.com/questions/119811/guia-de-estilo-y-buenas-practicas-php)



### 3.2 Swagger


- Para instalar swagger en nuestro proyecto

    ```bash
        composer require darkaonline/l5-swagger
    ```

- Posteriormente vamos a publicar la vista y configuración del paquete, ejecutando:
  
    ```bash
        php artisan vendor:publish --provider "L5Swagger\L5SwaggerServiceProvider" 
    ```

- Para incluir tus endpoints en swagger, debes agregar las anotaciones correspondientes. Ejemplos de anotaciones:  
  
    ```php
        /**
        * @OA\Info
        * @OA\License
        * @OA\Tag
        * @OA\Server
        * @OA\SecurityScheme
        * @OA\RequestBody
        * @OA\Property
        * @OA\Get
        * @OA\Post
        * @OA\Put
        */
    ```

    Podes encontrar ejemplos en estas paginas:
    - https://styde.net/como-documentar-una-api-en-laravel-usando-swagger/
    - https://ikolodiy.com/posts/laravel-swagger-tips-examples



- Generar documentacion luego de agregar las anotaciones con el siguiente comando:
  
    ```bash
          php artisan l5-swagger:generate
    ```

- En caso de que estes usando PHP Codesniffer, podes excluir estas anotaciones con la linea

    ```php
        // phpcs:ignore
    ```
     

## Otras documentaciones
- Integracion con otro API Rest [Laravel httpClient](https://laravel.com/docs/10.x/http-client)
- Uso de log [Laravel Logging](https://laravel.com/docs/10.x/logging)



## Paquetes instalados en este proyecto

```bash
    composer require guzzlehttp/guzzle      
    composer require squizlabs/php_codesniffer --dev
    composer require darkaonline/l5-swagger
```





