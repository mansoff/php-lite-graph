<?php
require_once 'src/LiteGraph/CanvasBuilder.php';
require_once 'src/LiteGraph/HexConverter.php';
require_once 'src/LiteGraph/LiteGraph.php';

ini_set("display_errors", "1");
error_reporting(E_ALL);


header('content-type: image/png');

use LiteGraph\LiteGraph;
$graph = new LiteGraph();
$graph->setCanvas(750, 300);
$graph->setBackgroundColor('#ffffff');

$image = $graph->build();


imagepng($image);
imagedestroy($image);
