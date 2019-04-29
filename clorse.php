<?php

class Animal
{
    private static $cat = 'cat';
    private static $dog = 'dog';
    public $pig = 'pig';

}

$cat = static function() {
    echo  static::$cat;
};

$dog = function() {
    echo  static::$dog;
};

$pig = function() {
  echo $this->pig;
};

$bindCat = Closure::bind($cat, null,new Animal());// 给闭包绑定了Animal实例的作用域，但未给闭包绑定$this对象
$bindDog = Closure::bind($dog, new Animal(),Animal::class);
$bindPig = Closure::bind($pig, new Animal());
$bindDog();
$bindCat();
$bindPig();