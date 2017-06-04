<?php

namespace LiteGraph;

/**
 * src\LiteGraph
 */
class LiteGraph
{
    /**
     * @var CanvasBuilder
     */
    protected $canvasBuilder;

    /**
     * @var string
     */
    protected $bgColog;

    /**
     * @var array
     */
    protected $dataArray;

    /**
     *
     */
    public function __construct()
    {
        $this->canvasBuilder = new CanvasBuilder();
    }

    public function build()
    {
        $image = $this->canvasBuilder->getCanvas();
        $this->buildBackground($image);

        $xAxis = (new AxisXBuilder());

        $xAxis->setData(
            $this->canvasBuilder->getWidth(),
            $this->$this->dataArray
        );

//        imagesetpixel ( resource $image , int $x , int $y , int $color );

        return $image;
    }

    /**
     * @param string $hexColor
     */
    public function setBackgroundColor($hexColor)
    {
        $this->bgColog = $hexColor;
    }

    /**
     * @param int $width
     * @param int $height
     */
    public function setCanvas($width, $height)
    {
        $this->canvasBuilder
            ->setWidth(intval($width));
        $this->canvasBuilder
            ->setHeight(intval($height));
    }

    public function setData($data)
    {
        $this->dataArray = $data;
    }

    protected function buildBackground($image)
    {
        $hex = HexConverter::hexToRgb($this->bgColog);
        imagecolorallocate($image, $hex['r'], $hex['g'], $hex['b']);
    }

    public function getName()
    {
        return __CLASS__;
    }
}
