<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Problem;
use App\Models\Progress;
use Auth;

class Process extends Component
{
	protected $listeners = ['processRefresh' => '$refresh'];

    public function render()
    {
		// Get new requests
		$newRequest = Problem::doesntHave('progress')->get();

		//////// Get progress data
		$progress = Progress::grouped();

		// Get on progress request
		$onProgress = collect();
		$progress->each(function ($item, $key) use ($onProgress) {
			if ($item->last()->process == 'on progress' && $item->last()->staff_id == Auth::user()->id) {
				$onProgress->push($item->last());
			}
		});

		// Get take over progress
		$takeOver = collect();
		$progress->each(function ($item, $key) use ($takeOver) {
			if ($item->last()->process == 'take over') {
				$takeOver->push($item->last());
			}
		});

        return view('livewire.process', compact('newRequest', 'onProgress', 'takeOver'));
    }

	public function create($process, $id, $desc = '')
	{
		$progress = new Progress;
		$result = $progress->create([
			'problem_id' => $id,
			'staff_id' => Auth::user()->id,
			'process' => $process,
			'description' => $desc
		]);

		$refresh;
		return 'Tiket '.$result->problem->ticket_number." telah berhasil diubah statusnya menjadi $process";
	}
}
