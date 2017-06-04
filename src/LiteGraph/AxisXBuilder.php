<?php

namespace LiteGraph;

/**
 * LiteGraph\AxisXBuilder
 */
class AxisXBuilder
{
    protected $oneItemShift = 0;

    public function setData($width, array $data)
    {
        if (count($data) < 1) {
            $this->oneItemShift =  0;
        } else {
            $this->oneItemShift = $width / 1 + count($data);
        }
    }

    public function getX($counter)
    {
        return $counter * $this->oneItemShift;
    }
}
