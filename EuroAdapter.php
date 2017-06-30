<?php 
//美元适配器
include_once('EuroCalc.php');
include_once('ITarget.php');

class EuroAdapter extends EuroCalc implements ITarget
{
	public function __construct()
	{
		$this->requester();
	}

	function requester()
	{
		$this->rate = 0.811;
		return $this->rate;
	}
}

 ?>