# BRPLATES @BrBunny

[![Maintainer](https://img.shields.io/badge/maintainer-@kevind3v-blue.svg?style=flat-square)](https://github.com/kevind3v)
[![PHP from Packagist](https://img.shields.io/packagist/php-v/brbunny/brplates.svg?style=flat-square)](https://packagist.org/packages/brbunny/brplates)
[![Latest Version](https://img.shields.io/github/release/kevind3v/brplates.svg?style=flat-square)](https://github.com/kevind3v/brplates/releases/)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](https://github.com/kevind3v/brplates/blob/main/LICENSE)
[![Total Downloads](https://img.shields.io/packagist/dt/brbunny/brplates.svg?style=flat-square)](https://packagist.org/packages/brbunny/brplates)

BrPlates is a component for handling view layer using Plates

#### Installation

BrPlates is available through Composer:

```sh
"brbunny/brplates": "1.2.*"
```

or run

```sh
composer require brbunny/brplates
```

#### Documentation

For more details on how to use BrPlates, see the example folder with details in the component directory or to learn more visit [PlatesPHP](https://platesphp.com/)

##### Initialization

_To start using BrPlates, instantiate the class inside your controller. To learn more, visit [PlatesPHP](https://platesphp.com/)_

Para começar a usar o BrPlates, instancie a classe dentro do seu controlador. Para saber mais, visite [PlatesPHP](https://platesphp.com/)

```php
<?php

use BrBunny\BrPlates\BrPlates;

class Controller
{
    /** @var BrPlates; */
    private $view;

    public function __construct($path, $ext)
    {
        // $this->view = new BrPlates($path, $ext);
        $this->view = new BrPlates($path); //Extension is optional
    }
}
```

##### function

_Create a unique function for a specific use._

Criar uma função única para um caso específico.

```php
<?php

// Register a one-off function
$this->view->function("name", function ($params) {
    // Type Code
});
```

##### path and removePath

_Group your models in different namespaces._

Agrupe seus modelos em diferentes namespaces.

```php
<?php

// Get template from another directory
$this->view->path("profile", "./theme/profile");

//Use template
$this->view->show("profile::profile", ["user" => "Jow User"]);

// Remove template added
$this->view->removePath("profile");
```

##### data

_If you have data in common across multiple models, use the `data()` function._

Se possuir dados em comum em vários modelos utilize a função `data()`.

```php
<?php
//
$this->view->data(['company' => 'BrPlates'], ["_theme", "home"]);
$this->view->data(['company' => 'BrPlates']); // Template is Optional
```

##### render

_If you want to store the model in a variable, use the `render()` function. If you want to render the model directly, use the `show()` function._

Se deseja armazenar o modelo em uma variável, utilize a função `render()`. Já se quiser renderizar o modelo direto utilize a função `show()`.

```php
<?php
$template = $view->render("_theme", ["user" => "Jow User"]);
echo $template;

$this->view->show("_theme", ["user" => "Jow User"]);
```

##### isset

_To check if a model exists, simply use the `isset()` function._
Para verificar se um modelo existe, basta utilizar a função `isset()`

```php
<?php

if ($this->view->isset("_theme")) {
   // Exist
}
```

##### widget

_If you want to create a tree of components, use the `widget()` method._
Se você deseja criar uma árvore de componentes, utilize o método `widget()`

```php
/*
Content of the widgets::list template:

<ul>
    <?= $this->section('widgets') ?>
</ul>
*/
<?= $this->widget("widgets::list", [/* Items */])  ?>

// Example
<?= $this->widget("widgets::list", [
    $this->child("widgets::item", ["content" => "Text"]),
    $this->child("widgets::item", ["content" => "Text2"]),
    $this->children("widgets::list2", [
        $this->child("widgets::item", ["content" => "Text3.1"]),
    ], ["label" => "Text3"])
])  ?>
```

##### children

_If you have a component that has child components, and that same component contains `data`, use `children()._
Se existe um componente que possui componentes filhos, e esse mesmo componente contem `data` utilize `children()`

```php

/*
Content of the widgets::children template:

<li>
    <?= $label ?>
    <ul>
        <?= $this->section('widgets') ?>
    </ul>
</li>
*/
$this->children("widgets::list2", [
        $this->child("widgets::item", ["content" => "Text1.1"]),
], ["label" => "Text1"]);
```

##### child

_If the component doesn't have any children, use `child()`_
Se o componente não tiver filhos, utilize `child()`

```php

/*
Content of the widgets::item template:

<li><?= $content ?></li>
*/
$this->child("widgets::item", ["content" => "Text"]);
```


##### renderMinify

_Reduce code to render._

Reduzir código para renderização.

```php
<?php

echo $view->renderMinify("profile::profile", ["user" => "Jow User"]);
```

_OBS: To minify js scripts, put "js-mix" in the opening of the script tag_

OBS: Para minimizar scripts js, coloque "js-mix" na abertura da tag script

```php
<script js-mix>
    // Alert
    alert('minify');
</script>

// Result
<script>alert('minify');</script>
```

### Credits

- [Kevin S. Siqueira](https://github.com/kevind3v) (Developer of this library)
- [PlatesPHP](https://platesphp.com/) (Documentation)

### License

The MIT License (MIT). Please see [License File](https://github.com/kevind3v/brplates/blob/main/LICENSE) for more information.
