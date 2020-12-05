<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Problem;
use App\Models\Progress;
use Auth;

class Process extends Component
{
	protected $listeners = ['refresh' => '$refresh'];
	protected $description = '';

    public function render()
    {
		// Get new requests
		$newRequest = Problem::doesntHave('progress')->get();

		//////// Get progress data
		$progress = Progress::with('proceed_by')
			->with('problem')
			->get()
			->groupBy('problem_id');

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

	public function create($process, $id)
	{
		$progress = new Progress;
		$progress->create([
			'problem_id' => $id,
			'staff_id' => Auth::user()->id,
			'process' => $process,
			'description' => $this->description
		]);
	}

	public function process($id)
	{
		$this->create('on progress', $id);
		$refresh;
	}

	public function finish($id)
	{
		$this->create('finish', $id);
		$this->description = '';
		$refresh;
	}

	public function takeOver($id)
	{
		$this->create('take over', $id);
		$this->description = '';
		$refresh;
	}

	public function decline($id)
	{
		$this->create('declined', $id);
		$this->description = '';
		$refresh;
	}
}
