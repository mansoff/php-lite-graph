<?php

namespace LiteGraph;

/**
 * LiteGraph\AxisXBuilder
 */
class AxisXBuilder
{
    /**
     * @var int
     */
    protected $oneItemShift = 0;

    /**
     * @param int $width
     * @param array $data
     */
    public function setData($width, array $data)
    {
        if (count($data) < 1) {
            $this->oneItemShift =  0;
        } else {
            $this->oneItemShift = $width / 1 + count($data);
        }
    }

    /**
     * @param $counter
     * @return mixed
     */
    public function getX($counter)
    {
        return $counter * $this->oneItemShift;
    }
}
