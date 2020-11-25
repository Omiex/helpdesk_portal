<?php

namespace App\Http\Livewire\Process;

use Livewire\Component;
use App\Models\Problem;

class TakeOver extends Component
{
    public function render()
    {
		$problems = Problem::whereHas('progress', function($p){
			$p->groupBy('problem_id')->where('process', 'take over');
		})->get();
        return view('livewire.process.take-over', compact('problems'));
    }
}
