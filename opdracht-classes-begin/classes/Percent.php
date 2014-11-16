<?php 

class Percent {

public $absolute, $relative, $hundred, $nominal;

public function __construct($new, $unit)
		{
			$this->absolute = $this->formatNumber($new/$absolute);
			$this->relative = $this->formatNumber($absolute - 1);
			$this->hundred = $this->formatNumber($absolute * 100);

			if (($this->absolute) > 1 {
				$this->absolute ='positive';
			}
			elseif (($this->absolute) = 1 {
				$this->absolute ='status-quo';
			}
			elseif (($this->absolute) < 1 {
				$this->absolute ='negative';
			}
		}

public function formatNumber($number)
{
	return number_format($number, 2);
}		


?>