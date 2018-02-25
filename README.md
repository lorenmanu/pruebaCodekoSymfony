
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

### Recuperacion Frase Aleatoria

Para realizar este apartado se ha creado el método con la ruta correspondiente:

```

/**
 * @Route("/findRandDomSentece")
 */
public function findRandDomSenteceAction()
{

  $obj = json_decode(file_get_contents('https://api.chucknorris.io/jokes/random'), true);
  return new Response($obj['value']);

}

```

En **@Route**, se indica la ruta del navegador donde se va a ejecutar la acción, **findRandDomSenteceAction** es el nombre del método que se va a ejecutar, el método **json_decode** nos recuperará el código **json** a partir de la **url**, y recuperamos la frase del código **json** accediendo por el valor de la clave **$obj['value']**.

En el siguiente enlace se puede ver que hace la función [json_decode](https://api.symfony.com/3.4/Symfony/Component/Serializer/Encoder/JsonDecode.html).

### Creando página con comportamiento Ajax para actualizar la página cada 10s.

Para realizar este apartado, he añadido una página con comportamiento Ajax:

```
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

<script type="text/javascript">

    function getTextAJAX() {

        //GUARDAMOS EN UNA VARIABLE EL RESULTADO DE LA CONSULTA AJAX

        var text = $.ajax({

            url: 'http://127.0.0.1:8000/findRandDomSentece', //ruta donde se recupera la frase aleatoria
                dataType: 'text',//tipo de dato que se recibe
                async: false     //asíncrono es false
        }).responseText;

        //indica el div que va a actualizar con el nuevo mensaje
        document.getElementById("myText").innerHTML = "La frase recogida es: "+text;
    }

    //con esta función llamamos a getTextAjax cada 10s para que actualice
    setInterval(getTextAJAX,10000);

</script>

<html>
    <body onload="getTextAJAX();">

    <div id='myText'></div>
    </body>
</html>

```

Y esta paǵina será cargada por el siguiente método definido en el **controller**.

```

/**
 * @Route("/RandDomSentece")
 */
public function RandDomSenteceAction()
{

  return $this->render(
      'default/index.html.twig'
         );

}


```
