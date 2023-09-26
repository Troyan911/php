<?php

$obj = new stdClass();

$obj->test1 = 1;
$obj->test2 = 2;

var_dump($obj);

class Dynamic
{

    private array $props = [];
    public string $name;

    public function __toString()
    {
        return $this->name;
    }

    public function __isset($name) {
        echo "Class prop $name not found\n";
        return isset($this->props[$name]) ? true : false;
    }

    public function __set(string $name, mixed $value): void
    {
        if (property_exists(Dynamic::class, $name)) {
            if (strlen($value) > 3) {
                throw new Exception('Error');
            }
            $this->name = $value;
            echo "Property $name exists\n";
        } else {
            $this->props[$name] = $value;
        }


        $this->props[$name] = $value;
        echo "Magic method\n";
    }

    public function __get(string $name)
    {
        return $this->props[$name];
    }
}

$d = new Dynamic;
$d->test2 = 2;

var_dump($d);

echo $d->test1;
echo $d->test2;
$d->name = "qwe";

echo $d . PHP_EOL;

$d->test1 = 1;
isset($d->test1);
