<?php

//依赖注入模式
//用松散耦合的方式来更好的实现可测试、可维护和可扩展的代码。

namespace depend;

class DatabaseConfig
{
    private $host;
    private $port;
    private $username;
    private $password;

    public function __construct($host, $port, $username, $password)
    {
        $this->host = $host;
        $this->password = $password;
        $this->username = $username;
        $this->port = $port;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getPort()
    {
        return $this->port;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getHost()
    {
        return $this->host;
    }
}

class DatabaseConnection{
    private $config;
    public function __construct(DatabaseConfig $config)
    {
        $this->config = $config;
    }

    public function getDsn(){
        return sprintf('%s:%s:%s:%d',
            $this->config->getHost(),
            $this->config->getPort(),
            $this->config->getUsername(),
            $this->config->getPassword()
            );
    }
}


$config = new DatabaseConfig('localhost','3306','root','123456');
$connect = new DatabaseConnection($config);
$dsn = $connect->getDsn();