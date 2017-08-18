<?php

//tmp hack

require_once 'src/LiteGraph/Helper/Drawler.php';
require_once 'src/LiteGraph/Helper/GraphLayer.php';
require_once 'src/LiteGraph/Helper/CanvasConfig.php';
require_once 'src/LiteGraph/Helper/CanvasBuilder.php';
require_once 'src/LiteGraph/Helper/HexConverter.php';
require_once 'src/LiteGraph/LiteGraph.php';

ini_set("display_errors", "1");
error_reporting(E_ALL);

header('content-type: image/png');

use LiteGraph\LiteGraph;


$config = new \LiteGraph\Helper\CanvasConfig(750, 300);
$graph1 = new \LiteGraph\Helper\GraphLayer();
$graph1->setData(
    [
        [2006,700],
        [2007,600],
        [2008,500],
        [2009,650],
    ]
);
$graph1->setLineColor('#ff00ff');
$graph1->setPointColor('#ff0000');
$config->setLayers([$graph1]);
$config->setBgColor('#ffffff');


$image = (new LiteGraph($config))
    ->build();


imagepng($image);
imagedestroy($image);
