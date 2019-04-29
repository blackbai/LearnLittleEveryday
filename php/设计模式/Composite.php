<?php

//组合模式
//一组对象与该对象的单个实例的处理方式一致。

namespace Composite;

interface RenderableInterface
{
    public function render();
}

class Form implements RenderableInterface
{
    protected $element;

    public function render()
    {
        $formCode = '<form>';
        foreach ($this->element as $item) {
            $formCode .= $item->render();
        }

        $formCode .= '</form>>';
        return $formCode;
    }

    public function addElement(RenderableInterface $renderable)
    {
        $this->element[] = $renderable;
    }
}

class InputElement implements RenderableInterface
{
    public function render()
    {
        return '<input type="text"/>';
    }
}

class TextElement implements RenderableInterface{
    private $text;

    public function __construct($text)
    {
        $this->text = $text;
    }

    public function render()
    {
        return $this->text;
    }
}

$form = new Form();
$form->addElement(new TextElement('hello world'));
$form->render();