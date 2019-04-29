<?php

//装饰者模式
//为类实例动态增加新的方法

namespace Decorator;


interface RenderInterface
{
    public function render();
}

class Webservice implements RenderInterface
{
    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function render()
    {
        return $this->data;
    }
}

abstract class Decorator implements RenderInterface
{
    protected $wrapped;

    public function __construct(RenderInterface $render)
    {
        $this->wrapped = $render;
    }
}

class XmlRender extends Decorator
{
    public function render()
    {
        $doc = new \DOMDocument();
        $data = $this->wrapped->render();
        $doc->appendChild($doc->createElement('content', $data));

        return $doc->saveXML();
    }
}

class JsonRender extends Decorator{
    public function render()
    {
        return json_encode($this->wrapped->render());
    }
}

$service = new Webservice('hello world');
$json = new JsonRender($service);
$json->render();