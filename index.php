<?php
require __DIR__ . '/vendor/autoload.php';


use LiteGraph\Helper\CanvasConfig;
use LiteGraph\Helper\GraphLayer;
use LiteGraph\LiteGraph;

ini_set("display_errors", "1");
error_reporting(E_ALL);

header('content-type: image/png');


$a = [[177, 20],
        [194, 46],
        [250, 142],
        [286, 180],
        [300, 200],
        [305, 219],
        [319, 230],];
$b = [];
foreach ($a as $point) {
    $b[] = [$point[1], $point[0]];
}


$config = new CanvasConfig(750, 300);
$graph1 = new GraphLayer();
$graph1->setData($a
//    [
////        [2006,700],
////        [2007,600],
////        [2008,500],
////        [2009,650],
//        [177, 20],
//        [194, 46],
//        [250, 142],
//        [286, 180],
//        [300, 200],
//        [305, 219],
//        [319, 230],
//    ]
);
$graph1->setLineColor('#0000ff');
$graph1->setPointColor('#ff0000');
$config->setLayers([$graph1]);
$config->setBgColor('#ffffff');


$image = (new LiteGraph($config))
    ->build();


imagepng($image);
imagedestroy($image);
