<?php

require "../vendor/autoload.php";

use BrBunny\BrPlates\BrPlates;

// Create new Plates instance
$view = new BrPlates("./theme");

// Register a one-off function [https://platesphp.com/engine/functions/]
$view->setFunction("asset", function (string $path) {
    return "http://localhost/brPlates/example/theme/{$path}";
});

// Get template from another directory
$view->addTemplate("profile", "./theme/profile");
// $view->removeTemplate("profile");

// Preassign data to the layout [https://platesphp.com/engine/folders/]
$view->data(['company' => 'BrPlates'], "_theme");

//Check if a template exists [https://platesphp.com/templates/overview/]
if ($view->isset("profile::profile")) {
    // $template = $view->catch("profile::profile", ["user" => "Jow User"]);
    // echo $template;
    $view->show("profile::profile", ["user" => "Jow User"]);
}
