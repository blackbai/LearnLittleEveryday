<?php

final class StaticFactory
{
    public static function factory($type)
    {
        switch ($type) {
            case "string":
                return new FormatterString();
                break;
            case "number":
                return new FormatterNumber();
                break;
            default:

        }
    }
}

interface FormatterInterface
{

}

class FormatterString implements FormatterInterface
{

}

class FormatterNumber implements FormatterInterface
{

}

$factory = StaticFactory::factory('string');
