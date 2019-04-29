<?php

//注册模式
//目的是能够存储在应用程序中经常使用的对象实例，通常会使用只有静态方法的抽象类来实现（或使用单例模式）。
//需要注意的是这里可能会引入全局的状态，我们需要使用依赖注入来避免它。

namespace register;

abstract class Register
{
    CONST LOGGER = 'logger';

    /**
     * 设置key value对象
     * @var array
     */
    private static $storeValues = [];

    /**
     * 确定对象的唯一性
     * @var array
     */
    private static $allowedKeys = [
        self::LOGGER
    ];

    public static function set($key, $value)
    {
        //判断注册的对象名称是否存在
        if (!in_array($key, self::$allowedKeys)) {
            echo 'invalid key given';
            exit;
        }

        //注册对象
        self::$storeValues[$key] = $value;
    }

    public static function get($key)
    {
        //判断key对应的对象是否在注册树上
        if (!in_array($key, self::$allowedKeys) || !isset(self::$storeValues[$key])) {
            exit('invalid key given');
        }

        //返回对象
        return self::$storeValues[$key];
    }
}