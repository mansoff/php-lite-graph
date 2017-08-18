<?php
namespace LiteGraph;

use LiteGraph\Helper\CanvasConfig;
use LiteGraph\Helper\CanvasBuilder;
use LiteGraph\Helper\Drawler;
use LiteGraph\Helper\HexConverter;

/**
 * src\LiteGraph
 */
class LiteGraph
{
    /**
     * @var CanvasConfig
     */
    private $canvasConfig;

    /**
     * LiteGraph constructor.
     * @param CanvasConfig $canvasConfig
     */
    public function __construct(
        CanvasConfig $canvasConfig
    ) {
        $this->canvasConfig = $canvasConfig;
    }

    public function build()
    {
        $canvas = $this->canvasConfig;
        $image = (new CanvasBuilder())
            ->getCanvas($canvas);

        $this->setColor($image, $canvas->getBgColor());


        $hex = HexConverter::hexToRgb('#ff0000');
        $red = imagecolorallocate($image, $hex['r'], $hex['g'], $hex['b']);

        $newData = $this->convertData($canvas);

        $drawler = new Drawler();

        foreach ($newData as $index => $data) {
            $drawler->drawPoint(
                $image,
                $data[0], //x
                $data[1], // y
                $red
            );
        }

        return $image;
    }

    public function convertData(CanvasConfig $canvas)
    {
        $dataArray = $this->canvasConfig
            ->getLayers()[0]
            ->getData();

        $new = [];

        $count = count($dataArray);
        $maxX = $minX = null;
        $maxY = $minY = null;

        foreach ($dataArray as $data) {
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

        $canvasWidth = $canvas->getWidth();
        $canvasHeight = $canvas->getHeight();

        $xCoof = intval($canvasWidth / $deltaX);
        $yCoof = intval($canvasHeight / $deltaY);

        $new = [];
        foreach ($dataArray as $data) {
            $new[] = [
                ($data[0] - $minX) * $xCoof,
                $canvasHeight - ($data[1]- $minY) * $yCoof
            ];
        }

        return $new;
    }

    protected function setColor($image, $color)
    {
        $hex = HexConverter::hexToRgb($color);
        return imagecolorallocate($image, $hex['r'], $hex['g'], $hex['b']);
    }

    public function getName()
    {
        return __CLASS__;
    }
}
