<?php

namespace BrBunny\BrPlates\Templates;

use League\Plates\Template\Template;
use Throwable;


class BrTemplate extends Template
{
    /**
     * Represents the main component that contains child components.
     * @param string $name
     * @param array $children
     * @return string
     * @throws Throwable
     */
    public function widget(string $name, array $children = []): string
    {
        $layout = $this->orderChildren($name, $children);
        return $layout->render();
    }


    /**
     * Represents a leaf component that doesn't have any children.
     * @param string $name
     * @param array $children
     * @param array $data
     * @return string
     * @throws Throwable
     */
    public function children(string $name, array $children = [], array $data = []): string
    {
        $layout = $this->orderChildren($name, $children);
        return $layout->render($data);
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

    /**
     * @param string $name
     * @param array $children
     * @return Template
     */
    private function orderChildren(string $name, array $children = []): Template
    {
        $layout = $this->engine->make($name);
        if (!empty($children)) {
            $content = "";
            foreach ($children as $child) {
                $content .= $child . PHP_EOL;
            }
            $layout->sections = array_merge($this->sections, array('widgets' => $content));
        }
        return $layout;
    }
}