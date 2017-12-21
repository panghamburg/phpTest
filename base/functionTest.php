<?php 
Class Test
{
	public function class_name()
	{
		return get_called_class();
	}
	
}

$class = new Test;
echo $class->class_name();

 ?>