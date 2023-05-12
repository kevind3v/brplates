<?php

namespace BrBunny\BrPlates\Templates;

use League\Plates\Template\Template;
use Throwable;


class BrTemplate extends Template
{

    /**
     * Represents the main component that contains child components.
     * @param string $name
     * @param array $chields
     * @param array $data
     * @return string
     * @throws Throwable
     */
    public function widget(string $name, array $chields = [], array $data = []): string
    {
        $layout = $this->engine->make($name);
        if (!empty($chields)) {
            $content = "";
            foreach ($chields as $child) {
                $content .= $child . PHP_EOL;
            }
            $layout->sections = array_merge($this->sections, array('widgets' => $content));
        }
        return $layout->render($data);
    }


    /**
     * Represents a leaf component that doesn't have any children.
     * @param string $name
     * @param array $chields
     * @param array $data
     * @return string
     * @throws Throwable
     */
    public function chields(string $name, array $chields = [], array $data = []): string
    {
        return $this->widget($name, $chields, $data);
    }

    /**
     * Represents a branch component that has children components.
     * @param  string $name
     * @param  array  $data
     * @return string
     */
    public function child(string $name, array $data = array()) : string
    {
        return $this->engine->render($name, $data);
    }
}