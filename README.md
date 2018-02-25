
## **Prueba Codeko Symfony 3.4** ##

Autor: Lorenzo Manuel Rosas Rodríguez

### Breve Descripción
Prueba de selección de Codeko, en la cual se requiere recuperar una frase del siguiente [enlace](https://api.chucknorris.io/jokes/random), mostrarla en el navegador y que se actualice cada 10s.

Hemos decidido usar Symfony 3.4, al ser una versión estable y en mantenimiento del [framework](https://symfony.com/doc/3.4/setup.html).

### Inicalización del repositorio

Hemos instalado **Symfony 3.4** y el gestor de despendencias **Composer** siguiendo la documentación oficial.

```

- Instalar Symfony:

sudo mkdir -p /usr/local/bin
sudo curl -LsS https://symfony.com/installer -o /usr/local/bin/symfony
sudo chmod a+x /usr/local/bin/symfony

- Instalar Composer:

sudo apt-get install composer

- Creación del proyecto con el gestor de dependencias Composer:

composer create-project symfony/framework-standard-edition pruebaCodekoSymfony "3.4"

- Ejecución de la aplicación para comprobar que todo funciona:

cd my_project_name/
php bin/console server:run

```
