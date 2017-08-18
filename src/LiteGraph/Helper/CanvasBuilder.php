<?php

namespace LiteGraph\Helper;

class CanvasBuilder
{
    /**
     * @param CanvasConfig $canvas
     *
     * @return resource
     */
    public function getCanvas(CanvasConfig $canvas)
    {
        return imagecreate(
            $canvas->getWidthAndPadding(),
            $canvas->getHeightAndPadding()
        );
    }
} 