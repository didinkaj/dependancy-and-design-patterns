<?php

namespace Blog\Logger;


class ButtonBuilder
{
    private $color;
    private $text;
    private $width;
    private $height;

    /**
     * @param mixed $color
     */
    public function setColor($color)
    {
        $this->color = $color;
        return $this;
    }

    /**
     * @param mixed $text
     */
    public function setText($text)
    {
        $this->text = $text;
        return $this;
    }

    /**
     * @param mixed $width
     */
    public function setWidth($width)
    {
        $this->width = $width;
        return $this;
    }

    /**
     * @param mixed $height
     */
    public function setHeight($height)
    {
        $this->height = $height;
         $this;
    }
    public function build(){
        return new Button($this->color,$this->text,$this->width,$this->height);
    }







}