<?php
namespace LiteGraph;

use LiteGraph\Helper\CanvasConfig;
use LiteGraph\Helper\CanvasBuilder;
use LiteGraph\Helper\ColorConverter;
use LiteGraph\Helper\Drawler;

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
        $config = $this->canvasConfig;
        $image = (new CanvasBuilder())
            ->getCanvas($config);

        $this->setBackgroundColor($image, $config->getBgColor());
        $layers = $config->getLayers();

        foreach ($layers as $layer) {
            $pointColor = ColorConverter::convert(
                $layer->getPointColor(),
                $image
            );

            $newData = $this->convertData($config);
            $drawler = new Drawler();
            foreach ($newData as $index => $data) {
                $drawler->drawPoint(
                    $image,
                    $data[0], //x
                    $data[1], // y
                    $pointColor
                );
            }
        }

        return $image;
    }

    public function convertData(CanvasConfig $canvas)
    {
        $dataArray = $this->canvasConfig
            ->getLayers()[0]
            ->getData();

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

    /**
     * @param resource $image
     * @param string $color
     *
     * @return int
     */
    protected function setBackgroundColor($image, $color)
    {
        return ColorConverter::convert($color, $image);
    }

    public function getName()
    {
        return __CLASS__;
    }
}
