<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{
	public $type, $color;

	/**
	* Create a new component instance.
	*
	* @return void
	*/
	public function __construct($type = '')
	{
		$this->type = $type;
	}

	/**
	* Get the view / contents that represent the component.
	*
	* @return \Illuminate\View\View|string
	*/
	public function render()
	{
		switch ($this->type) {
			case 'success':
				$this->color = 'green';
				break;
			case 'warning':
				$this->color = 'yellow';
				break;
			case 'danger':
				$this->color = 'red';
				break;
			default:
				$this->color = 'blue';
				break;
		}
		return view('components.alert');
	}
}
