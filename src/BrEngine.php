<?php

namespace BrBunny\BrPlates;

use BrBunny\BrPlates\Templates\BrTemplate;
use League\Plates\Engine;

class BrEngine extends Engine
{
    /**
     * Create a new template.
     * @param  string   $name
     * @param  array    $data
     * @return BrTemplate
     */
    public function make($name, array $data = array()): BrTemplate
    {
        $template = new BrTemplate($this, $name);
        $template->data($data);
        return $template;
    }
}