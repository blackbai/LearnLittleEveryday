<?php

//数据映射模型
//数据据映射器是一种数据访问层，它执行持久性数据存储（通常是关系数据库）和内存数据表示（域层）之间的数据双向传输。
// 该模式的目标是保持内存表示和持久数据存储相互独立，并保持数据映射器本身。
// 该层由一个或多个映射器（或数据访问对象）组成，执行数据传输。
// 映射器实现的范围有所不同。
// 通用映射器将处理许多不同的域实体类型，专用映射器将处理一个或几个。
namespace Mapper;
class User
{
    private $username;

    private $email;

    public function __construct($username, $email)
    {
        $this->username = $username;
        $this->email = $email;
    }

    //实例化一个User对象
    public static function fromState(array $state)
    {
        return new self(
            $state['username'],
            $state['email']
        );
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getEmail()
    {
        return $this->email;
    }
}

//用户映射
class UserMapper
{
    private $adapter;

    //依赖注入一个Storage适配器
    public function __construct(StorageAdapter $adapter)
    {
        $this->adapter = $adapter;
    }

    //获取用户
    public function findById($id)
    {
        //获取用户
        $result = $this->adapter->find($id);
        if ($result == null) {
            echo "user not found";exit();
        }

        //设置用户映射
        return $this->mapRowToUser($result);
    }

    public function mapRowToUser($row)
    {
        //返回一个用户对象
        return User::fromState($row);
    }
}


class StorageAdapter
{
    private $data = [];

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function find(int $id)
    {
        //判断用户是否存在 如果不存在放入data数组
        if (isset($this->data[$id])) {
            return $this->data[$id];
        }

        return null;
    }
}

$storage = new StorageAdapter([1 => ['username' => 'tom', 'email' => '123@qq.com']]);
$userMapper = new UserMapper($storage);
$user = $userMapper->findById(2);
print_r($user);