<?php
namespace LiteGraph\Helper;

class ColorConverter
{
    /**
     * @param string $color
     * @param resource $image
     *
     * @return int
     */
    public static function convert($color, $image)
    {
        $hex = HexConverter::hexToRgb($color);

        return imagecolorallocate($image, $hex['r'], $hex['g'], $hex['b']);
    }
}
