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
"brbunny/brplates": "1.0.*"
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

##### setFunction

_Create a unique function for a specific use._

Criar uma função única para um caso específico.

```php
<?php

// Register a one-off function
$this->view->setFunction("name", function ($params) {
    // Type Code
});
```

##### addTemplate and removeTemplate

_Group your models in different namespaces._

Agrupe seus modelos em diferentes namespaces.

```php
<?php

// Get template from another directory
$this->view->addTemplate("profile", "./theme/profile");

//Use template
$this->view->show("profile::profile", ["user" => "Jow User"]);

// Remove template added
$this->view->removeTemplate("profile");
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

##### catch

_If you want to store the model in a variable, use the `catch()` function. If you want to render the model directly, use the `show()` function._

Se deseja armazenar o modelo em uma variável, utilize a função `catch()`. Já se quiser renderizar o modelo direto utilize a função `show()`.

```php
<?php
$template = $view->catch("_theme", ["user" => "Jow User"]);
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

### Credits

- [Kevin S. Siqueira](https://github.com/kevind3v) (Developer of this library)
- [PlatesPHP](https://platesphp.com/) (Documentation)

### License

The MIT License (MIT). Please see [License File](https://github.com/kevind3v/brplates/blob/main/LICENSE) for more information.
