<?php
class verify
{
    public function num($number)
    {
        if (preg_match('/^-?\d+$/', $number)) {
            echo '';
        }
    }

    public function email($email)
    {

    }

    public function htmlz($string)
    {
        return htmlentities($string);
    }

    public function update()
    {
        /**
         * name
         * type
         * size
         * tmp_name
         * error
         */
        $_FILES();
    }

    public function PdoMysql($user, $password)
    {
        $mysql = new PDO('mysql:host=', $user, $password);
        //
        $query = $mysql->query('');
        $query->fetch();
        $query->fetchAll();
        //exec INSERT DELETE UPDATE
        $query1 = $mysql->exec('');
        $mysql->prepare('')->rowCount();

    }
}
$me = $_SERVER['REQUEST_METHOD'];//获取方式
echo strtolower($me);