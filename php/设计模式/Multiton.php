<?php

//多例模式是指存在一个类有多个相同实例，而且该实例都是该类本身。这个类叫做多例类。 多例模式的特点是：
//多例类可以有多个实例。
//多例类必须自己创建、管理自己的实例，并向外界提供自己的实例

final class Multiton
{
    const INSTANCE_1 = '1';
    const INSTANCE_2 = '2';

    private static $instance = [];

    private function __construct()
    {

    }

    //判断对象实例是否存在
    //不存在则创建
    //存在直接返回
    public static function getInstance($instanceName)
    {
        if (!isset(self::$instance[$instanceName])) {
            self::$instance[$instanceName] = new self();
        }
        return self::$instance[$instanceName];
    }

    //防止克隆对象
    private function __clone()
    {

    }

    //防止被序列化
    private function __wakeup()
    {

    }
}