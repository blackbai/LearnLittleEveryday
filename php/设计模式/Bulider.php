<?php

//建造者是创建一个复杂对象的一部分接口。
//有时候，如果建造者对他所创建的东西拥有较好的知识储备，这个接口就可能成为一个有默认方法的抽象类（又称为适配器）。
//如果对象有复杂的继承树，那么对于建造者来说，有一个复杂继承树也是符合逻辑的。
//注意：建造者通常有一个「流式接口」，例如 PHPUnit 模拟生成器。

//定义建造者接口类
interface BuilderInterface
{

    public function createVehicle();

    public function addWheel();

    public function addEngine();

    public function addDoors();

    public function getVehicle();

}

/**
 * 是建造者模式的一部分，他可以实现建造者模式的接口
 * 并在构建器的帮助下实现构建一个复杂的对象
 * 你也可以注入更多的构建起而不是构建更复杂的对象
 * Class Director
 */
class Director
{
    public function build(BuilderInterface $builder)
    {
        $builder->createVehicle();
        $builder->addWheel();
        $builder->addDoors();
        $builder->addEngine();

        return $builder->getVehicle();
    }
}

//定义一个货车的构建器
class TruckBuilder implements BuilderInterface
{

    private $truck;

    public function addDoors()
    {
        $this->truck->setPart('doors', new Doors());
    }

    public function addEngine()
    {
        $this->truck->setPart('engine', new Doors());
    }

    public function addWheel()
    {
        $this->truck->setPart('wheel', new Doors());
    }

    public function createVehicle()
    {
        $this->truck = new Truck();
    }

    public function getVehicle()
    {
        return $this->truck;
    }
}

class CarsBuilder implements BuilderInterface
{
    private $car;

    public function getVehicle()
    {
        return $this->car;
    }

    public function createVehicle()
    {
        $this->car = new Cars();
    }

    public function addWheel()
    {
        $this->car->setPart('wheel', new Wheel());
    }

    public function addEngine()
    {
        $this->truck->setPart('engine', new Doors());
    }

    public function addDoors()
    {
        $this->truck->setPart('doors', new Doors());
    }
}

abstract class Vehicle
{
    private $data = [];

    public function setPart($key, $value)
    {
        $this->data[$key] = $value;
    }
}

class Truck extends Vehicle
{

}


class Cars extends Vehicle
{

}

class Wheel
{
}

class Doors
{
}

class Engine
{
}

//定义一个或者构建器
$truckBuilder = new TruckBuilder();
//通过创建者构建一个货车对象类
$truck = (new Director())->build($truckBuilder);
