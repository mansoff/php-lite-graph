<?php

namespace LiteGraph;

/**
 * LiteGraph\CanvasBuilder
 */
class CanvasBuilder
{
    protected $width = 800;
    protected $height = 300;

    /**
     * Setter of Height
     *
     * @param int $height
     *
     * @return static
     */
    public function setHeight($height)
    {
        $this->height = $height;

        return $this;
    }

    /**
     * Getter of Height
     *
     * @return int
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Setter of Width
     *
     * @param int $width
     *
     * @return static
     */
    public function setWidth($width)
    {
        $this->width = $width;

        return $this;
    }

    /**
     * Getter of Width
     *
     * @return int
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @return resource
     */
    public function getCanvas()
    {

        return imagecreate($this->width, $this->height);
    }
} 