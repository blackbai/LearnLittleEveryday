<?php

//在不指定具体类的情况下创建一系列相关或依赖对象。
// 通常创建的类都实现相同的接口。
// 抽象工厂的客户并不关心这些对象是如何创建的，它只是知道它们是如何一起运行的

//抽象工厂
abstract class AbstractFactory
{
    abstract public function createText($text);
}

//json工厂，返回Json类
class JsonFactory extends AbstractFactory
{
    public function createText($text)
    {
        return new JsonText($text);
    }
}

//html工厂，返回html类
class HtmlFactory extends AbstractFactory
{
    public function createText($text)
    {
        return new HtmlText($text);
    }
}

//抽象文本类
abstract class Text
{
    private $text;

    public function __construct($text)
    {
        $this->text = $text;
    }
}


//具体实现类
class JsonText extends Text
{
    public function encode()
    {

    }
}

class HtmlText extends Text
{

}

$jsonFactory = new JsonFactory();
$jsonText = $jsonFactory->createText("test");
$jsonText->encode();