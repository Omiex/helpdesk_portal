<?php

namespace App\Http\Livewire\Process;

use Livewire\Component;
use App\Models\Problem;

class NewRequest extends Component
{

    public function render()
    {
		$problems = Problem::doesntHave('progress')->get();
        return view('livewire.process.new-request', compact('problems'));
    }
}
