<?php
// 里氏替换原则违反案例
class Rectangle
{
    protected $width;
    protected $height;

    public function setHeight($height)
    {
        $this->height = $height;
    }

    public function getHeight()
    {
        return $this->height;
    }

    public function setWidth($width)
    {
        $this->width = $width;
    }

    public function getWidth()
    {
        return $this->width;
    }

    public function area()
    {
         return $this->height * $this->width;
    }
}

class Square extends Rectangle
{
    public function setHeight($value)
    {
        $this->width = $value;
        $this->height = $value;
    }

    public function setWidth($value)
    {
        $this->width = $value;
        $this->height = $value;
    }
}

class RectangleTest
{
    private $rectangle;

    public function __construct(Rectangle $rectangle)
    {
        $this->rectangle = $rectangle;
    }

    public function testArea()
    {
        $this->rectangle->setHeight(4);
        $this->rectangle->setWidth(5);

        $area = $this->rectangle->getArea(); // 错误: 返回 25 预想应为 20.
    }
}


// 重构优化 
abstract class Shape
{
    protected $width = 0;
    protected $height = 0;

    abstract public function getArea();
}

class Rectangle extends Shape
{
    public function setWidth($width)
    {
        $this->width = $width;
    }

    public function setHeight($height)
    {
        $this->height = $height;
    }

    public function getArea()
    {
        return $this->width * $this->height;
    }
}

class Square extends Shape
{
    private $length = 0;

    public function setLength($length)
    {
        $this->length = $length;
    }

    public function getArea()
    {
        return pow($this->length, 2);
    }
}