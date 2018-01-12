<?php 
Class Test
{
	public function class_name()
	{
		return get_called_class();
	}
	
}

//$class = new Test;
//echo $class->class_name();

$url = 'http://light-school.oss-cn-qingdao.aliyuncs.com/APP/cust/images/s512X512.png';
echo dirname($url), '<br/>';
echo basename($url), '<br/>';
print_r(pathinfo($url));
 ?>