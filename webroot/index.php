<?php


class orm implements \ArrayAccess
{
    private $attributes = [];

    public function __get($param)
    {
        return $this->attributes[$param];
    }

    public function __set($key, $value)
    {
        $this->attributes[$key] = $value;
    }
    
    public function __isset($key)
    {
        return isset($this->attributes[$key]);
    }
    

    //数组形式得到列值
    public function offsetGet($offset)
    {
        return $this->attributes[$offset]??null;
    }

    //数组形式设置列值
    public function offsetSet($offset, $value)
    {
        $this->attributes[$offset] = $value;
    }

    //数组形式判断列是否存在
    public function offsetExists($offset)
    {
        return isset($this->attributes[$offset]);
    }

    //数组形式unset列
    public function offsetUnset($offset)
    {
        if($this->offsetExists($offset))
        {
            unset($this->attributes[$offset]);
        }
    }
}


$user = new orm();
$user->a = 12;
var_dump(base64_decode('5oOz55qE576O5ZGi'));
