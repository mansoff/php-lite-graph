<?php
namespace LiteGraph\Helper;

class CanvasConfig
{
    protected $width = 800;

    protected $height = 600;

    protected $paddingLeft = 0;
    protected $paddingRight = 0;
    protected $paddingTop = 0;
    protected $paddingBottom = 0;

    protected $bgColor = '';

    /**
     * @var array|GraphLayer[]
     */
    protected $layers = [];

    public function __construct(
        $width,
        $height
    ) {
        $this->width = $width;
        $this->height = $height;
    }

    /**
     * Setter of Height
     *
     * @param int $height
     *
     * @return static
     */
    public function setHeight($height)
    {
        $this->height = $height;

        return $this;
    }

    /**
     * Getter of Height
     *
     * @return int
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Setter of Width
     *
     * @param int $width
     *
     * @return static
     */
    public function setWidth($width)
    {
        $this->width = $width;

        return $this;
    }

    /**
     * Getter of Width
     *
     * @return int
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @return int
     */
    public function getWidthAndPadding()
    {
        return $this->width
            + $this->paddingRight
            + $this->paddingLeft;
    }

    /**
     * @return int
     */
    public function getHeightAndPadding()
    {
        return $this->height
            + $this->paddingTop
            + $this->paddingBottom;
    }

    /**
     * @param int $left
     * @param int $top
     * @param int $right
     * @param int $bottom
     */
    public function setPadding(
        $left,
        $top,
        $right,
        $bottom
    ) {
        $this->paddingLeft = $left;
        $this->paddingRight = $right;
        $this->paddingTop = $top;
        $this->paddingBottom = $bottom;
    }

    /**
     * @return int
     */
    public function getPaddingLeft()
    {
        return $this->paddingLeft;
    }

    /**
     * @return int
     */
    public function getPaddingRight()
    {
        return $this->paddingRight;
    }

    /**
     * @return int
     */
    public function getPaddingTop()
    {
        return $this->paddingTop;
    }

    /**
     * @return int
     */
    public function getPaddingBottom()
    {
        return $this->paddingBottom;
    }

    /**
     * @return array|GraphLayer[]
     */
    public function getLayers()
    {
        return $this->layers;
    }

    /**
     * @param array|GraphLayer[] $layers
     */
    public function setLayers($layers)
    {
        $this->layers = $layers;
    }

    /**
     * @return string
     */
    public function getBgColor()
    {
        return $this->bgColor;
    }

    /**
     * @param string $bgColor
     */
    public function setBgColor($bgColor)
    {
        $this->bgColor = $bgColor;
    }
}
