<?php

namespace BrBunny\BrPlates;

use MatthiasMullie\Minify\JS;

trait BrPlatesTrait
{
    /**
     * @param string $name
     * @param string $path
     * @param bool $fallback
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
    public function function(string $name, callable $function): BrPlates
    {
        $this->engine->registerFunction($name, $function);
        return $this;
    }

    /**
     * @param array $data
     * @param string|null $template
     * @return BrPlates
     */
    public function data(array $data, string $template = null): BrPlates
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

    /**
     * @param string $name
     * @param array $data
     * @return string
     */
    public function renderMinify(string $name, array $data = []): string
    {
        $code = $this->render($name, $data);

        $code = $this->getScripts($code);

        $search = array('/>[^\S ]+/', '/[^\S ]+</', '/(\s)+/','/<!--(.|\s)*?-->/',);
        $replace = array('>', '<', '\\1');
        return preg_replace($search, $replace, $code);
    }

    private function getScripts(string $code): string
    {
        $sPoint = "<script js-mix>";
        $ePoint = "</script>";

        while ($length = strpos($code, $sPoint)) {
            $stringScript = substr($code, $length + strlen($sPoint));
            $ePointLength = strpos($stringScript, $ePoint);
            $afterScript = substr($stringScript, $ePointLength + strlen($ePoint));
            $script = $this->minJs(substr($stringScript, 0, $ePointLength));
            $code = (substr($code, 0, $length)) . "$script$afterScript";
        }
        return $code;
    }

    /**
     * @param $code
     * @return string
     */
    private function minJs($code): string
    {
        $minify = new JS();
        $minify->add($code);
        return "<script>{$minify->minify()}</script>";
    }
}
