<?php 

class CdProd
{
	public $num;
	public $num1;

	public function __construct($num,$arg)
	{
		$this->num = $num;
		$this->num1 = $arg;
	}

	public function one()
	{
		return $this->num + $this->num1;
	}
}

$cdprod = new CdProd(3,4);
echo $cdprod->one();
 ?>
