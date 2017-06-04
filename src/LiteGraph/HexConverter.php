<?php

namespace LiteGraph;

/**
 * LiteGraph\HexConverter
 */
class HexConverter
{
    /**
     * @param string $hex
     *
     * @return array
     */
    public static function hexToRgb($hex)
    {
        list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");

        return [
            'r' => $r,
            'g' => $g,
            'b' => $b
        ];
    }
} 