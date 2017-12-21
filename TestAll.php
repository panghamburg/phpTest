<?php

ini_set("display_errors", "1");
ERROR_REPORTING(E_ALL);
class TestAll
{
    private $userAgent;

    public function __construct()
    {
        $this->userAgent = $_SERVER['HTTP_USER_AGENT'];
        echo $this->userAgent;
    }
}

abstract class AbOneTrick
{
    abstract public function trick($whatever);
}
class OneTrick
{
    private $storeHere;

    public function trick($whatever)
    {
        $this->storeHere = $whatever;
        return $this->storeHere;
    }
}
//$test = new TestAll();
$doIt = new OneTrick();
echo $doIt->trick('This is perfect.');

interface IMethodHolder
{
    public function getInfo($info);
    public function sendInfo($info);
    public function calculate($first, $second);
}

class ImplementAlpha implements IMethodHolder
{
    public function getInfo($info)
    {
        echo 'This is NEWs';
    }
    public function sendInfo($info)
    {
        
    }
    public function calculate($first, $second)
    {

    }
}

//接口和常量
interface IConnectInfo
{
    const HOST = "localhost";
    const UNAME = "phpWorker";
}