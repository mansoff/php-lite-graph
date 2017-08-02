<?php

//tmp hack
require_once 'src/LiteGraph/AxisXBuilder.php';
require_once 'src/LiteGraph/CanvasBuilder.php';
require_once 'src/LiteGraph/HexConverter.php';
require_once 'src/LiteGraph/LiteGraph.php';

ini_set("display_errors", "1");
error_reporting(E_ALL);

//Gmagick::
header('content-type: image/png');

use LiteGraph\LiteGraph;
$graph = new LiteGraph();
$graph->setCanvas(750, 300);
$graph->setBackgroundColor('#ffffff');
$graph->setData(
    [
        [2006,700],
        [2007,600],
        [2008,500],
        [2009,650],
    ]
);

$image = $graph->build();


imagepng($image);
imagedestroy($image);
