<?php
class user
{
    public $username;

    function __construct($username, $password)
    {
        $this->username = $username;
    }

    function __destruct()
    {

    }
    public function showName()
    {
        return $this->username;
    }

    private function select()
    {

    }

    protected function delete()
    {

    }
}

$user = new user('Tom', '1111');
unset($user);

class Address
{
    protected $city;

    public function setCity($city)
    {
        $this->city = $city;
    }

    public function getCity()
    {
        return $this->city;
    }
}

class Person
{
    protected $name;
    protected $address;

    public function __construct()
    {
        $this->address = new Address();
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function __call($name, $arguments)
    {
        // TODO: Implement __call() method.
        if(method_exists($this->address, $name)) {
            return call_user_func_array([$this->address, $name], $arguments);
        }
    }
}

$rasmus = new Person();
$rasmus->setName('Rasmus lev');
$rasmus->setCity('Sunnyvale');
print_r($rasmus->getCity());

class Math
{
    const pi = 3.14159;
    const e = 2.718;
}

class Circle
{
    const pi = 3.1415;
    protected $radius;

    public function __construct($radius)
    {
        $this->radius = $radius;
    }

    public function circumference()
    {
        return 2 * self::pi * $this->radius;
    }
}




