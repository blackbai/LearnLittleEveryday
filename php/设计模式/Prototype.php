<?php

//原型模式
//相比正常创建一个对象 ( new Foo() )，首先创建一个原型，然后克隆它会更节省开销。

abstract class BookPrototype
{
    protected $title;

    protected $category;

    abstract public function __clone();

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

}

class BarBookPrototype extends BookPrototype
{

    protected $category = 'bar';

    public function __clone()
    {

    }

}

class FooBookPrototype extends BookPrototype
{
    protected $category = 'foo';

    public function __clone()
    {

    }
}

$bar = new BarBookPrototype();
$foo = new FooBookPrototype();

for($i=0;$i<0;$i++){
    $book = clone $bar;
    $book->setTitle($i);
}