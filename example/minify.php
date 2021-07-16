<?php

require "../vendor/autoload.php";

use BrBunny\BrPlates\BrPlates;

// Create new Plates instance
$view = new BrPlates("./theme");

// Register a one-off function [https://platesphp.com/engine/functions/]
$view->function("asset", function (string $path) {
    return "http://localhost/brPlates/example/theme/{$path}";
});

// Get template from another directory
$view->path("profile", "./theme/profile");
// $view->removeTemplate("profile");

// Preassign data to the layout [https://platesphp.com/engine/folders/]
$view->data(['company' => 'BrPlates']);

//Check if a template exists [https://platesphp.com/templates/overview/]
if ($view->isset("profile::profile")) {
    // $template = $view->render("profile::profile", ["user" => "Jow User"]);
    // echo $template;
    echo $view->renderMinify("profile::profile", ["user" => "Jow User"]);
}
