<?php

//将抽象与实现分离，这样两者可以独立地改变。

namespace php;

interface FormatterInterface
{
    public function format($text);
}

class PlainTextFormatter implements FormatterInterface
{
    public function format($text)
    {
        return $text;
    }
}

class HtmlFormatter implements FormatterInterface
{
    public function format($text)
    {
        return sprintf($text);
    }
}


abstract class Service
{
    protected $implementation;

    public function __construct(FormatterInterface $formatter)
    {
        $this->implementation = $formatter;
    }

    public function setImplementation(FormatterInterface $formatter)
    {
        $this->implementation = $formatter;
    }

    abstract function get();
}

class HelloWorldService extends Service
{
    public function get()
    {
        return $this->implementation->format('hello world');
    }
}

$hello = new HelloWorldService(new PlainTextFormatter());
$hello->get();