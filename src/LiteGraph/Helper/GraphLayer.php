<?php
namespace LiteGraph\Helper;

class GraphLayer
{
    protected $lineColor = '';
    protected $pointColor = '';
    protected $data = [];

    /**
     * @return string
     */
    public function getLineColor()
    {
        return $this->lineColor;
    }

    /**
     * @param string $lineColor
     */
    public function setLineColor($lineColor)
    {
        $this->lineColor = $lineColor;
    }

    /**
     * @return string
     */
    public function getPointColor()
    {
        return $this->pointColor;
    }

    /**
     * @param string $pointColor
     */
    public function setPointColor($pointColor)
    {
        $this->pointColor = $pointColor;
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param array $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }
}
