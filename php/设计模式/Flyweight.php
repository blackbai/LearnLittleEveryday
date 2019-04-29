<?php

//享元模式
//为了节约内存的使用，享元模式会尽量使类似的对象共享内存。
//在大量类似对象被使用的情况中这是十分必要的。
//常用做法是在外部数据结构中保存类似对象的状态，并在需要时将他们传递给享元对象。

namespace Flyweight;

interface FlyweightInterface
{
    public function render($extrinsicState);
}

class CharacterFlyweight implements FlyweightInterface
{
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function render($font)
    {
        return sprintf('Character %s with font %s', $this->name, $font);
    }

}

class FlyweightFactor implements \Countable
{
    /**
     * @var CharacterFlyweight[]
     * 定义享元特征数组。
     * 用于存储不同的享元特征。
     */
    private $pool = [];

    /**
     * 输入字符串格式数据 $name。
     * 返回 CharacterFlyweight 对象。
     */
    public function get($name)
    {
        if (!isset($this->pool[$name])) {
            $this->pool[$name] = new CharacterFlyweight($name);
        }

        return $this->pool[$name];
    }

    /**
     * 返回享元特征个数。
     */
    public function count()
    {
        return count($this->pool);
    }
}