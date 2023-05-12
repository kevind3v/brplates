<?php

namespace BrBunny\BrPlates;

/**
 * BrPlates Class
 * @author Kevin S. Siqueira <kevinsiqueira.dev@gmail.com>
 * @package BrBunny\BrPlates
 */
class BrPlates
{
    use BrPlatesTrait;

    /** @var BrEngine */
    private $engine;

    public function __construct(
        string $path,
        string $ext = 'php'
    ) {
        $this->engine = new BrEngine($path, $ext);
    }

    /**
     * @return BrEngine
     */
    public function engine(): BrEngine
    {
        return $this->engine;
    }
}
