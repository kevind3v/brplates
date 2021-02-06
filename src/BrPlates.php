<?php

namespace BrBunny\BrPlates;

use League\Plates\Engine;

/**
 * BrPlates Class
 * @author Kevin S. Siqueira <kevinsiqueira.dev@gmail.com>
 * @package BrBunny\BrPlates
 */
class BrPlates
{
    use BrPlatesTrait;

    /** @var Engine */
    private $engine;

    public function __construct(
        string $path,
        string $ext = 'php'
    ) {
        $this->engine = new Engine($path, $ext);
    }

    /**
     * @return Engine
     */
    public function engine(): Engine
    {
        return $this->engine;
    }
}
