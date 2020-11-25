<?php

namespace App\Http\Livewire\Process;

use Livewire\Component;
use App\Models\Problem;

class OnProgress extends Component
{
    public function render()
    {
		$problems = Problem::whereHas('progress', function($p){
			$p->groupBy('problem_id')->where('process', 'on progress');
		})->get();
        return view('livewire.process.on-progress', compact('problems'));
    }
}
