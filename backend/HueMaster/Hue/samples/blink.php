#!/usr/bin/php
<?php

require( '../hue.php' );

$bridge = '10.0.1.2';
$key = "newdeveloper";
$hue = new Hue( $bridge, $key );
$light = 1;

$hue->lights()[$light]->setAlert( "lselect" );
sleep( 2 );
$hue->lights()[$light]->setAlert( "none" );

?>
