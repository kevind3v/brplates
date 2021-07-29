<?php

namespace BrBunny\BrPlates;

use MatthiasMullie\Minify\JS;

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

    /**
     * @param string $name
     * @param array $data
     * @return BrPlates
     */
    public function renderMinify(string $name, array $data = []): string
    {
        $code = $this->render($name, $data);

        $search = array(

            // Remove whitespaces after tags
            '/\>[^\S ]+/s',

            // Remove whitespaces before tags
            '/[^\S ]+\</s',

            // Remove multiple whitespace sequences
            '/(\s)+/s',

            // Removes comments
            '/<!--(.|\s)*?-->/',
        );


        $replace = array('>', '<', '\\1');
        $code = preg_replace('/\<script\>(.|\s)*?\<\/script\>/', $this->minJs($code), $code);
        $code = preg_replace($search, $replace, $code);
        return $code;
    }

    /**
     * @param $code
     * @return string
     */
    private function minJs($code)
    {
        preg_match_all('/\<script\>(.|\s)*?\<\/script\>/', $code, $scripts);

        $search = ['/\<script\>/', '/\<\/script\>/'];
        $minify = new JS();
        foreach ($scripts[0] as $script) {
            $minify->add(preg_replace($search, "", $script));
        }
        return "<script>{$minify->minify()}</script>";
    }
}
