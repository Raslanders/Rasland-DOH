#!/usr/bin/php
<?php

require( '../hue.php' );

$bridge = '10.0.1.2';
$key = "newdeveloper";
$hue = new Hue( $bridge, $key );
$light = 1;

$hue->lights()[$light]->setLight( $hue->predefinedColors( 'green' ) );
sleep( 1 );
$hue->lights()[$light]->setLight( $hue->predefinedColors( 'red' ) );
sleep( 1 );
$hue->lights()[$light]->setLight( $hue->predefinedColors( 'blue' ) );
sleep( 1 );
$hue->lights()[$light]->setLight( $hue->predefinedColors( 'purple' ) );
sleep( 1 );
$hue->lights()[$light]->setLight( $hue->predefinedColors( 'pink' ) );
sleep( 1 );
$hue->lights()[$light]->setLight( $hue->predefinedColors( 'yellow' ) );
sleep( 1 );
$hue->lights()[$light]->setLight( $hue->predefinedColors( 'orange' ) );
sleep( 1 );
$hue->lights()[$light]->setLight( $hue->predefinedColors( 'coolwhite' ) );
sleep( 1 );
$hue->lights()[$light]->setLight( $hue->predefinedColors( 'warmwhite' ) );
sleep( 1 );

?>
