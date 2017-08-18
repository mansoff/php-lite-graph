<?php
namespace LiteGraph\Helper;

class Drawler
{
    /**
     * @param resource $image
     * @param int $x
     * @param int $y
     * @param int $color
     * @param int $radius
     *
     * @return bool
     */
    public function drawPoint(
        $image,
        $x,
        $y,
        $color,
        $radius = 2
    ) {
        return imagefilledrectangle(
            $image,
            $x-$radius,
            $y-$radius,
            $x+$radius,
            $y+$radius,
            $color
        );
    }
}