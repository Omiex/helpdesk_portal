<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Problem;
use App\Models\Progress;

class Queue extends Component
{
	protected $listeners = ['queueRefresh' => '$refresh'];

	public $type = null;

	public function mount($type)
	{
		$this->type = $type;
	}

    public function render()
    {
        return view('livewire.queue');
    }

	public function getProblemsProperty()
	{
		if ($this->type == 'new request') {
			return Problem::doesntHave('progress')->get();
		} elseif ($this->type == 'on progress') {
			$progress = Progress::grouped();

			$problems = collect();
			$progress->each(function ($item, $key) use ($problems) {
				if ($item->last()->process == 'on progress' || $item->last()->process == 'take over') {
					$problems->push($item->last());
				}
			});

			return $problems;
		} else {
			return false;
		}
	}
}
