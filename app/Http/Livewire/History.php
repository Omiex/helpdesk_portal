<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Progress;
use App\Models\Problem;
use Auth;

class History extends Component
{
	use WithPagination;

    public function render()
    {
        return view('livewire.history');
    }

	public function getProblemsProperty()
	{
		$problems = new Problem;
		$data;

		if (Auth::user()->role == 'user') {
			$data = $problems->where('user_id', Auth::user()->id);
		} else {
			$data = $problems;
		}

		return $data->orderBy('created_at', 'desc')->paginate(2);
	}
}
