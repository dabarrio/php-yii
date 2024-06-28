# PROYECTO YII

Estructura de carpetas
-------------------

      assets/             contains assets definition
      commands/           contains console commands (controllers)
      config/             contains application configurations
      controllers/        contains Web controller classes
      mail/               contains view files for e-mails
      models/             contains model classes
      runtime/            contains files generated during runtime
      tests/              contains various tests for the basic application
      vendor/             contains dependent 3rd-party packages
      views/              contains view files for the Web application
      web/                contains the entry script and Web resources


Instalación
------------

### Instalar vía composer

If you do not have [Composer](https://getcomposer.org/), you may install it by following the instructions
at [getcomposer.org](https://getcomposer.org/doc/00-intro.md#installation-nix).

You can then install this project template using the following command:

~~~
composer create-project --prefer-dist yiisoft/yii2-app-basic basic
~~~

Now you should be able to access the application through the following URL, assuming `basic` is the directory
directly under the Web root.

~~~
http://localhost/basic/web/
~~~

### Instalar desde un archivo comprimido

Extract the archive file downloaded from [yiiframework.com](https://www.yiiframework.com/download/) to
a directory named `basic` that is directly under the Web root.

Set cookie validation key in `config/web.php` file to some random secret string:

```php
'request' => [
    // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
    'cookieValidationKey' => '<secret random string goes here>',
],
```

You can then access the application through the following URL:

~~~
http://localhost/basic/web/
~~~


### Instalar con docker

Update your vendor packages

    docker-compose run --rm php composer update --prefer-dist
    
Run the installation triggers (creating cookie validation code)

    docker-compose run --rm php composer install    
    
Start the container

    docker-compose up -d
    
You can then access the application through the following URL:

    http://127.0.0.1:8000

**NOTES:** 
- Minimum required Docker engine version `17.04` for development (see [Performance tuning for volume mounts](https://docs.docker.com/docker-for-mac/osxfs-caching/))
- The default configuration uses a host-volume in your home directory `.docker-composer` for composer caches


Configuración
-------------

### Database

Edit the file `config/db.php` with real data, for example:

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=yii2basic',
    'username' => 'root',
    'password' => '1234',
    'charset' => 'utf8',
];
```

**NOTES:**
- Yii won't create the database for you, this has to be done manually before you can access it.
- Check and edit the other files in the `config/` directory to customize your application as required.
- Refer to the README in the `tests` directory for information specific to basic application tests.

Comandos adicionales
-------------

---
#### asset
- Permite combinar y comprimir tus archivos JavaScript y CSS.
  - **asset/compress (default)**: Combina y comprime los archivos de recursos según la configuración dada.
  - **asset/template**: Crea una plantilla de archivo de configuración para [[actionCompress]].

#### cache
- Permite vaciar la caché.
  - **cache/flush**: Vacía los componentes de caché dados.
  - **cache/flush-all**: Vacía todas las cachés registradas en el sistema.
  - **cache/flush-schema**: Limpia la caché del esquema de la base de datos para un componente de conexión dado.
  - **cache/index (default)**: Lista las cachés que se pueden vaciar.

#### fixture
- Administra la carga y descarga de datos de prueba.
  - **fixture/load (default)**: Carga los datos de prueba especificados.
  - **fixture/unload**: Descarga los datos de prueba especificados.

#### gii
- Versión en línea de comandos de Gii - un generador de código.
  - **gii/controller**: Generador de Controladores.
  - **gii/crud**: Generador de CRUD.
  - **gii/extension**: Generador de Extensiones.
  - **gii/form**: Generador de Formularios.
  - **gii/index (default)**.
  - **gii/model**: Generador de Modelos.
  - **gii/module**: Generador de Módulos.

#### hello
- Este comando repite el primer argumento que hayas ingresado.
  - **hello/index (default)**: Este comando repite lo que hayas ingresado como el mensaje.

#### help
- Proporciona información de ayuda sobre los comandos de consola.
  - **help/index (default)**: Muestra los comandos disponibles o la información detallada.
  - **help/list**: Lista todos los controladores y acciones disponibles en un formato legible por máquinas.
  - **help/list-action-options**: Lista todas las opciones disponibles para la acción `$action` en un formato legible por máquinas.
  - **help/usage**: Muestra información de uso para la acción `$action`.

#### message
- Extrae mensajes para ser traducidos desde archivos fuente.
  - **message/config**: Crea un archivo de configuración para el comando "extract" usando opciones especificadas en la línea de comandos.
  - **message/config-template**: Crea una plantilla de archivo de configuración para el comando "extract".
  - **message/extract (default)**: Extrae mensajes para ser traducidos desde el código fuente.

#### migrate
- Administra las migraciones de la aplicación.
  - **migrate/create**: Crea una nueva migración.
  - **migrate/down**: Degrada la aplicación revirtiendo migraciones antiguas.
  - **migrate/fresh**: Elimina todas las tablas y restricciones relacionadas. Inicia la migración desde el principio.
  - **migrate/history**: Muestra el historial de migraciones.
  - **migrate/mark**: Modifica el historial de migraciones a la versión especificada.
  - **migrate/new**: Muestra las nuevas migraciones no aplicadas.
  - **migrate/redo**: Rehace las últimas migraciones.
  - **migrate/to**: Actualiza o degrada hasta la versión especificada.
  - **migrate/up (default)**: Actualiza la aplicación aplicando nuevas migraciones.

#### serve
- Ejecuta el servidor web incorporado de PHP.
  - **serve/index (default)**: Ejecuta el servidor web incorporado de PHP.

Para correr el cualquier comando, desde la consola hay que ejecutar:

```
php yii <command>
```
