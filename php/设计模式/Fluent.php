<?php

//流式接口模式
//用来编写易于阅读的代码，就像自然语言一样（如英语）

class Sql
{
    private $fields = [];
    private $from = [];
    private $where = [];

    public function select($fields)
    {
        $this->fields = $fields;
        return $this;
    }

    public function from($table, $alias)
    {
        $this->from[] = $table . ' AS ' . $alias;
        return $this;
    }

    public function where($condition){
        $this->where[] = $condition;
        return $this;
    }

    public function __toString()
    {
        return sprintf('SELECT %s FROM %s WHERE %s',
            join(', ', $this->fields),
            join(', ', $this->from),
            join(' AND ', $this->where)
        );
    }

}


$query = (new Sql())
    ->select(['foo', 'bar'])
    ->from('foobar', 'f')
    ->where('f.bar = ?');