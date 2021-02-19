<?php

namespace BrBunny\BrPlates;

trait BrPlatesTrait
{
     /**
     * @param string $name
     * @param string $path
     * @return BrPlates
     */
    public function path(string $name, string $path, bool $fallback = false): BrPlates
    {
        $this->engine->addFolder($name, $path, $fallback);
        return $this;
    }

    /**
     * @param string $name
     * @return BrPlates
     */
    public function removePath(string $name): BrPlates
    {
        $this->engine->removeFolder($name);
        return $this;
    }

    /**
     * @param string $name
     * @param callback $function
     * @return BrPlates
     */
    public function function(string $name, $function): BrPlates
    {
        $this->engine->registerFunction($name, $function);
        return $this;
    }

    /**
     * @param array $data
     * @param string $template
     * @return BrPlates
     */
    public function data(array $data, $template = null): BrPlates
    {
        $this->engine->addData($data, $template);
        return $this;
    }

    /**
     * @param string $name
     * @param array $data
     * @return string
     */
    public function render(string $name, array $data = []): string
    {
        return $this->engine->render($name, $data);
    }

    /**
     * @param string $name
     * @param array $data
     * @return BrPlates
     */
    public function show(string $name, array $data = []): BrPlates
    {
        echo $this->render($name, $data);
        return $this;
    }

    /**
     * @param string $name
     * @return boolean
     */
    public function isset(string $name): bool
    {
        return $this->engine->exists($name) ?? false;
    }
}
