<?php

require __DIR__ . "/../vendor/autoload.php";

use BrBunny\BrPlates\BrPlates;

// Create new Plates instance
$view = new BrPlates("./theme");

// Register a one-off function [https://platesphp.com/engine/functions/]
$view->function("asset", function (string $path) {
    return "/theme/{$path}";
});

// Get template from another directory
$view->path("profile", "./theme/profile");
$view->path("widgets", "./theme/widgets");

// $view->removeTemplate("profile");

// Preassign data to the layout [https://platesphp.com/engine/folders/]
$view->data(['company' => 'BrPlates'], "profile::profile");

//Check if a template exists [https://platesphp.com/templates/overview/]
if ($view->isset("profile::profile")) {
    // $template = $view->render("profile::profile", ["user" => "Jow User"]);
    // echo $template;
    $view->show("profile::profile", ["user" => "Jow User"]);
}
