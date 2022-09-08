<?php
require_once __DIR__ . '/vendor/autoload.php';

use Glace\Director;
use Glace\GlaceVanilleBuilder;

$director = new Director(new GlaceVanilleBuilder());
$maGlace = $director->GlaceVanille_DeOuf();
var_dump($maGlace);
