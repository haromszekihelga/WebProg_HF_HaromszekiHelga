<?php

class ArrayManipulator {

    private $data = [];

    public function __construct(array $initialData)
    {
        $this->data = $initialData;
    }

    public function __get($key)
    {
        if (array_key_exists($key, $this->data)) {
            return $this->data[$key];
        } 
    }

    public function __set($key, $value)
    {
        $this->data[$key] = $value;
    }

    public function __isset($key)
    {
        return isset($this->data[$key]);
    }

    public function __unset($key)
    {
        unset($this->data[$key]);
    }

    public function __toString()
    {
        return json_encode($this->data);
    }

    public function __clone()
    {
        foreach ($this->data as $key => $value) {
            if (is_object($value)) {
                $this->data[$key] = clone $value;
            }
        }
    }
}

$data = ['name' => 'Lajos', 'age' => 21, 'info' => ['city' => 'London', 'email' => 'nagylajos@gmail.com']];
$manipulator = new ArrayManipulator($data);

// __get
echo $manipulator->name . PHP_EOL ;
echo $manipulator->age . PHP_EOL ;
echo $manipulator->info['city'] . PHP_EOL ;

// __set
$manipulator->country = 'Budapest';
echo $manipulator->country . PHP_EOL;

// __isset
var_dump(isset($manipulator->name));
var_dump(isset($manipulator->nonexistent)); 

// __unset
unset($manipulator->age);
var_dump(isset($manipulator->age)); 

// __toString
echo $manipulator . PHP_EOL ;

// __clone
$clonedManipulator = clone $manipulator;
$clonedManipulator->name = 'Helen';
echo $clonedManipulator->name . PHP_EOL;
echo $manipulator->name . PHP_EOL;
