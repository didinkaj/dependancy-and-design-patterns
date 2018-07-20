<?php
/**
 * Created by PhpStorm.
 * User: jdidinya
 * Date: 19/07/2018
 * Time: 23:01
 */

namespace Blog\Logger;


class Button
{
private $color;
private $text;
private $width;
private $height;

public function __construct($color,$text,$width,$height)
{
    $this->text=$text;
    $this->color=$color;
    $this->width=$width;
    $this->height=$height;


}


}