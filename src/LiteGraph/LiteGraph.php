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


        $hex = HexConverter::hexToRgb('#ff0000');
        $red = imagecolorallocate($image, $hex['r'], $hex['g'], $hex['b']);

        $newData = $this->convertData();

//        var_dump($newData);

        foreach ($newData as $index => $data) {
            $this->drawPoint(
                $image,
                $data[0], //x
                $data[1], // y
                $red
            );

//            imagesetpixel($image, , , $red);
        }



        return $image;
    }

    public function convertData()
    {
        $new = [];

        $count = count($this->dataArray);
        $maxX = $minX = null;
        $maxY = $minY = null;

        foreach ($this->dataArray as $data) {
            if ($minX == null || $data[0] < $minX) {
                $minX = $data[0];
            }
            if ($maxX == null || $data[0] > $maxX) {
                $maxX = $data[0];
            }

            if ($minY == null || $data[1] < $minY) {
                $minY = $data[1];
            }
            if ($maxY == null || $data[1] > $maxY) {
                $maxY = $data[1];
            }
        }

        $deltaX = $maxX - $minX;
        //var_dump($deltaX);
        $deltaY = $maxY - $minY;

        $canvasWidth = $this->canvasBuilder->getWidth();
        $canvasHeight = $this->canvasBuilder->getHeight();

        $xCoof = intval($canvasWidth / $deltaX);
        $yCoof = intval($canvasHeight / $deltaY);

        $new = [];
        foreach ($this->dataArray as $data) {
            $new[] = [
                ($data[0] - $minX) * $xCoof,
                $canvasHeight - ($data[1]- $minY) * $yCoof
            ];
        }

        return $new;
    }

    public function drawPoint($image, $x, $y, $color, $radius = 2)
    {
        imagefilledrectangle(
            $image,
            $x-$radius,
            $y-$radius,
            $x+$radius,
            $y+$radius,
            $color
        );
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
